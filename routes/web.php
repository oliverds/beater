<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('front.home.index');
});

Route::group(['middleware' => ['auth'], 'prefix' => config('app.cp_route'), 'namespace' => 'Back'], function () {
    Route::get('/', function () {
        return redirect()->route('cp.dashboard');
    })->name('cp');

    Route::get('dashboard', 'DashboardController@index')->name('cp.dashboard');

    Route::get('settings', function () {
	    return view('back.settings.index');
	})->name('cp.settings');
});
