<?php

namespace Database\Seeders;

use App\Models\CategoryList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryListSeeder extends Seeder
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
                'category_name' => 'Electronics',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Furniture',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Clothing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Books',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Toys',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        CategoryList::insert($data);
    }
}
