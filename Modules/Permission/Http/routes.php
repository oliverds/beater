<?php

Route::group(['middleware' => 'web', 'prefix' => 'permission', 'namespace' => 'Modules\Permission\Http\Controllers'], function () {
    Route::get('/', 'PermissionController@index');
});
