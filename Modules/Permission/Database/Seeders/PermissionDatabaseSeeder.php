<?php

namespace Modules\Permission\Database\Seeders;

use Illuminate\Support\Facades\Cache;
use Modules\Seeders\Entities\DatabaseSeeder as Seeder;

class PermissionDatabaseSeeder extends Seeder
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

        $this->call(RolesTableSeeder::class);
    }
}
