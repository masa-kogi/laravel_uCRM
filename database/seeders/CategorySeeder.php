<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => '心電計',
            ],
            [
                'name' => '脳波計',
            ],
            [
                'name' => 'ベッドサイドモニタ',
            ],
            [
                'name' => '人工呼吸器',
            ],
            [
                'name' => '除細動器',
            ],
            [
                'name' => '血球計数器',
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => '心電計',
                'primary_category_id' => '1'
            ],
            [
                'name' => 'ホルタ心電計',
                'primary_category_id' => '1'
            ],
            [
                'name' => '脳波計',
                'primary_category_id' => '2'
            ],
            [
                'name' => 'ベッドサイドモニタ',
                'primary_category_id' => '3'
            ],
            [
                'name' => 'センサ類',
                'primary_category_id' => '3'
            ],
            [
                'name' => '人工呼吸器',
                'primary_category_id' => '4'
            ],
            [
                'name' => '除細動器',
                'primary_category_id' => '5'
            ],
            [
                'name' => 'AED',
                'primary_category_id' => '5'
            ],
            [
                'name' => '血球計数器',
                'primary_category_id' => '6'
            ],

        ]);
    }
}
