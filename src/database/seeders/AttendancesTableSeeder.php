<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendances')->insert([
            [
                'id' => 1,
                'name' => '出席'
            ],
            [
                'id' => 2,
                'name' => '欠席'
            ],
            [
                'id' => 3,
                'name' => '遅刻'
            ],
            [
                'id' => 4,
                'name' => '早退'
            ],
        ]);
    }
}
