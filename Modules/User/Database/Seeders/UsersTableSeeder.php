<?php

namespace Modules\User\Database\Seeders;

use Modules\User\Entities\User;

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
        $this->seedSubscriptors();
	}

	public function seedAdmins()
    {
        collect($this::USERS)->each(function ($username, $name) {
            User::create([
                'name' => $name,
                'email' => $username . '@open-classifieds.com',
                //'password' => app()->environment('local') ? strtolower($firstName) : string()->random(),
                'username' => $username,
            ]);
        });
    }

    public function seedSubscriptors()
    {
        collect($this::USERS)->each(function ($username, $name) {
            User::create([
                'name' => $name,
                'email' => $username . '+1@open-classifieds.com',
                //'password' => app()->environment('local') ? strtolower($firstName) : string()->random(),
                'username' => $username . '_1',
            ]);
        });
    }
}
