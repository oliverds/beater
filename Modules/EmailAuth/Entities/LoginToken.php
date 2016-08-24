<?php

namespace Modules\EmailAuth\Entities;

use Modules\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Modules\EmailAuth\Notifications\SendLoginToken;

class LoginToken extends Model
{
    protected $fillable = ['user_id', 'token'];

    public function getRouteKeyName()
    {
        return 'token';
    }

    public static function generateFor(User $user)
    {
        return static::create([
            'user_id' => $user->id,
            'token' => str_random(50)
        ]);
    }

    public function send()
    {
        $this->user->notify(new SendLoginToken($this->token));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
