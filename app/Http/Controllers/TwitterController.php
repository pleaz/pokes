<?php

namespace App\Http\Controllers;

use Auth;
use Twitter;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;
use App\User;
use App\TwitterModel;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login()
    {
        $sign_in_twitter = true;
        $force_login = false;

        $token = Twitter::getRequestToken(route('twitter.callback'));

        if (isset($token['oauth_token_secret']))
        {
            $url = Twitter::getAuthorizeURL($token, $sign_in_twitter, $force_login);

            Session::put('oauth_state', 'start');
            Session::put('oauth_request_token', $token['oauth_token']);
            Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

            return Redirect::to($url);
        }

        return Redirect::route('twitter.error');
    }

    public function callback(Request $request)
    {
        if (Session::has('oauth_request_token'))
        {
            $request_token = [
                'token'  => Session::get('oauth_request_token'),
                'secret' => Session::get('oauth_request_token_secret'),
            ];

            Twitter::reconfig($request_token);

            if ($request->has('oauth_verifier'))
            {
                $oauth_verifier = Input::get('oauth_verifier');
                $token = Twitter::getAccessToken($oauth_verifier);
            }

            if (!isset($token['oauth_token_secret']))
            {
                return Redirect::route('twitter.error')->with('status', __('messages.errors.twitter_login'));
            }

            $credentials = Twitter::getCredentials();

            if (is_object($credentials) && !isset($credentials->error))
            {
                $user = Auth::user();
                $user_tw = User::whereHas('twitter', function ($query) use ($token) {
                    $query->where('userid', $token['user_id']);
                })->first();
                if ($user_tw) {
                    if($user_tw->id == $user->id){
                        $twitter = $user->twitter;
                        $twitter->oauth_token = $token['oauth_token'];
                        $twitter->oauth_token_secret = $token['oauth_token_secret'];
                        $twitter->update();
                        return Redirect::route('settings')->with('status', __('messages.status.signed'));
                    } else {
                        return Redirect::route('twitter.error')->with('status', __('messages.errors.twitter_exist'));
                    }
                } elseif($user->twitter) {
                    return Redirect::route('twitter.error')->with('status', __('messages.errors.twitter_in_use'));
                } else {
                    $twitter = new TwitterModel([
                        'oauth_token' => $token['oauth_token'],
                        'oauth_token_secret' => $token['oauth_token_secret'],
                        'userid' => $token['user_id']
                    ]);
                    $user->twitter()->save($twitter);
                    return Redirect::route('settings')->with('status', __('messages.status.signed'));
                }
            }
            return Redirect::route('twitter.error')->with('status', __('messages.errors.twitter_error'));
        }
        return Redirect::route('twitter.error');
    }

    public function error()
    {
        $user = Auth::user();
        return view('settings.main', compact('user'));
    }

    public function logout()
    {
        $user = Auth::user();
        $twitter = $user->twitter;
        $twitter->oauth_token = '';
        $twitter->oauth_token_secret = '';
        $twitter->update();
        return Redirect::route('settings')->with('status', __('messages.status.logged'));
    }
}
