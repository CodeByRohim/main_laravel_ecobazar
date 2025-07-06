<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionAsignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin: all permission
        $role = Role::where('name','admin')->firstOrFail();
        $allPermission = Permission::get();
        $role->syncPermissions($allPermission);
        $user = User::where('email','arohim17577@gmail.com')->first();
        $user->assignRole($role);

       // Moderator: product permission 
       $role = Role::where('name','moderator')->firstOrFail();
       $Moderatorpermission = Permission::whereIn('group_name', ['product', 'category'])->get();
       $role->syncPermissions($Moderatorpermission);
       $user = User::where('email','habib@gmail.com')->first();
       $user->assignRole($role);

      // Product Manager: product permission
      $role = Role::where('name','product-manager')->first();
      $productManagerPermission = Permission::where('group_name', 'product')->get();
      $role->syncPermissions($productManagerPermission);
      $user = User::where('email','manager@gmail.com')->first();
      $user->assignRole($role);
    }
}
