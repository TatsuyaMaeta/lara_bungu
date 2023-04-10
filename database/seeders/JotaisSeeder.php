<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JotaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jotais')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => '納期調整中',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => '出荷済',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'name' => 'キャンセル',
            ],
        ]);
    }
}
