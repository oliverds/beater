<?php

namespace Modules\Permission\Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends PermissionDatabaseSeeder
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
