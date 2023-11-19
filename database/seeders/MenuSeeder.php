<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'id' => '2926845d-d792-4ebd-9ce6-090de62328c1',
                'prefix' => '-',
                'parent_id' => 'e4e9e6b4-f421-42db-bafe-10c3a7ff45fc',
                'name' => 'Users',
                'icon' => '-',
                'url' => 'users',
                'status' => 1,
                'order_num' => 4,
            ],
            [
                'id' => '8240964a-f1ea-4cfe-9930-e5390739a212',
                'prefix' => '-',
                'parent_id' => 'e4e9e6b4-f421-42db-bafe-10c3a7ff45fc',
                'name' => 'Menus Access',
                'icon' => '-',
                'url' => 'menus-access',
                'status' => 1,
                'order_num' => 3,
            ],
            [
                'id' => '2df2c2c1-8348-4c5f-ab48-452701566bc7',
                'prefix' => '-',
                'parent_id' => 'e4e9e6b4-f421-42db-bafe-10c3a7ff45fc',
                'name' => 'Menus',
                'icon' => '-',
                'url' => 'menus',
                'status' => 1,
                'order_num' => 2,
            ],
            [
                'id' => '35ea5852-b821-43e2-acea-78aa2381760c',
                'prefix' => '-',
                'parent_id' => 'da80dfc4-d80b-4673-83ea-2021fa380bef',
                'name' => 'Default',
                'icon' => '-',
                'url' => 'index',
                'status' => 1,
                'order_num' => 2,
            ],
            [
                'id' => '68cfe24e-2b70-4c0a-8cd3-50aa53856bc9',
                'prefix' => '-',
                'parent_id' => 'da80dfc4-d80b-4673-83ea-2021fa380bef',
                'name' => 'Main',
                'icon' => '-',
                'url' => 'index',
                'status' => 1,
                'order_num' => 1,
            ],
            [
                'id' => '898a77c5-e21f-46f7-9092-3eb71aef1f7e',
                'prefix' => '-',
                'parent_id' => null,
                'name' => 'General',
                'icon' => '-',
                'url' => '#',
                'status' => 1,
                'order_num' => 1,
            ],
            [
                'id' => '9f8b78b9-5856-4653-8970-ea125971f4cb',
                'prefix' => '-',
                'parent_id' => null,
                'name' => 'Setup',
                'icon' => '-',
                'url' => '#',
                'status' => 1,
                'order_num' => 1,
            ],
            [
                'id' => 'b6cd076b-691e-4fb9-b4b7-ac7d12234846',
                'prefix' => '-',
                'parent_id' => 'e4e9e6b4-f421-42db-bafe-10c3a7ff45fc',
                'name' => 'Roles',
                'icon' => '-',
                'url' => 'roles',
                'status' => 1,
                'order_num' => 1,
            ],
            [
                'id' => 'da80dfc4-d80b-4673-83ea-2021fa380bef',
                'prefix' => '/dashboard',
                'parent_id' => '898a77c5-e21f-46f7-9092-3eb71aef1f7e',
                'name' => 'Dashboard',
                'icon' => 'home',
                'url' => '#',
                'status' => 1,
                'order_num' => 1,
            ],
            [
                'id' => 'e4e9e6b4-f421-42db-bafe-10c3a7ff45fc',
                'prefix' => '/users-management',
                'parent_id' => '9f8b78b9-5856-4653-8970-ea125971f4cb',
                'name' => 'Users Management',
                'icon' => 'settings',
                'url' => '#',
                'status' => 1,
                'order_num' => 1,
            ],
        ]);
    }
}
