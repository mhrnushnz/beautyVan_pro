<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        //میریت
        $manger = Role::findByName('manager');
        $manger->givePermissionTo(Permission::all());


        //ادمین
        $admin = Role::findByName('admin');
        $admin->givePermissionTo(['view article', 'create article', 'edit article', 'delete article',
            'view users', 'delete users',
            'edit profile',
            'accept appointments', 'cancel appointments', 'delete appointments',
            'create service category', 'edit service category', 'delete service category',
            'create article category', 'edit article category', 'delete article category',
            'view service', 'create service', 'delete service',
        ]);
        //ب کاربران نیازی نیست دست رسی بدیم
    }
}
