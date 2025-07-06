<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Abdur rohim',
            'email' => 'arohim17577@gmail.com',
            'password' => Hash::make('password')
        ]);
         User::create([
            'name' => 'Habib',
            'email' => 'habib@gmail.com',
            'password' => Hash::make('password')
        ]);
         User::create([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
