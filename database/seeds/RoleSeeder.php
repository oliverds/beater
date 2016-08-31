<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate(config('laravel-permission.table_names.roles'));
        $this->truncate(config('laravel-permission.table_names.user_has_roles'));
        $this->truncate(config('laravel-permission.table_names.role_has_permissions'));

        $this->seedRoles();
    }

    public function seedRoles()
    {
        $roles = [
            'admin',
            'user',
        ];

        collect($roles)->each(function ($role) {
            $role = Role::create(['name' => $role]);

            if ($role->name == 'admin') {
                $role->givePermissionTo('super');
            }
        });
    }
}
