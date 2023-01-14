<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_access')->insert([
            [
                'id' => '14e02c3d-6316-40e9-b08e-0f0b412940cb',
                'role_id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
                'menu_id' => '2df2c2c1-8348-4c5f-ab48-452701566bc7',
                'view' => 1,
                'create' => 1,
                'update' => 1,
                'delete' => 1,
            ],
            [
                'id' => '31cc8595-69e1-4e58-977b-2a2b98fe0ac7',
                'role_id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
                'menu_id' => 'e4e9e6b4-f421-42db-bafe-10c3a7ff45fc',
                'view' => 1,
                'create' => 1,
                'update' => 1,
                'delete' => 1,
            ],
            [
                'id' => '52c0e701-8682-47c4-8a10-5ea8970c141e',
                'role_id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
                'menu_id' => '2926845d-d792-4ebd-9ce6-090de62328c1',
                'view' => 1,
                'create' => 1,
                'update' => 1,
                'delete' => 1,
            ],
            [
                'id' => '6f83ae97-1d51-4e49-b0f6-677a5b0cd4d7',
                'role_id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
                'menu_id' => '898a77c5-e21f-46f7-9092-3eb71aef1f7e',
                'view' => 1,
                'create' => 1,
                'update' => 1,
                'delete' => 1,
            ],
            [
                'id' => '78a2b7dc-ea40-49ac-8cca-54146502267b',
                'role_id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
                'menu_id' => '9f8b78b9-5856-4653-8970-ea125971f4cb',
                'view' => 1,
                'create' => 1,
                'update' => 1,
                'delete' => 1,
            ],
            [
                'id' => 'a5217ad9-9bdd-4d3b-a799-d959c4e55606',
                'role_id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
                'menu_id' => '68cfe24e-2b70-4c0a-8cd3-50aa53856bc9',
                'view' => 1,
                'create' => 1,
                'update' => 1,
                'delete' => 1,
            ],
            [
                'id' => 'a5309fb7-56a8-4c39-8362-a58a39382312',
                'role_id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
                'menu_id' => 'da80dfc4-d80b-4673-83ea-2021fa380bef',
                'view' => 1,
                'create' => 1,
                'update' => 1,
                'delete' => 1,
            ],
            [
                'id' => 'bdf61684-c2fc-47d5-9a88-6e9076b537a2',
                'role_id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
                'menu_id' => 'b6cd076b-691e-4fb9-b4b7-ac7d12234846',
                'view' => 1,
                'create' => 1,
                'update' => 1,
                'delete' => 1,
            ],
            [
                'id' => 'd1e94377-f63d-4090-82ca-bca83e661990',
                'role_id' => '62dffe94-5b08-45fe-9121-eb8177fa5721',
                'menu_id' => '35ea5852-b821-43e2-acea-78aa2381760c',
                'view' => 1,
                'create' => 0,
                'update' => 0,
                'delete' => 0,
            ],
        ]);
    }
}
