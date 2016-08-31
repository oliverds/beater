<?php

namespace Modules\Permission\Entities;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    use LogsActivity;

    protected static $logAttributes = ['name'];

    public function getDescriptionForEvent(string $eventName): string
    {
    	return str_replace([':event.name', ':model.name'],
            [$eventName, 'Role'],
            ':model.name :subject.name was :event.name');
    }

    public function syncPermissionTo(...$permissions)
    {
        $this->permissions()->detach();

        return $this->givePermissionTo($permissions);
    }
}