<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
          'banner' =>  [
               'banner-manage',                 
            ],
           'category' => [
               'edit-category',
               'create-category',
               'delete-category',
               'show-category',      
            ],
          'brand' =>  [
               'edit-brand',
               'create-brand',
               'delete-brand',
               'show-brand',      
            ],
           'product' =>  [
               'edit-product',
               'create-product',
               'delete-product',
               'show-product',      
            ],
          'userManage' =>  [
               'users-manage',     
            ],          
        ];

        foreach($permissions as $key=>$permission){
           foreach($permission as $item){
             Permission::create([
                'name' => $item,
                'group_name' => $key
             ]);
           }
        }
       
    }
}
