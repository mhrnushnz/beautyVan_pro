<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    //تعریف دست رسی ها
    public function run(): void{
        Permission::firstOrCreate(['name' => 'view article']);
        Permission::firstOrCreate(['name' => 'create article']);
        Permission::firstOrCreate(['name' => 'edit article']);
        Permission::firstOrCreate(['name' => 'delete article']);

        Permission::firstOrCreate(['name' => 'view users']);
        Permission::firstOrCreate(['name' => 'edit users']);
        Permission::firstOrCreate(['name' => 'delete users']);

        Permission::firstOrCreate(['name' => 'edit profile']);

        Permission::firstOrCreate(['name' => 'accept appointments']);
        Permission::firstOrCreate(['name' => 'cancel appointments']);
        Permission::firstOrCreate(['name' => 'delete appointments']);

        Permission::firstOrCreate(['name' => 'create service category']);
        Permission::firstOrCreate(['name' => 'edit service category']);
        Permission::firstOrCreate(['name' => 'delete service category']);

        Permission::firstOrCreate(['name' => 'create article category']);
        Permission::firstOrCreate(['name' => 'edit article category']);
        Permission::firstOrCreate(['name' => 'delete article category']);

        Permission::firstOrCreate(['name' => 'view service']);
        Permission::firstOrCreate(['name' => 'create service']);
        Permission::firstOrCreate(['name' => 'delete service']);
    }
}
