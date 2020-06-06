<?php

use App\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => '1',
                'name'       => 'Lead',
                'created_at' => '2020-06-06 00:28:37',
                'updated_at' => '2020-06-06 00:28:37',
            ],
            [
                'id'         => '2',
                'name'       => 'Customer',
                'created_at' => '2020-06-06 00:28:37',
                'updated_at' => '2020-06-06 00:28:37',
            ],
            [
                'id'         => '3',
                'name'       => 'Partner',
                'created_at' => '2020-06-06 00:28:37',
                'updated_at' => '2020-06-06 00:28:37',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
