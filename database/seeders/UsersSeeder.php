<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
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
                'name' => "hanaco",
                'email' => "hanaco@hanaco.jp",
                'email_verified_at' => null,
                'password' => '$2y$10$jmaqlnXv9MejaOKTId6hL.kA..GJioCpITm9NgHEogm7ge49hJT5q',
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'name' => "taro",
                'email' => "taro@taro.jp",
                'email_verified_at' => null,
                'password' => '$2y$10$jmaqlnXv9MejaOKTId6hL.kA..GJioCpITm9NgHEogm7ge49hJT5q',
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
        ]);
    }
}
