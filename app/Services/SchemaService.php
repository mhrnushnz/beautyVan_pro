<?php
//انواع اسکیماها برای انواع صفحات
namespace App\Services;
class SchemaService{

    //برای صفحه home-----------------------------------------------------------------------------
    public static function website(): array{
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'بیوتی ون',
            'url' => url('/'),
        ];
    }

    public static function organization(): array{
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'بیوتی ون',
            'url' => url('/'),
            'logo' => asset('storage/default/logo.png'),
        ];
    }

    //برای صفحه خدمات-----------------------------------------------------------------
    public static function service($service): array {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $service->name,
            'description' => $service->seo_description ?? $service->description,
            'url' => route('our_service', [$service->id, $service->slug]),
            'provider' => [
                '@type' => 'Organization',
                'name' => 'بیوتی ون',
                'url' => url('/'),
            ],
        ];
    }

    //برای صفحات سلسله مراتب مثل :-----------------------------------------------------------------
    //Service Category
    //└── خانه > خدمات > خدمات ناخن
    //
    //Service
    //└── خانه > خدمات > خدمات ناخن > کاشت ناخن
    //
    //Articles
    //└── خانه > مقالات
    //
    //Article
    //└── خانه > مقالات > عنوان مقاله
    public static function breadcrumb(array $items): array{
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => collect($items)
                ->values()
                ->map(function ($item, $index) {
                    return [
                        '@type' => 'ListItem',
                        'position' => $index + 1,
                        'name' => $item['name'],
                        'item' => $item['url'],
                    ];
                })->toArray(),
        ];
    }

    //صفحه خدمات-------------------------------------------------------------------------------------
    public static function servicesPage(): array {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => 'خدمات زیبایی بیوتی ون',
            'description' => 'مجموعه خدمات تخصصی زیبایی، پوست، مو و ناخن بیوتی ون.',
            'url' => route('ourService'),
        ];
    }


    public static function serviceCategory($category): array {
        return [
            '@context' => 'https://schema.org',

            '@type' => 'CollectionPage',

            'name' => $category->name,

            'description' => $category->meta_description
                ?? 'نمونه کارها و خدمات تخصصی ' . $category->name . ' در بیوتی ون.',

            'url' => route('our_service', [
                'id' => $category->id,
                'slug' => $category->slug,
            ]),

            'isPartOf' => [
                '@type' => 'WebSite',
                'name' => 'بیوتی ون',
                'url' => url('/'),
            ],
        ];
    }

    //صفحه تماس باما-------------------------------------------------------------------------
    public static function contactPage(): array{
        return [
            '@context' => 'https://schema.org',
            '@type' => 'ContactPage',
            'name' => 'تماس با بیوتی ون',
            'description' => 'راه‌های ارتباط با بیوتی ون برای دریافت مشاوره و اطلاعات درباره خدمات زیبایی.',
            'url' => route('contact_us'),
            'mainEntity' => [
                '@type' => 'Organization',
                'name' => 'بیوتی ون',
                'url' => url('/'),
                'logo' => asset('storage/default/logo.png'),
            ],
        ];
    }

    //صفحه درباره ما ----------------------------------------------------------------------------
    public static function aboutPage(): array{
        return [
            '@context' => 'https://schema.org',
            '@type' => 'AboutPage',
            'name' => 'درباره بیوتی ون',
            'description' => 'آشنایی با بیوتی ون، مجموعه ارائه‌دهنده خدمات تخصصی آرایشی، زیبایی و مراقبت پوست و مو.',
            'url' => route('about_us'),
            'mainEntity' => [
                '@type' => 'Organization',
                'name' => 'بیوتی ون',
                'url' => url('/'),
                'logo' => asset('storage/default/logo.png'),
            ],
        ];
    }

    //آرشیو کلی مقالات--------------------------------------------------------------------------
    public static function articlesPage(): array{
        return [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => 'مجله آموزشی بیوتی ون',
            'description' => 'مجموعه مقالات آموزشی بیوتی ون درباره زیبایی، مراقبت پوست، مو، ناخن و سبک زندگی.',
            'url' => route('articleArchive'),
            'isPartOf' => [
                '@type' => 'WebSite',
                'name' => 'بیوتی ون',
                'url' => url('/'),
            ],
        ];
    }

    //برای صفحه یک مقاله----------------------------------------------------------------------------
    public static function article($article): array {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $article->title,
            'description' => $article->meta_description ?? \Illuminate\Support\Str::limit( strip_tags($article->content), 160),
            'url' => route('article_client', ['slug' => $article->slug,]),
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => route('article_client', [
                    'slug' => $article->slug,
                ]),
            ],

            'image' => [
                asset('storage/' . $article->path),
            ],
            'datePublished' => optional($article->created_at)?->toIso8601String(),
            'dateModified' => optional($article->updated_at)?->toIso8601String(),
            'author' => [
                '@type' => 'Person',
                'name' => 'Organization',
            ],

            'publisher' => [
                '@type' => 'Organization',
                'name' => 'بیوتی ون',

                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('storage/default/logo.png'),
                ],
            ],
        ];
    }

    //آرشیو یک دسته------------------------------------------------------------------------------
    public static function articleCategoryPage($category): array{
        return [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => $category->name,
            'description' => $category->meta_description ?? 'مقالات و آموزش‌های ' . $category->name . ' در مجله بیوتی ون.',
            'url' => route('article_archive', ['slug' => $category->slug,]),

            'isPartOf' => [
                '@type' => 'CollectionPage',
                'name' => 'مجله آموزشی بیوتی ون',
                'url' => route('articleArchive'),
            ],
        ];
    }
}
