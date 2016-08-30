<?php

Route::group([
    'middleware' => ['web'],
    'namespace' => 'Modules\Permission\Http\Controllers\Back',
    'prefix' => config('app.cp_route'),
], function () {
    Route::resource('users/roles', 'RoleController', ['names' => [
        'store' => 'cp.roles.store',
        'index' => 'cp.roles.index',
        'create' => 'cp.roles.create',
        'destroy' => 'cp.roles.destroy',
        'update' => 'cp.roles.update',
        'show' => 'cp.roles.show',
        'edit' => 'cp.roles.edit',
    ]]);
});
