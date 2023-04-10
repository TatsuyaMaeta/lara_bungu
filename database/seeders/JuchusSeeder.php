<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JuchusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('juchus')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'kyakusaki_id' => 1,
                'bunbougu_id' => 21,
                'kosu' => 5,
                'jotai' => 1,
                'user_id' => 1
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'kyakusaki_id' => 2,
                'bunbougu_id' => 22,
                'kosu' => 8,
                'jotai' => 1,
                'user_id' => 2
            ],            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'kyakusaki_id' => 1,
                'bunbougu_id' => 21,
                'kosu' => 2,
                'jotai' => 1,
                'user_id' => 1
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'kyakusaki_id' => 1,
                'bunbougu_id' => 22,
                'kosu' => 3,
                'jotai' => 2,
                'user_id' => 2
            ],
        ]);
    }
}
