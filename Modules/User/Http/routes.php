<?php

Route::group(['prefix' => 'settings', 'middleware' => 'web', 'namespace' => 'Modules\User\Http\Controllers\Front'], function () {
    Route::get('/', 'SettingsController@index')->name('settings');
    Route::get('account', 'SettingsController@editAccount')->name('settings.account.edit');
    Route::match(['put', 'patch'], 'account', 'SettingsController@updateAccount')->name('settings.account.update');
    Route::get('password', 'SettingsController@editPassword')->name('settings.password.edit');
    Route::match(['put', 'patch'], 'password', 'SettingsController@updatePassword')->name('settings.password.update');
});

// Users
Route::group(['prefix' => config('app.cp_route'), 'middleware' => ['web', 'auth']], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::group(['namespace' => 'Modules\User\Http\Controllers\Back'], function () {
            Route::get('/', 'UsersController@index')->name('cp.users');
            Route::get('create', 'UsersController@create')->name('cp.user.create');
            Route::post('/', 'UsersController@store')->name('cp.user.store');
        });

        // User Roles
        Route::group(['prefix' => 'roles', 'namespace' => 'Modules\Permission\Http\Controllers\Back'], function () {
            Route::get('/', 'RolesController@index')->name('cp.user.roles');
            Route::get('create', 'RolesController@create')->name('cp.user.role.create');
            Route::post('/', 'RolesController@store')->name('cp.user.role.store');
            Route::get('{role}', 'RolesController@show')->name('cp.user.role');
            Route::get('{role}/edit', 'RolesController@edit')->name('cp.user.role.edit');
            Route::match(['put', 'patch'], '{role}', 'RolesController@update')->name('cp.user.role.update');
            Route::delete('{role}/delete', 'RolesController@delete')->name('cp.user.role.delete');
        });

        Route::group(['namespace' => 'Modules\User\Http\Controllers\Back'], function () {
            Route::get('{user}', 'UsersController@show')->name('cp.user');
            Route::get('{user}/edit', 'UsersController@edit')->name('cp.user.edit');
            Route::match(['put', 'patch'], '{user}', 'UsersController@update')->name('cp.user.update');
            Route::delete('{user}/delete', 'UsersController@delete')->name('cp.user.delete');
        });
    });
});
