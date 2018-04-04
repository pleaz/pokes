<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Twitter;
use Auth;
use Redirect;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if($user->twitter){
            if($user->twitter->oauth_token){
                Twitter::reconfig(['token'  => $user->twitter->oauth_token, 'secret' => $user->twitter->oauth_token_secret]);
                $twitter = Twitter::getCredentials();
            }
        }

        return view('settings', compact('user', 'twitter'));
    }


    public function save(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'template-twitter' => 'max:2550',
            'template-facebook' => 'max:2550'
        ]);

        $settings = Settings::firstOrNew([
            'user_id' => $user->id
        ]);
        $settings->user_id = $user->id;
        $settings->twitter_template = $request['template-twitter'];
        $settings->facebook_template = $request['template-facebook'];
        $settings->save();

        return Redirect::route('settings')->with('status', 'Saved!');
    }

}
