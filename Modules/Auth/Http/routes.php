<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Auth\Http\Controllers'], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login.post');
    Route::post('logout', 'LoginController@logout')->name('logout.post');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register')->name('register.post');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email.post');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.form');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset.post');
});
