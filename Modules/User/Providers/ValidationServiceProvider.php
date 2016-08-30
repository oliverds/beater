<?php

namespace Modules\User\Providers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        Validator::extend('old_password', function ($attribute, $value, $parameters) {
            return Hash::check($value, current($parameters));
        });
    }
}
