<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions=[
            'role-list',
            'role-create',
            'role-edit',
            'role-show',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'product-show',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'category-show',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-show',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
