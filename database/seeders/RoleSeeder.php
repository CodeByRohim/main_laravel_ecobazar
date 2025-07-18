<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin',
            'moderator',
            'product-manager',
            'accountant',
            'customer-support',
        ];
       foreach($roles as $role){
         $role = Role::create(['name' => $role]);
       }
    }
}
