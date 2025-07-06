<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //     $customers = [
    //         [
    //         'name' => 'customer',
    //         'email' => 'customer@gmail.com',
    //         'password' => Hash::make('12345678')
    //         ],
    //           [
    //         'name' => 'customer 2',
    //         'email' => 'custome2r@gmail.com',
    //         'password' => Hash::make('12345678')
    //           ],
    //             [
    //         'name' => 'customer 3',
    //         'email' => 'customer3@gmail.com',
    //         'password' => Hash::make('12345678')
    //     ]
    // ];
    //    foreach ($customers as $customer) {
    //     Customers::create($customer);
    //    }

      Customers::factory(100)->create();
    }
}
