<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\User\Http\Controllers\Front'], function () {
    Route::get('settings', 'SettingsController@index')->name('settings.index');
    Route::get('settings/account', 'SettingsController@editAccount')->name('settings.account.edit');
    Route::match(['put', 'patch'], 'settings/account', 'SettingsController@updateAccount')->name('settings.account.update');
    Route::get('settings/password', 'SettingsController@editPassword')->name('settings.password.edit');
    Route::match(['put', 'patch'], 'settings/password', 'SettingsController@updatePassword')->name('settings.password.update');
});

Route::group([
    'middleware' => ['web', 'auth'],
    'namespace' => 'Modules\User\Http\Controllers\Back',
    'prefix' => config('app.cp_route'),
], function () {
    Route::resource('users', 'UserController', ['names' => [
        'store' => 'cp.users.store',
        'index' => 'cp.users.index',
        'create' => 'cp.users.create',
        'destroy' => 'cp.users.destroy',
        'update' => 'cp.users.update',
        'show' => 'cp.users.show',
        'edit' => 'cp.users.edit',
    ]]);
});
