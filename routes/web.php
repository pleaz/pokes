<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function() {

    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    })->name('main');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings', 'SettingsController@save')->name('settings.save');

    Route::get('twitter/login', 'TwitterController@login')->name('twitter.login');
    Route::get('twitter/callback', 'TwitterController@callback')->name('twitter.callback');
    Route::get('twitter/error', 'TwitterController@error')->name('twitter.error');
    Route::get('twitter/logout', 'TwitterController@logout')->name('twitter.logout');

    Route::get('/bounty', 'BountyController@index')->name('bounty');
    Route::get('/bounty/add', 'BountyController@AddForm')->name('bounty.add');
    Route::post('/bounty/save', 'BountyController@Save')->name('bounty.save');
    Route::get('/bounty/delete', 'BountyController@DeleteForm')->name('bounty.del-form');
    Route::post('/bounty/delete', 'BountyController@Delete')->name('bounty.delete');
    Route::get('/bounty/edit', 'BountyController@EditForm')->name('bounty.edit-form');
    Route::post('/bounty/edit', 'BountyController@Edit')->name('bounty.edit');
    Route::get('/bounty/search', 'BountyController@Search')->name('bounty.search');

    Route::get('/reports', 'ReportController@index')->name('reports');
    Route::post('/reports', 'ReportController@index')->name('reports.date');

    Route::post('/reports/generate', 'ReportController@generate')->name('reports.generate');
    Route::post('/reports/search', 'ReportController@search')->name('reports.search');

});

