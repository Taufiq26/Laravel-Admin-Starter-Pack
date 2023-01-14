<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            [
                'id' => '70f007fc-51f9-494f-aacf-d5a311c62c04',
                'user_id' => '272b9945-3b5e-4492-a078-4d99e00da6a9',
                'full_name' => 'Taufiq Ridwan',
                'email' => 'taufiq@smartpixel.id',
                'address' => 'Cimahi Selatan',
                'phone' => '081910469248',
                'is_verified' => '1',
            ],
            [
                'id' => 'dc57cf78-d3f3-43e3-9e8c-1e1d5bbf99c8',
                'user_id' => '093e6a45-e81b-4c9b-977a-002c26d4ebcf',
                'full_name' => 'Demo User',
                'email' => 'demo_user@gmail.com',
                'address' => 'Cimahi Selatan',
                'phone' => '0',
                'is_verified' => '1',
            ],
        ]);
    }
}
