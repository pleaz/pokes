<?php

namespace App\Http\Controllers;

use App\Reports;
use Illuminate\Http\Request;
use Twitter;
use Response;
use App\Bounty;
use Carbon\Carbon;
use Auth;
use DB;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if($request->date) {

            $this->validate($request, [
                'date' => 'required|date|date_format:d.m.Y|before:tomorrow|after:' . Carbon::now()->subDays(31),
            ]);

            $current_date = Carbon::createFromFormat('d.m.Y', $request->date)->format('Y-m-d');
            $bounties = Bounty::where('user_id', Auth::user()->id)
                ->where(DB::raw('MOD(DATEDIFF(\''.$current_date.'\', `first_day`) + 1,`period`)'), 0)
                ->where('first_day', '<', DB::raw('date(\''.$current_date.'\')'))
                ->get();

        } else {

            $current_date = Carbon::now()->format('Y-m-d');
            $bounties = Bounty::where('user_id', Auth::user()->id)
                ->where(DB::raw('MOD(DATEDIFF(\''.$current_date.'\', `first_day`) + 1,`period`)'), 0)
                ->where('first_day', '<', DB::raw('date(\''.$current_date.'\')'))
                ->get();

        }

        return view('report.main', compact('bounties', 'current_date'));

    }

    public function generate(Request $request)
    {

        $this->validate($request, [
            'bounty' => 'required|numeric',
            'dates' => 'required|date|date_format:Y-m-d|before:tomorrow|after:' . Carbon::now()->subDays(31),
        ]);

        $bounty = Bounty::find($request->bounty);

        if ($bounty == null) {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.no_bounty')], 500);
        }

        $current_date = Carbon::createFromFormat('Y-m-d', $request->dates);
        $bounty_date = Carbon::createFromFormat('Y-m-d', $bounty->first_day);
        $date_diff = $current_date->diffInDays($bounty_date) + 1;
        $user = Auth::user();

        if ($bounty->user_id != $user->id) {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.permission')], 500);
        } elseif ($bounty->first_day >= $request->dates) {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.report_date')], 500);
        } elseif ($date_diff % $bounty->period != 0) {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.report_period')], 500);
        } elseif (!$user->twitter) {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.report_twitter')], 500);
        } elseif (!$user->twitter->oauth_token) {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.report_token')], 500);
        } elseif (!$bounty->twitter_url and $bounty->tags->isEmpty()) {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.report_bounty')], 500);
        } elseif ($bounty->reports()->where('date', $current_date->format('Y-m-d'))->first()) {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.report_exist')], 500);
        }

        Twitter::reconfig(['token'  => $user->twitter->oauth_token, 'secret' => $user->twitter->oauth_token_secret]);

        $rtw_urls = [];
        $tw_urls = [];
        $max_id = null;
        $end = false;

        for ($i = 0; $i < 16; $i++) {

            if($end) {
                break;
            }

            $params = [
                'count' => 200,
                'trim_user' => false,
                'exclude_replies' => true,
                'include_rts' => true
            ];

            if($max_id) {
                $params += [ 'max_id' => ((int)$max_id - 1) ];
            }

            $tweets = Twitter::getUserTimeline($params);

            // if has more than 200 tweets
            if(!isset($tweets[199])){
                $end = true;
            } else {
                $max_id = $tweets[199]->id;
            }

            foreach ($tweets as $tweet) {
                $tweet_date = Carbon::parse($tweet->created_at)->timezone('Europe/Moscow')->startOfDay();

                $first_diff = $tweet_date->diffInDays($current_date->subDays($bounty->period)->startOfDay(), false) + 1;
                $second_diff = $tweet_date->diffInDays($current_date->addDays($bounty->period)->startOfDay(), false) + 1;

                if ($first_diff <= -($bounty->period) and $second_diff <= 0) { // dates before period
                      continue;
                }

                if ($first_diff > -($bounty->period) and $second_diff > 0 and $first_diff <= 0 and $second_diff <= $bounty->period) {

                    if(isset($tweet->retweeted_status)) {
                        $bounty_clear_name = str_replace(['http://twitter.com/', 'https://twitter.com/', 'http://www.twitter.com/', 'https://www.twitter.com/', '@', '/'], '', $bounty->twitter_url);
                        if($tweet->retweeted_status->user->screen_name == $bounty_clear_name) {
                            $rtw_urls[] = 'https://twitter.com/'.$tweet->retweeted_status->user->screen_name.'/status/'.$tweet->retweeted_status->id;
                        }
                    } else {
                        foreach($tweet->entities->hashtags as $tag) {
                            if($bounty->tags->pluck('name')->search($tag->text) !== false) {
                                $tw_urls[] = 'https://twitter.com/'.$tweet->user->screen_name.'/status/'.$tweet->id;
                                break;
                            }

                        }
                    }

                }

                if ($first_diff > 0 and $second_diff > $bounty->period) { // dates after period
                    $aa[] = ($tweet_date);
                    $end = true;
                }

            }

        }

        if(isset($user->settings->twitter_template)){
            $report_text = $user->settings->twitter_template."\r\n"."\r\n";
        } else {
            $report_text = '';
        }
        $report_text .= 'Week ('.
            $current_date->subDays($bounty->period)->addDay(1)->format('M j').' to '.
            $current_date->addDays($bounty->period)->subDay(1)->format('M j').')'."\r\n"."\r\n";
        $report_text .= 'ReTweets:'."\r\n";
        foreach ($rtw_urls as $rk => $rtw) {
            $report_text .= ($rk+1).'. '.$rtw."\r\n";
        }
        $report_text .= "\r\n".'Tweets:'."\r\n";
        foreach ($tw_urls as $k => $tw) {
            $report_text .= ($k+1).'. '.$tw."\r\n";
        }

        $report = new Reports();
        $report->date = $current_date;
        $report->report = $report_text;
        $report->bounty()->associate($bounty);
        $report->save();

        return Response::json(['status' => 'ok']);

    }

    public function search(Request $request)
    {

        $this->validate($request, [
            'bounty' => 'required|numeric',
            'dates' => 'required|date|date_format:Y-m-d|before:tomorrow|after:' . Carbon::now()->subDays(31),
        ]);

        $bounty = Bounty::find($request->bounty);
        $user = Auth::user();

        if ($bounty->user_id != $user->id) {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.permission')], 500);
        }

        $current_date = Carbon::createFromFormat('Y-m-d', $request->dates);
        $search = $bounty->reports()->where('date', $current_date->format('Y-m-d'))->first();

        if ($search) {
            return Response::json(['status' => 'report', 'data' => $search->report]);
        } else {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.no_report')], 500);
        }



    }
}
