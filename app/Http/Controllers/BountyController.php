<?php

namespace App\Http\Controllers;

use App\Bounty;
use App\User;
use App\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;
use View;
use Auth;

class BountyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);
        $bounties = $user->bounty;
        return view('bounty.main', compact('bounties'));
    }

    public function AddForm()
    {
        return Response::json(['success' => true, 'html' => View::make('bounty.modal.add')->render()]);
    }

    public function Save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'twitter_url' => '',
            'twitter_number' => '',
            'first_day' => 'date|nullable',
            'period' => 'numeric|min:1|max:30|nullable'
        ]);

        $bounty = new Bounty();
        $bounty->name = $request->name;
        $bounty->twitter_url = $request->twitter_url;
        $bounty->twitter_number = $request->twitter_number;
        $bounty->first_day = $request->first_day ? Carbon::createFromFormat('d.m.Y', $request->first_day) : null;
        $bounty->period = $request->period;
        $user = User::find(Auth::user()->id);
        $bounty->user()->associate($user);
        $bounty->save();

        if($request->twitter_tags) {
            //$tager = ['Opiria', 'Unibright', 'BitRewards', 'Eligma', 'Grain', 'Multiversum', 'ProjectSHIVOM', 'TheAbyss', 'KoraNetwork', 'Merculet', 'Momentum', 'DatabrokerDAO', 'COTI', 'Cardstack', 'DAVNetwork', 'Loomia', 'BlueWhale', 'HOLD', 'HeroNode', 'Safein', 'Ternio', 'Minerva', 'GoNetwork', 'Lendoit', 'DFINITY', 'EverMarkets', 'DAX', 'DAEX', 'HealthNexus', 'Egretia', 'Mosaic', 'WorldWiFi', 'Repux', 'Signals', 'VLBToken', 'SolveCare', 'Giftcoin', 'MorpheusNetwork', 'Omnitude', 'CloudMoolah', 'iOlite', 'QuantNetwork', 'Saifu', 'XYONetwork', 'IoTeX', 'Opporty', 'Gimmer', 'OpenPlatform']; /*** for start ***/
            $tags = [];
            foreach ($request->twitter_tags as $tag) {
                $tag = str_replace('#', '', $tag);
                $tmp = Tags::firstOrCreate(['name' => $tag]);
                $tags[] = $tmp->id;
            }
            $bounty->tags()->attach(array_unique($tags));
        }

        return Response::json(['url' => route('bounty')]);
    }

    public function Search(Request $request)
    {
        return Tags::search($request->tag)->get();
    }

    public function DeleteForm(Request $request)
    {
        $bounty = $request->action_id;
        return Response::json(['success' => true, 'html' => View::make('bounty.modal.delete', compact('bounty'))->render()]);
    }

    public function Delete(Request $request)
    {
        $bounty = Bounty::find($request->bounty_id);
        if($bounty->user->id == Auth::user()->id) {
            $bounty->tags()->detach();
            $bounty->delete();
        } else {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.permission')], 500);
        }
        return Response::json(['url' => route('bounty')]);
    }

    public function EditForm(Request $request)
    {
        $bounty = Bounty::find($request->action_id);
        if($bounty->user->id == Auth::user()->id){
            return Response::json(['success' => true, 'html' => View::make('bounty.modal.edit', compact('bounty'))->render()]);
        } else {
            return Response::json(['status' => 'error', 'message' => __('messages.errors.permission')], 500);
        }
    }

    public function Edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'twitter_url' => '',
            'twitter_number' => '',
            'first_day' => 'date|nullable',
            'period' => 'numeric|min:1|max:30|nullable'
        ]);

        $bounty = Bounty::find($request->bounty_id);
        if($bounty->user->id == Auth::user()->id){
            $bounty->name = $request->name;
            $bounty->twitter_url = $request->twitter_url;
            $bounty->twitter_number = $request->twitter_number;
            $bounty->first_day = $request->first_day ? Carbon::createFromFormat('d.m.Y', $request->first_day) : null;
            $bounty->period = $request->period;
            $bounty->update();

            if ($request->twitter_tags) {
                $tags = [];
                foreach ($request->twitter_tags as $tag) {
                    $tag = str_replace('#', '', $tag);
                    $tmp = Tags::firstOrCreate(['name' => $tag]);
                    $tags[] = $tmp->id;
                }
                $bounty->tags()->sync(array_unique($tags));
            }

            return Response::json(['url' => route('bounty')]);

        } else {

            return Response::json(['status' => 'error', 'message' => __('messages.errors.permission')], 500);

        }
    }
}
