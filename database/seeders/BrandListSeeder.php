<?php

namespace Database\Seeders;

use App\Models\BrandList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'brand_name' => 'Brand A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Brand B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Brand C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Brand D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Brand E',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        BrandList::insert($data);
    }
}
