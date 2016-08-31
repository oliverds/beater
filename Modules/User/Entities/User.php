<?php

namespace Modules\User\Entities;

use Modules\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles, Notifiable, LogsActivity;

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

    protected static $logAttributes = [
        'name', 'email', 'username',
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

    public function getDescriptionForEvent(string $eventName): string
    {
        return str_replace([':event.name', ':model.name'],
            [$eventName, 'User'],
            ':model.name :subject.name was :event.name');
    }
}
