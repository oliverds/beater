<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\EmailAuth\Http\Controllers'], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@login')->name('login');
    Route::post('login', 'LoginController@postLogin')->name('login.post');
    Route::post('logout', 'LoginController@logout')->name('logout.post');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register')->name('register.post');

    Route::get('auth/token/{token}', 'LoginController@authenticate')->name('login.token');
    ;
});
