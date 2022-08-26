<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'id' => 1,
                'name' => 'さくら'
            ],
            [
                'id' => 2,
                'name' => 'もも'
            ],
            [
                'id' => 3,
                'name' => 'うめ'
            ],
            [
                'id' => 4,
                'name' => 'すみれ'
            ],
            [
                'id' => 5,
                'name' => 'もみじ'
            ],
            [
                'id' => 6,
                'name' => 'つぼみ'
            ],
        ]);
    }
}
