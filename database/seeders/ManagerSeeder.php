<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2. ساخت کاربر ادمین
        $admin = User::updateOrCreate([
            'email' => 'mehrnush.npz@gmail.com'
        ],[
                'name' => 'mehrnush',
                'phone' => '09915584044',
                'password' => 'mehrnush1383',
            ]
        );

        // 3. دادن نقش به کاربر
        $admin->assignRole('manager');
    }
}
