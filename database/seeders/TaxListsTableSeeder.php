<?php

namespace Database\Seeders;

use App\Models\TaxList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxListsTableSeeder extends Seeder
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
                'tax_name' => 'VAT',
                'tax_rate_in' => '10',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tax_name' => 'GST',
                'tax_rate_in' => '12',
                'status' => 'Disabled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tax_name' => 'Service Tax',
                'tax_rate_in' => '5',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        TaxList::insert($data);
    }
}
