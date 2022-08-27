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
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',

            'orderProduct-list',
            'orderProduct-create',
            'orderProduct-edit',
            'orderProduct-delete',

            'sale-list',
            'sale-create',
            'sale-edit',
            'sale-delete',

            'inventory-list',
            'inventory-create',
            'inventory-edit',
            'inventory-delete',

            'assignment-list',
            'assignment-create',
            'assignment-edit',
            'assignment-delete',

            'organization-list',
            'organization-create',
            'organization-edit',
            'organization-delete',

            'provider-list',
            'provider-create',
            'provider-edit',
            'provider-delete',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
         ];
      
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
