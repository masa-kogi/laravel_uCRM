<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => '心電計',
                'secondary_category_id' => '1',
                'item_code' => 'ECG-2500',
                'memo' => '心電計の詳細',
                'price' => 250000,
            ],
            [
                'name' => '長時間心電図解析装置',
                'secondary_category_id' => '2',
                'item_code' => 'DSC-5000',
                'memo' => '長時間心電図解析装置の詳細',
                'price' => 300000,
            ],
            [
                'name' => '脳波計',
                'secondary_category_id' => '3',
                'item_code' => 'EEG-1200',
                'memo' => '脳波計の詳細',
                'price' => 350000,
            ],
            [
                'name' => 'EEGヘッドセット',
                'secondary_category_id' => '3',
                'item_code' => 'AE-120A',
                'memo' => 'ヘッドセットの詳細',
                'price' => 180000,
            ],
            [
                'name' => 'ベッドサイドモニタ',
                'secondary_category_id' => '4',
                'item_code' => 'BSM-6000',
                'memo' => 'ベッドサイドモニタの詳細',
                'price' => 400000,
            ],
            [
                'name' => 'ベッドサイドモニタ',
                'secondary_category_id' => '4',
                'item_code' => 'PVM-4000',
                'memo' => 'ベッドサイドモニタの詳細',
                'price' => 380000,
            ],
            [
                'name' => 'CO2センサキット',
                'secondary_category_id' => '5',
                'item_code' => 'TG-980',
                'memo' => 'CO2センサキットの詳細',
                'price' => 9000,
            ],
            [
                'name' => '人工呼吸器',
                'secondary_category_id' => '6',
                'item_code' => 'NKV-330',
                'memo' => '人工呼吸器の詳細',
                'price' => 1000000,
            ],
            [
                'name' => '人工呼吸器',
                'secondary_category_id' => '6',
                'item_code' => 'HAMILTON-C',
                'memo' => '人工呼吸器の詳細',
                'price' => 1200000,
            ],
            [
                'name' => 'デフィブリレータ',
                'secondary_category_id' => '7',
                'item_code' => 'TEC-8300',
                'memo' => 'デフィブリレータの詳細',
                'price' => 420000,
            ],
            [
                'name' => 'AED',
                'secondary_category_id' => '8',
                'item_code' => 'AED-3100',
                'memo' => 'AEDの詳細',
                'price' => 230000,
            ],
            [
                'name' => '全自動血球計数器',
                'secondary_category_id' => '9',
                'item_code' => 'MEK-9100',
                'memo' => '全自動血球計数器の詳細',
                'price' => 510000,
            ],
            [
                'name' => '全自動血球計数器',
                'secondary_category_id' => '9',
                'item_code' => 'MEK-1300',
                'memo' => '全自動血球計数器の詳細',
                'price' => 550000,
            ],


        ]);
    }
}
