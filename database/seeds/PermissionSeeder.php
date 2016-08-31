<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

            // Users
            'cp.users',
            'cp.user.create',
            'cp.user.store',
            'cp.user',
            'cp.user.edit',
            'cp.user.update',
            'cp.user.delete',

            // User Roles
            'cp.user.roles',
            'cp.user.role.create',
            'cp.user.role.store',
            'cp.user.role',
            'cp.user.role.edit',
            'cp.user.role.update',
            'cp.user.role.delete',
        ];

        collect($permissions)->each(function ($permission) {
            $role = Permission::create(['name' => $permission]);
        });
    }
}
