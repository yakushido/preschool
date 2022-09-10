<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            [
                'id' => 1,
                'team_id' => 1,
                'img_path' => 'img/blog_test1.jpg',
            ],
            [
                'id' => 2,
                'team_id' => 1,
                'img_path' => 'img/blog_test2.jpg',
            ],
            [
                'id' => 3,
                'team_id' => 1,
                'img_path' => 'img/blog_test3.jpg',
            ],
            [
                'id' => 4,
                'team_id' => 1,
                'img_path' => 'img/blog_test4.jpg',
            ],
            [
                'id' => 5,
                'team_id' => 1,
                'img_path' => 'img/blog_test5.jpg',
            ],
            [
                'id' => 6,
                'team_id' => 1,
                'img_path' => 'img/blog_test6.jpg',
            ],
            [
                'id' => 7,
                'team_id' => 1,
                'img_path' => 'img/blog_test7.jpg',
            ],
            [
                'id' => 8,
                'team_id' => 1,
                'img_path' => 'img/blog_test8.jpg',
            ],
            [
                'id' => 9,
                'team_id' => 1,
                'img_path' => 'img/blog_test9.jpg',
            ],
            [
                'id' => 10,
                'team_id' => 1,
                'img_path' => 'img/blog_test10.jpg',
            ]
        ]);
    }
}
