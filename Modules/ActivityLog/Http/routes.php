<?php

// Users
Route::group(['prefix' => config('app.cp_route'), 'middleware' => ['web', 'auth']], function () {
    Route::group(['prefix' => 'activity'], function () {
        Route::group(['namespace' => 'Modules\ActivityLog\Http\Controllers\Back'], function () {
            Route::get('/', 'ActivityLogController@index')->name('cp.activitylog');
        });
    });
});