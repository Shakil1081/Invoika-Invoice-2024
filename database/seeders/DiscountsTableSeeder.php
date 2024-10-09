<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountsTableSeeder extends Seeder
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
                'discount_name' => 'Seasonal Discount',
                'rate' => 10, // 10% discount
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'discount_name' => 'Holiday Sale',
                'rate' => 15, // 15% discount
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'discount_name' => 'Clearance Sale',
                'rate' => 20, // 20% discount
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Discount::insert($data);
    }
}
