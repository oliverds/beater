<?php

namespace Modules\User\Database\Seeders;

use Modules\User\Entities\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends UserDatabaseSeeder
{
    const USERS = [
        'Oliver' => 'oliver',
        'Chema' => 'chema',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate((new User())->getTable());

        $this->seedAdmins();
        $this->seedMembers();
    }

    public function seedAdmins()
    {
        collect($this::USERS)->each(function ($username, $name) {
            $user = User::create([
                'name' => $name,
                'email' => $username . '@open-classifieds.com',
                'password' => app()->environment('local') ? strtolower($name) : string()->random(),
                'username' => $username,
            ]);
            $user->assignRole('admin');
        });
    }

    public function seedMembers()
    {
        collect($this::USERS)->each(function ($username, $name) {
            $user = User::create([
                'name' => $name,
                'email' => $username . '+1@open-classifieds.com',
                'password' => app()->environment('local') ? strtolower($name) : string()->random(),
                'username' => $username . '_1',
            ]);
            $user->assignRole('member');
        });
    }
}
