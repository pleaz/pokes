<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use View;

class BountyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('bounty.main');
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

        dd($request);
        return view('bounty.main');
    }

    public function search(Request $request)
    {
        dd($request->tag);
    }
}
