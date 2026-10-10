<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void{
        $this->call([//ترتیب جدول سیدر ها مهمه اول رول بعد پرمیشن بعد اتصالشون ب هم
            ServiceCategorySeeder::class,               //سیدر خدمات پیش فرض
            RoleSeeder::class,                                 //سیدر نقش ها
            PermissionSeeder::class,                       //سیدر دست رسی ها
            RolePermissionSeeder::class,    //سیدر تعریف دست رسی برای نقش ها
            SliderSeeder::class,
            ManagerSeeder::class,
            articlecategoryseeder::class,
            articlseeder::class,
            AdvertisementSeeder::class,
        ]);
    }
}
