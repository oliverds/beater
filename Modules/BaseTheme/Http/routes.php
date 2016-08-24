<?php

Route::group(['middleware' => 'web', 'prefix' => 'home', 'namespace' => 'Modules\BaseTheme\Http\Controllers'], function () {
    Route::get('/', 'BaseThemeController@index');
});
