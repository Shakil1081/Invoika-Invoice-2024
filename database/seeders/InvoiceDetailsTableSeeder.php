<?php

namespace Database\Seeders;

use App\Models\InvoiceDerail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceDetailsTableSeeder extends Seeder
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
                'invoice_id' => 1,
                'rate' => 150.00,
                'quantity' => '2',
                'product_details' => 'Product 1 description',
                'amount' => 300.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 1,
                'rate' => 200.00,
                'quantity' => '3',
                'product_details' => 'Product 2 description',
                'amount' => 600.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_id' => 2,
                'rate' => 200.00,
                'quantity' => '5',
                'product_details' => 'Product 3 description',
                'amount' => 602.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        InvoiceDerail::insert($data);
    }
}
