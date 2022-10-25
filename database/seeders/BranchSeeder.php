<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            [
                'name' => '北海道支店',
            ],
            [
                'name' => '東北支店',
            ],
            [
                'name' => '東関東支店',
            ],
            [
                'name' => '北関東支店',
            ],
            [
                'name' => '東京支店',
            ],
            [
                'name' => '南関東支店',
            ],
            [
                'name' => '中部支店',
            ],
            [
                'name' => '関西支店',
            ],
            [
                'name' => '中国支店',
            ],
            [
                'name' => '四国支店',
            ],
            [
                'name' => '九州支店',
            ],
        ]);
    }
}
