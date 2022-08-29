<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventDatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_dates')->insert([
            [
                'id' => 1,
                'event_id' => 1,
                'date' => '2022-08-01'
            ],
            [
                'id' => 2,
                'event_id' => 2,
                'date' => '2022-08-02'
            ],
            [
                'id' => 3,
                'event_id' => 3,
                'date' => '2022-08-03'
            ],
            [
                'id' => 4,
                'event_id' => 4,
                'date' => '2022-08-04'
            ],
            [
                'id' => 5,
                'event_id' => 5,
                'date' => '2022-08-05'
            ],
            [
                'id' => 6,
                'event_id' => 6,
                'date' => '2022-08-06'
            ],
            [
                'id' => 7,
                'event_id' => 1,
                'date' => '2022-08-07'
            ],
            [
                'id' => 8,
                'event_id' => 2,
                'date' => '2022-08-08'
            ],
            [
                'id' => 9,
                'event_id' => 3,
                'date' => '2022-08-09'
            ],
            [
                'id' => 10,
                'event_id' => 4,
                'date' => '2022-08-10'
            ],
        ]);
    }
}
