<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypesTableSeeder extends Seeder
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
                'name' => 'Card',
                'created_at' => now(),
                'updated_at' => now(),
            ],
//            [
//                'name' => 'Card',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
//            [
//                'name' => 'PayPal',
//                'created_at' => now(),
//                'updated_at' => now(),
//            ],
            [
                'name' => 'Bank Transfer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cash on Delivery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PaymentType::insert($data);
    }
}
