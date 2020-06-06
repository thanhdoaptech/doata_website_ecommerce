<?php

use App\AssetStatus;
use Illuminate\Database\Seeder;

class AssetStatusTableSeeder extends Seeder
{
    public function run()
    {
        $assetStatuses = [
            [
                'id'         => '1',
                'name'       => 'Available',
                'created_at' => '2020-06-06 00:58:58',
                'updated_at' => '2020-06-06 00:58:58',
            ],
            [
                'id'         => '2',
                'name'       => 'Not Available',
                'created_at' => '2020-06-06 00:58:58',
                'updated_at' => '2020-06-06 00:58:58',
            ],
            [
                'id'         => '3',
                'name'       => 'Broken',
                'created_at' => '2020-06-06 00:58:58',
                'updated_at' => '2020-06-06 00:58:58',
            ],
            [
                'id'         => '4',
                'name'       => 'Out for Repair',
                'created_at' => '2020-06-06 00:58:58',
                'updated_at' => '2020-06-06 00:58:58',
            ],
        ];

        AssetStatus::insert($assetStatuses);
    }
}
