<?php
namespace Database\Seeders;
use App\Models\Slider;
use Illuminate\Database\Seeder;
class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Slider::insert([
            [
                'title' => 'خدمات طراحی و کاشت ناخن',
                'description' => 'زیبایی دست‌ها با خدمات حرفه‌ای ناخن',
                'short_description' => 'کاشت ناخن، ناخن مصنوعی، لاک، مراقبت از ناخن و خدمات مخصوص کودکان با رعایت کامل بهداشت.',
                'path' => 'sliders/default/slider-bg-1-5-xl.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'خدمات ویژه',
                'description' => 'زیبایی حرفه‌ای، این‌بار در خانه شما',
                'short_description' => 'بیوتی ون ارائه‌دهنده خدمات تخصصی آرایش و زیبایی در منزل، با کیفیت سالن‌های حرفه‌ای و آرامش فضای شخصی شما.',
                'path' => 'sliders/default/main-first-slide-background-xl.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'title' => 'مو و احیا',
                'description' => 'در کمترین زمان موهایی صاف، براق و خوش‌حالت داشته باشید',
                'short_description' => 'کراتینه، نانو کراتین، بوتاکس، پروتئین‌تراپی و پلکس‌تراپی برای موهایی سالم، نرم و درخشان.',
                'path' => 'sliders/default/slider-bg-1-3-xl.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
