<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reasons')->insert([
            [
                'id' => 1,
                'name' => '発熱'
            ],
            [
                'id' => 2,
                'name' => '腹痛・下痢'
            ],
            [
                'id' => 3,
                'name' => '頭痛'
            ],
            [
                'id' => 4,
                'name' => '嘔吐'
            ],
            [
                'id' => 5,
                'name' => '皮膚炎'
            ],
            [
                'id' => 6,
                'name' => '病院'
            ],
            [
                'id' => 97,
                'name' => '家族の体調不良'
            ],
            [
                'id' => 98,
                'name' => '冠婚葬祭'
            ],
            [
                'id' => 99,
                'name' => 'その他'
            ],
        ]);
    }
}
