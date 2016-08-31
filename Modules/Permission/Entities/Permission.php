<?php

namespace Modules\Permission\Entities;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    use LogsActivity;

    protected static $logAttributes = ['name'];

    public function getDescriptionForEvent(string $eventName): string
    {
    	return str_replace([':event.name', ':model.name'],
    		[$eventName, 'Permission'],
    		':model.name :subject.name was :event.name');
    }

    public function getLogNameToUse(string $eventName = ''): string
    {
       return 'Permission';
    }
}