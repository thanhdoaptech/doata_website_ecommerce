<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => '$2y$10$BDm0tb4lqIykHo2kBG0Vpes..bk85BH/dNYKCOCSqunPFaHgwqgfW',
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2020-06-06 04:26:06',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
