<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Appointment;
use App\Models\Article;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    /*
    |--------------------------------------------------------------------------
    | اطلاعات عمومی داشبورد
    |--------------------------------------------------------------------------
    */

    public $user;

    public $article = 0;
    public $users = 0;
    public $appointment = 0;
    public $serviceCategory = 0;


    /*
    |--------------------------------------------------------------------------
    | اطلاعات کلی SEO
    |--------------------------------------------------------------------------
    */

    public $totalArticles = 0;

    public $publishedArticles = 0;

    public $seoScore = 0;

    public $seoIssues = 0;


    /*
    |--------------------------------------------------------------------------
    | مشکلات SEO
    |--------------------------------------------------------------------------
    */

    // Meta Description ندارد
    public $articlesWithoutMeta = 0;

    // طول Meta Description نامناسب است
    public $invalidMetaLength = 0;

    // Focus Keyword ندارد
    public $articlesWithoutFocusKeyword = 0;

    // Focus Keyword در عنوان وجود ندارد
    public $keywordMissingFromTitle = 0;

    // Focus Keyword در محتوا وجود ندارد
    public $keywordMissingFromContent = 0;

    // Secondary Keywords ندارد
    public $articlesWithoutSecondaryKeywords = 0;

    // تصویر شاخص ندارد
    public $articlesWithoutImage = 0;

    // Robots نامعتبر
    public $invalidRobots = 0;

    // Slug ندارد
    public $articlesWithoutSlug = 0;


    /*
    |--------------------------------------------------------------------------
    | وضعیت‌های اطلاعاتی
    |--------------------------------------------------------------------------
    */

    // مقاله Noindex است
    // توجه: Noindex الزاماً خطای SEO نیست
    public $noIndexArticles = 0;

    // پیش‌نویس‌ها
    // Draft هم خطای SEO محسوب نمی‌شود
    public $draftArticles = 0;


    /*
    |--------------------------------------------------------------------------
    | وضعیت کیفی مقالات
    |--------------------------------------------------------------------------
    */

    public $seoGood = 0;

    public $seoMedium = 0;

    public $seoWeak = 0;


    public function mount()
    {
        /*
        |--------------------------------------------------------------------------
        | کاربر
        |--------------------------------------------------------------------------
        */

        $this->user = auth()->user();


        /*
        |--------------------------------------------------------------------------
        | آمار عمومی داشبورد
        |--------------------------------------------------------------------------
        */

        $this->users = User::role('user')->count();


        $this->article = Article::query()
            ->where('status', 'published')
            ->where('admin_id', Auth::id())
            ->count();


        $this->appointment = Appointment::query()
            ->where('status', 'pending')
            ->count();


        $this->serviceCategory = ServiceCategory::query()
            ->where('is_active', 1)
            ->count();


        /*
        |--------------------------------------------------------------------------
        | دریافت مقالات
        |--------------------------------------------------------------------------
        */

        $articles = Article::query()->get();


        /*
        |--------------------------------------------------------------------------
        | تعداد کل مقالات
        |--------------------------------------------------------------------------
        */

        $this->totalArticles = $articles->count();


        /*
        |--------------------------------------------------------------------------
        | تعداد پیش‌نویس‌ها
        |--------------------------------------------------------------------------
        */

        $this->draftArticles = $articles
            ->where('status', 'draft')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | مقالات منتشرشده
        |--------------------------------------------------------------------------
        */

        $publishedArticles = $articles
            ->where('status', 'published');


        $this->publishedArticles = $publishedArticles->count();


        /*
        |--------------------------------------------------------------------------
        | مجموع امتیازات SEO
        |--------------------------------------------------------------------------
        */

        $totalSeoScore = 0;


        /*
        |--------------------------------------------------------------------------
        | بررسی SEO مقالات
        |--------------------------------------------------------------------------
        */

        foreach ($publishedArticles as $article) {

            $score = 0;


            /*
            |--------------------------------------------------------------------------
            | 1. Focus Keyword
            | امتیاز: 15
            |--------------------------------------------------------------------------
            */

            $focusKeyword = trim(
                (string) $article->focus_keyword
            );


            if ($focusKeyword !== '') {

                $score += 15;

            } else {

                $this->articlesWithoutFocusKeyword++;

                $this->seoIssues++;
            }


            /*
            |--------------------------------------------------------------------------
            | 2. Meta Description
            | امتیاز: 20
            |--------------------------------------------------------------------------
            */

            $metaDescription = trim(
                strip_tags(
                    (string) $article->meta_description
                )
            );


            if ($metaDescription === '') {

                /*
                 * Meta اصلاً وجود ندارد
                 */

                $this->articlesWithoutMeta++;

                $this->seoIssues++;

            } else {

                $metaLength = mb_strlen(
                    $metaDescription
                );


                /*
                 * محدوده مناسب
                 */

                if ($metaLength >= 120 && $metaLength <= 160) {

                    $score += 20;

                } else {

                    /*
                     * Meta وجود دارد
                     * ولی طول آن مناسب نیست
                     */

                    $score += 10;

                    $this->invalidMetaLength++;

                    $this->seoIssues++;
                }
            }


            /*
            |--------------------------------------------------------------------------
            | 3. Focus Keyword در عنوان
            | امتیاز: 15
            |--------------------------------------------------------------------------
            */

            $title = trim(
                (string) $article->title
            );


            /*
             * فقط زمانی این تست را انجام می‌دهیم
             * که Focus Keyword وجود داشته باشد.
             *
             * اگر Focus Keyword خالی باشد،
             * همان مشکل قبلی یک بار شمرده شده
             * و دوباره مشکل عنوان ثبت نمی‌کنیم.
             */

            if ($focusKeyword !== '') {

                if (
                    $title !== '' &&
                    str_contains(
                        mb_strtolower($title),
                        mb_strtolower($focusKeyword)
                    )
                ) {

                    $score += 15;

                } else {

                    $this->keywordMissingFromTitle++;

                    $this->seoIssues++;
                }
            }


            /*
            |--------------------------------------------------------------------------
            | 4. Focus Keyword در محتوا
            | امتیاز: 15
            |--------------------------------------------------------------------------
            */

            $content = trim(
                preg_replace(
                    '/\s+/u',
                    ' ',
                    strip_tags(
                        (string) $article->content
                    )
                )
            );


            /*
             * مثل Title:
             * اگر Focus Keyword وجود نداشته باشد
             * این مشکل دوباره شمرده نمی‌شود.
             */

            if ($focusKeyword !== '') {

                if (
                    $content !== '' &&
                    str_contains(
                        mb_strtolower($content),
                        mb_strtolower($focusKeyword)
                    )
                ) {

                    $score += 15;

                } else {

                    $this->keywordMissingFromContent++;

                    $this->seoIssues++;
                }
            }


            /*
            |--------------------------------------------------------------------------
            | 5. Secondary Keywords
            | امتیاز: 10
            |--------------------------------------------------------------------------
            */

            $secondaryKeywords = $article->secondary_keywords;


            if (
                is_array($secondaryKeywords) &&
                count(
                    array_filter(
                        $secondaryKeywords,
                        fn ($keyword) =>
                            trim((string) $keyword) !== ''
                    )
                ) > 0
            ) {

                $score += 10;

            } else {

                $this->articlesWithoutSecondaryKeywords++;

                $this->seoIssues++;
            }


            /*
            |--------------------------------------------------------------------------
            | 6. تصویر شاخص
            | امتیاز: 10
            |--------------------------------------------------------------------------
            */

            $image = trim(
                (string) $article->path
            );


            if ($image !== '') {

                $score += 10;

            } else {

                $this->articlesWithoutImage++;

                $this->seoIssues++;
            }


            /*
            |--------------------------------------------------------------------------
            | 7. Robots
            | امتیاز: 10
            |--------------------------------------------------------------------------
            */

            $robots = mb_strtolower(
                trim(
                    (string) $article->robots
                )
            );


            /*
             * حذف فاصله‌ها:
             *
             * index, follow
             * index,follow
             *
             * هر دو یکی می‌شوند
             */

            $normalizedRobots = preg_replace(
                '/\s+/',
                '',
                $robots
            );


            /*
             * Noindex را جداگانه ثبت می‌کنیم.
             *
             * Noindex الزاماً مشکل SEO نیست،
             * چون ممکن است مدیر عمداً آن را انتخاب کرده باشد.
             */

            if (
                str_contains(
                    $normalizedRobots,
                    'noindex'
                )
            ) {

                $this->noIndexArticles++;

            } elseif (
                $normalizedRobots === 'index,follow' ||
                $normalizedRobots === 'index'
            ) {

                /*
                 * Robots سالم
                 */

                $score += 10;

            } else {

                /*
                 * مقدار Robots نامعتبر
                 */

                $this->invalidRobots++;

                $this->seoIssues++;
            }


            /*
            |--------------------------------------------------------------------------
            | 8. Slug
            | امتیاز: 5
            |--------------------------------------------------------------------------
            */

            $slug = trim(
                (string) $article->slug
            );


            if ($slug !== '') {

                $score += 5;

            } else {

                $this->articlesWithoutSlug++;

                $this->seoIssues++;
            }


            /*
            |--------------------------------------------------------------------------
            | مجموع امتیاز مقاله
            |--------------------------------------------------------------------------
            */

            $totalSeoScore += $score;


            /*
            |--------------------------------------------------------------------------
            | وضعیت کیفی مقاله
            |--------------------------------------------------------------------------
            */

            if ($score >= 80) {

                $this->seoGood++;

            } elseif ($score >= 60) {

                $this->seoMedium++;

            } else {

                $this->seoWeak++;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | محاسبه امتیاز کلی SEO
        |--------------------------------------------------------------------------
        */

        if ($this->publishedArticles > 0) {

            $this->seoScore = (int) round(
                $totalSeoScore /
                $this->publishedArticles
            );

        } else {

            $this->seoScore = 0;
        }
    }


    public function render(){
        return view(
            'livewire.admin.dashboard.index'
        )->layout(
            'layouts.admin.app'
        );
    }
}
