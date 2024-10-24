<?php

namespace Database\Seeders;

use App\Models\BillingAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillingAddressSeeder extends Seeder
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
                'full_name' => 'John Doe',
                'billing_address' => '123 Main St, Anytown, USA',
                'billing_mobile_number' => '1234567890',
                'billing_tax_number' => 'TAX123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 2,
                'full_name' => 'Jane Smith',
                'billing_address' => '456 Elm St, Othertown, USA',
                'billing_mobile_number' => '0987654321',
                'billing_tax_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];


        BillingAddress::insert($data);
    }
}
