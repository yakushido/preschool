<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            [
                'id' => 1,
                'name' => 'teacher1',
                'email' => 'teacher1@example.com',
                'password' => Hash::make('teacher1@example.com'),
                'team_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'teacher2',
                'email' => 'teacher2@example.com',
                'password' => Hash::make('teacher2@example.com'),
                'team_id' => 2
            ],
            [
                'id' => 3,
                'name' => 'teacher3',
                'email' => 'teacher3@example.com',
                'password' => Hash::make('teacher3@example.com'),
                'team_id' => 3
            ],
            [
                'id' => 4,
                'name' => 'teacher4',
                'email' => 'teacher4@example.com',
                'password' => Hash::make('teacher4@example.com'),
                'team_id' => 4
            ],
            [
                'id' => 5,
                'name' => 'teacher5',
                'email' => 'teacher5@example.com',
                'password' => Hash::make('teacher5@example.com'),
                'team_id' => 5
            ],
            [
                'id' => 6,
                'name' => 'teacher6',
                'email' => 'teacher6@example.com',
                'password' => Hash::make('teacher6@example.com'),
                'team_id' => 6
            ]
        ]);
    }
}
