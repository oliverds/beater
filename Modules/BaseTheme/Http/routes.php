<?php

Route::group(['middleware' => 'web', 'prefix' => 'home', 'namespace' => 'Modules\BaseTheme\Http\Controllers'], function () {
    Route::get('/', 'BaseThemeController@index');
});

Route::group(['middleware' => 'web', 'prefix' => 'cp', 'namespace' => 'Modules\BaseTheme\Http\Controllers'], function () {
    Route::get('/', function() {
    	return view('basetheme::back.dashboard.index');
    });
});
