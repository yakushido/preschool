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
            AttendancesTableSeeder::class,
            ReasonsTableSeeder::class,
            GendersTableSeeder::class,
            AdminsTableSeeder::class,
            TeachersTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
