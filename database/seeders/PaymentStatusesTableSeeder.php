<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentStatusesTableSeeder extends Seeder
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
                'payment_status' => 'Paid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payment_status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payment_status' => 'Failed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payment_status' => 'Refunded',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'payment_status' => 'Cancelled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        PaymentStatus::insert($data);
    }
}
