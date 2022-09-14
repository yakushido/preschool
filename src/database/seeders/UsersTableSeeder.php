<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'user1',
                'email' => 'user1@example.com',
                'password' => Hash::make('user1@example.com'),
                'team_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'user2',
                'email' => 'user2@example.com',
                'password' => Hash::make('user2@example.com'),
                'team_id' => 2
            ],
            [
                'id' => 3,
                'name' => 'user3',
                'email' => 'user3@example.com',
                'password' => Hash::make('user3@example.com'),
                'team_id' => 3
            ],
            [
                'id' => 4,
                'name' => 'user4',
                'email' => 'user4@example.com',
                'password' => Hash::make('user4@example.com'),
                'team_id' => 4
            ],
            [
                'id' => 5,
                'name' => 'user5',
                'email' => 'user5@example.com',
                'password' => Hash::make('user5@example.com'),
                'team_id' => 5
            ],
            [
                'id' => 6,
                'name' => 'user6',
                'email' => 'user6@example.com',
                'password' => Hash::make('user6@example.com'),
                'team_id' => 6
            ],
            [
                'id' => 7,
                'name' => 'user7',
                'email' => 'user7@example.com',
                'password' => Hash::make('user7@example.com'),
                'team_id' => 1
            ],
            [
                'id' => 8,
                'name' => 'user8',
                'email' => 'user8@example.com',
                'password' => Hash::make('user8@example.com'),
                'team_id' => 2
            ],
            [
                'id' => 9,
                'name' => 'user9',
                'email' => 'user9@example.com',
                'password' => Hash::make('user9@example.com'),
                'team_id' => 3
            ],
            [
                'id' => 10,
                'name' => 'user10',
                'email' => 'user10@example.com',
                'password' => Hash::make('user10@example.com'),
                'team_id' => 4
            ],
            [
                'id' => 11,
                'name' => 'user11',
                'email' => 'user11@example.com',
                'password' => Hash::make('user11@example.com'),
                'team_id' => 5
            ],
            [
                'id' => 12,
                'name' => 'user12',
                'email' => 'user12@example.com',
                'password' => Hash::make('user12@example.com'),
                'team_id' => 6
            ],
            [
                'id' => 13,
                'name' => 'user13',
                'email' => 'user13@example.com',
                'password' => Hash::make('user13@example.com'),
                'team_id' => 1
            ],
            [
                'id' => 14,
                'name' => 'user14',
                'email' => 'user14@example.com',
                'password' => Hash::make('user14@example.com'),
                'team_id' => 2
            ],
            [
                'id' => 15,
                'name' => 'user15',
                'email' => 'user15@example.com',
                'password' => Hash::make('user15@example.com'),
                'team_id' => 3
            ],
            [
                'id' => 16,
                'name' => 'user16',
                'email' => 'user16@example.com',
                'password' => Hash::make('user16@example.com'),
                'team_id' => 4
            ],
            [
                'id' => 17,
                'name' => 'user17',
                'email' => 'user17@example.com',
                'password' => Hash::make('user17@example.com'),
                'team_id' => 5
            ],
            [
                'id' => 18,
                'name' => 'user18',
                'email' => 'user18@example.com',
                'password' => Hash::make('user18@example.com'),
                'team_id' => 6
            ],
            [
                'id' => 19,
                'name' => 'user19',
                'email' => 'user19@example.com',
                'password' => Hash::make('user19@example.com'),
                'team_id' => 1
            ],
            [
                'id' => 20,
                'name' => 'user20',
                'email' => 'user20@example.com',
                'password' => Hash::make('user20@example.com'),
                'team_id' => 2
            ],
            [
                'id' => 21,
                'name' => 'user21',
                'email' => 'user21@example.com',
                'password' => Hash::make('user21@example.com'),
                'team_id' => 3
            ],
            [
                'id' => 22,
                'name' => 'user22',
                'email' => 'user22@example.com',
                'password' => Hash::make('user22@example.com'),
                'team_id' => 4
            ],
            [
                'id' => 23,
                'name' => 'user23',
                'email' => 'user23@example.com',
                'password' => Hash::make('user23@example.com'),
                'team_id' => 5
            ],
            [
                'id' => 24,
                'name' => 'user24',
                'email' => 'user24@example.com',
                'password' => Hash::make('user24@example.com'),
                'team_id' => 6
            ]
            ]);
    }
}
