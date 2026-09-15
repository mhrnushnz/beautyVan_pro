<?php
namespace Database\Seeders;
use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;
class articlecategoryseeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        ArticleCategory::insert([
            'name' => 'عمومی',
            'slug' => 'عمومی',
            'meta_description' => 'مجموعه‌ای از جدیدترین مقالات، آموزش‌ها، اخبار و مطالب کاربردی سایت در دسته‌بندی عمومی.',
        ]);
    }
}
