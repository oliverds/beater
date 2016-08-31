<?php

use Modules\Permission\Entities\Permission;

class PermissionSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate(config('laravel-permission.table_names.permissions'));
        $this->truncate(config('laravel-permission.table_names.user_has_permissions'));

        $this->seedPermissions();
    }

    public function seedPermissions()
    {
        $permissions = [
            'super',

            // Control Panel
            'cp',
            'cp.dashboard',

            // Users
            'cp.users',
            'cp.user.create',
            'cp.user',
            'cp.user.update',
            'cp.user.delete',

            // User Roles
            'cp.user.roles',
            'cp.user.role.create',
            'cp.user.role',
            'cp.user.role.update',
            'cp.user.role.delete',

            // Activity
            'cp.activitylog',
        ];

        collect($permissions)->each(function ($permission) {
            $role = Permission::create(['name' => $permission]);
        });
    }
}
