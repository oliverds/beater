<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Support\Facades\Cache;
use Modules\Seeders\Entities\DatabaseSeeder as Seeder;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::run();

        Cache::flush();

        $this->call(UsersTableSeeder::class);
    }
}
