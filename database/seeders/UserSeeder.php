<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '272b9945-3b5e-4492-a078-4d99e00da6a9',
                'role_id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
                'username' => 'admin',
                'password' => Hash::make('Sup3rDup3rPWD'),
            ],
            [
                'id' => '093e6a45-e81b-4c9b-977a-002c26d4ebcf',
                'role_id' => '67b885dd-382b-43c8-bbdc-9eb9fc14b574',
                'username' => 'demo_user',
                'password' => Hash::make('D3m0U53rPWD'),
            ]
        ]);
    }
}
