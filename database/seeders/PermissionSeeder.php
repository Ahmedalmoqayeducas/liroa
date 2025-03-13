<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

// use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        #####admin permissions
        Permission::create(['name' => 'create', 'guard_name' => 'admin']);
        Permission::create(['name' => 'update', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete', 'guard_name' => 'admin']);
        Permission::create(['name' => 'restore', 'guard_name' => 'admin']);

        #####team permissions
        Permission::create(['name' => 'create-team', 'guard_name' => 'admin']);
        Permission::create(['name' => 'update-team', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete-team', 'guard_name' => 'admin']);
        Permission::create(['name' => 'restore-team', 'guard_name' => 'admin']);


        ######posts permissions ######
        Permission::create(['name' => 'create-post', 'guard_name' => 'admin',]);
        Permission::create(['name' => 'read-posts', 'guard_name' => 'admin',]);
        Permission::create(['name' => 'update-post', 'guard_name' => 'admin',]);
        Permission::create(['name' => 'delete-post', 'guard_name' => 'admin',]);

        ######pages permissions ######
        Permission::create(['name' => 'create-page', 'guard_name' => 'admin',]);
        Permission::create(['name' => 'read-pages', 'guard_name' => 'admin',]);
        Permission::create(['name' => 'update-page', 'guard_name' => 'admin',]);
        Permission::create(['name' => 'delete-page', 'guard_name' => 'admin',]);

        ######Rols permissions############
        Permission::create(['name' => 'create-Rols', 'guard_name' => 'admin',]);
        Permission::create(['name' => 'read-Rols', 'guard_name' => 'admin',]);
        Permission::create(['name' => 'update-Rols', 'guard_name' => 'admin',]);
        Permission::create(['name' => 'delete-Rols', 'guard_name' => 'admin',]);
    }
}
