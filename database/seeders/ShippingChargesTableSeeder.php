<?php

namespace Database\Seeders;

use App\Models\ShippingCharge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingChargesTableSeeder extends Seeder
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
                'tax_name' => 'Standard Shipping',
                'country' => 'United States',
                'tax_rate_in' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tax_name' => 'Expedited Shipping',
                'country' => 'Canada',
                'tax_rate_in' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tax_name' => 'International Shipping',
                'country' => 'United Kingdom',
                'tax_rate_in' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        ShippingCharge::insert($data);
    }
}
