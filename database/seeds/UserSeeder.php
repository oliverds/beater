<?php

use Modules\User\Entities\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends DatabaseSeeder
{
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
        $users = [
            'Oliver' => 'oliver',
            'Chema' => 'chema',
            'Constantinos' => 'constantinos',
        ];

        collect($users)->each(function ($username, $name) {
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
        $users = [
            'User' => 'user',
        ];

        collect($users)->each(function ($username, $name) {
            $user = User::create([
                'name' => $name,
                'email' => $username . '@user.com',
                'password' => app()->environment('local') ? strtolower($name) : string()->random(),
                'username' => $username,
            ]);
            $user->assignRole('user');
        });
    }
}
