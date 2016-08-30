<?php

namespace Modules\User\Entities;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function byEmail($email)
    {
        return static::where('email', $email)->firstOrFail();
    }

    public function setPasswordAttribute(string $value)
    {
        if (is_null($value)) {
            $this->attributes['password'] = null;
            return;
        }
        $this->attributes['password'] = bcrypt($value);
    }

    public function isCurrentUser(): bool
    {
        return $this->id === auth()->id();
    }
}
