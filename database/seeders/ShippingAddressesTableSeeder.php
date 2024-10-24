<?php

namespace Database\Seeders;

use App\Models\ShippingAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingAddressesTableSeeder extends Seeder
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
                'company_id' => 1,
                'shipping_name' => 'John Doe',
                'shippling_address' => '123 Main St, Springfield, IL, 62701',
                'shippling_mobile_number' => '1234567890',
                'shippling_tax_number' => 'TAX123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 1,
                'shipping_name' => 'Jane Smith',
                'shippling_address' => '456 Oak St, Chicago, IL, 60616',
                'shippling_mobile_number' => '9876543210',
                'shippling_tax_number' => 'TAX654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 2,
                'shipping_name' => 'Michael Johnson',
                'shippling_address' => '789 Pine St, Los Angeles, CA, 90001',
                'shippling_mobile_number' => '5551234567',
                'shippling_tax_number' => 'TAX654331',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        ShippingAddress::insert($data);
    }
}
