<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
                'name' => 'Laptop',
                'price' => 1200.00,
                'old_price' => 1400.00,
                'description' => 'A high-performance laptop suitable for all your work needs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smartphone',
                'price' => 800.00,
                'old_price' => 1000.00,
                'description' => 'A latest-generation smartphone with all the newest features.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wireless Headphones',
                'price' => 150.00,
                'old_price' => 200.00,
                'description' => 'Noise-cancelling wireless headphones for an immersive audio experience.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smartwatch',
                'price' => 300.00,
                'old_price' => 350.00,
                'description' => 'A stylish smartwatch with health and fitness tracking features.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gaming Console',
                'price' => 500.00,
                'old_price' => 600.00,
                'description' => 'A powerful gaming console with 4K gaming support.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Product::insert($data);
    }
}
