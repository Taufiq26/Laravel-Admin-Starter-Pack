<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
                'name' => 'Admin',
                'description' => 'All Access Menu',
            ],
            [
                'id' => '67b885dd-382b-43c8-bbdc-9eb9fc14b574',
                'name' => 'User',
                'description' => 'Show All Menu',
            ],
        ]);
    }
}
