<?php
namespace Database\Seeders;
use App\Models\serviceCategory;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        ServiceCategory::insert([
            [
                'name' => 'پاکسازی پوست',
                'path' => 'service_category/default/09eba6556be045008720fa4ffd3633ff.jpeg',
                'slug' => 'پاکسازی-پوست',
                'meta_description' => 'پاکسازی پوست حرفه‌ای با روش‌های تخصصی در منزل یا سالن، برای رفع آلودگی‌ها، جوش‌ها و افزایش شادابی و شفافیت پوست شما.',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'میکاپ',
                'path' => 'service_category/default/f333e9cbb94348a185bd271b2e70fce4.jpeg',
                'slug' => 'میکاپ',
                'meta_description' => 'ارائه خدمات میکاپ حرفه‌ای با استفاده از بهترین برندهای آرایشی، مناسب مهمانی، عروسی و مراسم خاص با ماندگاری بالا.',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'شنیون',
                'slug' => 'شنیون',
                'meta_description' => 'انواع شنیون‌های شیک و مدرن مناسب مراسم، عروسی و مهمانی با طراحی حرفه‌ای و ماندگاری بالا توسط آرایشگران متخصص.',
                'path' => 'service_category/default/ge8SznpvB8pMVgNHP2t9rIh3pCcGEw0CxdjzSiNS.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'آرایشی',
                'slug' => 'آرایشی',
                'meta_description' => 'خدمات کامل آرایشی شامل میکاپ، گریم و زیبایی با استفاده از محصولات باکیفیت و تکنیک‌های به‌روز برای ظاهری جذاب و طبیعی.',
                'path' => 'service_category/default/d599e9641a2841728543360319c4e526.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
