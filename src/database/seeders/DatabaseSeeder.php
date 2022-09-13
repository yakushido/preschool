<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TeamsTableSeeder::class,
            EventsTableSeeder::class,
            AttendancesTableSeeder::class,
            AdminsTableSeeder::class,
            EventDatesTableSeeder::class,
            UsersTableSeeder::class,
            TeachersTableSeeder::class
        ]);
    }
}
