<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'order-index',
            'order-create',
            'order-edit',
            'order-delete',

            'orderProduct-index',
            'orderProduct-create',
            'orderProduct-edit',
            'orderProduct-delete',

            'sale-index',
            'sale-create',
            'sale-edit',
            'sale-delete',

            'inventory-index',
            'inventory-create',
            'inventory-edit',
            'inventory-delete',

            'assignment-index',
            'assignment-create',
            'assignment-edit',
            'assignment-delete',

            'area-index',
            'area-create',
            'area-edit',
            'area-delete',

            'provider-index',
            'provider-create',
            'provider-edit',
            'provider-delete',

            'role-index',
            'role-create',
            'role-edit',
            'role-delete',

            'user-index',
            'user-create',
            'user-edit',
            'user-delete',
         ];
      
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
