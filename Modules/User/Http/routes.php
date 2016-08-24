<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\User\Http\Controllers'], function () {
	Route::get('settings', 'SettingsController@index')->name('settings.index');
	Route::get('settings/account', 'SettingsController@editAccount')->name('settings.account.edit');
	Route::match(['put', 'patch'], 'settings/account', 'SettingsController@updateAccount')->name('settings.account.update');
});
