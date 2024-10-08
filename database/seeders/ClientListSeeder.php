<?php

namespace Database\Seeders;

use App\Models\ClientList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientListSeeder extends Seeder
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
                'first_name' => 'John',
                'last_name' => 'Doe',
                'username' => 'johndoe',
                'mobile_number' => '1234567890',
                'email' => 'johndoe@example.com',
                'country' => 'USA',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'username' => 'janesmith',
                'mobile_number' => '0987654321',
                'email' => 'janesmith@example.com',
                'country' => 'Canada',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        ClientList::insert($data);
    }
}
