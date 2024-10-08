<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
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
                'color_name' => 'Red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'color_name' => 'Green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'color_name' => 'Blue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'color_name' => 'Yellow',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'color_name' => 'Black',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Color::insert($data);
    }
}
