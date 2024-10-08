<?php

namespace Database\Seeders;

use App\Models\CompanyList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyListSeeder extends Seeder
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
                'company_name' => 'Tech Solutions',
                'website_url' => 'https://www.techsolutions.com',
                'email' => 'contact@techsolutions.com',
                'contact_no' => '1234567890',
                'postalcode' => '12345',
                'invoice_number_slug' => 'TS-INV',
                'address' => '123 Tech Street, Silicon Valley, CA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_name' => 'Creative Agency',
                'website_url' => 'https://www.creativeagency.com',
                'email' => 'info@creativeagency.com',
                'contact_no' => '0987654321',
                'postalcode' => '54321',
                'invoice_number_slug' => 'CA-INV',
                'address' => '456 Creative Ave, New York, NY',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        CompanyList::insert($data);
    }
}
