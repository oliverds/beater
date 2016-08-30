<?php

use Modules\Seeders\Entities\DatabaseSeeder as Seeder;

class DatabaseSeeder extends Seeder
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

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
