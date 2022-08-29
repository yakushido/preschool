<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserAttendance;

class UserAttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAttendance::factory()->count(50)->create();
    }
}
