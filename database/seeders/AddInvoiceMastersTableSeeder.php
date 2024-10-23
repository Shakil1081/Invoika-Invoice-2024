<?php

namespace Database\Seeders;

use App\Models\AddInvoiceMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddInvoiceMastersTableSeeder extends Seeder
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
                'invoice_number' => 'INV001',
                'inv_date' => '2024-09-15 00:00:00',
                'sub_total' => 1000.00,
                'discount' => 1,
                'tax' => 1,
                'shipping_charge' => 1,
                'total_amount' => 970.00,
                'notes' => 'Payment due within 30 days',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_number' => 'INV002',
                'inv_date' => '2024-09-16 00:00:00',
                'sub_total' => 1500.00,
                'discount' => 1,
                'tax' => 2,
                'shipping_charge' => 1,
                'total_amount' => 1450.00,
                'notes' => 'Payment due within 15 days',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        AddInvoiceMaster::insert($data);
    }
}
