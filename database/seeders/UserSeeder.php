<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'id' => Str::uuid(),
            'role_id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
            'email' => 'admin@smartpixel.id',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'username' => 'Super Admin',
            'password' => Hash::make('Sup3rDup3rPWD'),
        ]);
    }
}
