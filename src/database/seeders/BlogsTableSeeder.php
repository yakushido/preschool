<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'id' => 1,
                'title' => 'test1',
                'img_path' => 'img/blog_test1.jpg',
                'content' => 'test1'
            ],
            [
                'id' => 2,
                'title' => 'test2',
                'img_path' => 'img/blog_test2.jpg',
                'content' => 'test2'
            ],
            [
                'id' => 3,
                'title' => 'test3',
                'img_path' => 'img/blog_test3.jpg',
                'content' => 'test3'
            ],
            [
                'id' => 4,
                'title' => 'test4',
                'img_path' => 'img/blog_test4.jpg',
                'content' => 'test4'
            ],
            [
                'id' => 5,
                'title' => 'test5',
                'img_path' => 'img/blog_test5.jpg',
                'content' => 'test5'
            ],
            [
                'id' => 6,
                'title' => 'test6',
                'img_path' => 'img/blog_test6.jpg',
                'content' => 'test6'
            ],
            [
                'id' => 7,
                'title' => 'test7',
                'img_path' => 'img/blog_test7.jpg',
                'content' => 'test7'
            ],
            [
                'id' => 8,
                'title' => 'test8',
                'img_path' => 'img/blog_test8.jpg',
                'content' => 'test8'
            ],
            [
                'id' => 9,
                'title' => 'test9',
                'img_path' => 'img/blog_test9.jpg',
                'content' => 'test9'
            ],
            [
                'id' => 10,
                'title' => 'test10',
                'img_path' => 'img/blog_test10.jpg',
                'content' => 'test10'
            ]
        ]);
    }
}
