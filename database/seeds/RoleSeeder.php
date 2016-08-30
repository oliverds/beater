<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends DatabaseSeeder
{
    const ROLES = [
        'admin' => 'access back',
        'member' => 'access front'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate((new Role())->getTable());

        $this->seedRoles();
    }

    public function seedRoles()
    {
        collect($this::ROLES)->each(function ($permission, $role) {
            $role = Role::create([
                'name' => $role,
            ]);

            Permission::create(['name' => $permission]);

            $role->givePermissionTo($permission);
        });
    }
}
