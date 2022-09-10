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
            BlogsTableSeeder::class,
            TeamsTableSeeder::class,
            EventsTableSeeder::class,
            AttendancesTableSeeder::class,
            // test
            EventDatesTableSeeder::class,
            TeachersTableSeeder::class,
            UsersTableSeeder::class,
            AdminsTableSeeder::class,
            PhotosTableSeeder::class
        ]);
    }
}
