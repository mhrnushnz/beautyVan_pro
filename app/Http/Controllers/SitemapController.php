<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ServiceCategory;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [];


        /*
        |--------------------------------------------------------------------------
        | صفحات ثابت
        |--------------------------------------------------------------------------
        */

        $staticRoutes = [
            'home',
            'about_us',
            'contact_us',
            'ourService',
            'articleArchive',
        ];

        foreach ($staticRoutes as $routeName) {

            $urls[] = [
                'loc' => route($routeName),
                'lastmod' => null,
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | مقالات منتشر شده
        |--------------------------------------------------------------------------
        */

        Article::query()
            ->with('articleCategories')
            ->where('status', 'published')
            ->whereNotNull('slug')
            ->where('slug', '!=', '')
            ->whereHas('articleCategories', function ($query) {

                $query
                    ->whereNotNull('slug')
                    ->where('slug', '!=', '');

            })
            ->chunkById(500, function ($articles) use (&$urls) {
                foreach ($articles as $article) {
                    $urls[] = [
                        'loc' => route('article_client', [
                            'path' => $article->articleCategories->full_path,
                            'slug' => $article->slug,
                        ]),
                        'lastmod' => $article->updated_at?->toAtomString(),
                    ];
                }
            });


        /*
        |--------------------------------------------------------------------------
        | دسته‌بندی مقالات
        |--------------------------------------------------------------------------
        */

        ArticleCategory::query()
            ->with('parent')
            ->whereNotNull('slug')
            ->where('slug', '!=', '')
            ->chunkById(500, function ($categories) use (&$urls) {
                foreach ($categories as $category) {
                    $urls[] = [
                        'loc' => route('article_archive', ['path' => $category->full_path,]),
                        'lastmod' => $category->updated_at?->toAtomString(),
                    ];
                }
            });


        /*
        |--------------------------------------------------------------------------
        | دسته‌بندی خدمات
        |--------------------------------------------------------------------------
        */
        ServiceCategory::query()
            ->whereNotNull('slug')
            ->where('slug', '!=', '')
            ->chunkById(500, function ($categories) use (&$urls) {
                foreach ($categories as $category) {
                    $urls[] = [
                        'loc' => route('our_service', [
                            'slug' => $category->slug,
                        ]),
                        'lastmod' => $category->updated_at?->toAtomString(),
                    ];
                }
            });
        /*
        |--------------------------------------------------------------------------
        | XML Sitemap
        |--------------------------------------------------------------------------
        */
        return response()
            ->view('sitemap.index', compact('urls'))
            ->header(
                'Content-Type',
                'application/xml; charset=UTF-8'
            );
    }
}
