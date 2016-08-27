<?php

Route::group(['middleware' => 'web', 'prefix' => 'home', 'namespace' => 'Modules\BaseTheme\Http\Controllers'], function () {
    Route::get('/', 'BaseThemeController@index');
});

Route::group(['middleware' => ['web', 'auth'], 'prefix' => config('app.cp_route'), 'namespace' => 'Modules\BaseTheme\Http\Controllers'], function () {
    Route::get('/', function() {
    	return view('basetheme::back.dashboard.index');
    })->name('cp.dashboard');
});
