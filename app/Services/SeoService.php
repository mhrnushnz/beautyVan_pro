<?php
namespace App\Services;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class SeoService
{
    /**
     * تنظیمات اصلی SEO صفحه
     */
    public static function set(
        string $title,
        string $description,
        ?string $canonical = null,
        ?string $image = null,
        string $robots = 'index, follow',
        string $type = 'website'
    ): void {

        /*
        |--------------------------------------------------------------------------
        | Normalize
        |--------------------------------------------------------------------------
        */

        $title = trim($title);
        $description = trim(strip_tags($description));

        $canonical = $canonical ?: url()->current();


        /*
        |--------------------------------------------------------------------------
        | Basic Meta
        |--------------------------------------------------------------------------
        */

        SEOMeta::setTitle($title);

        SEOMeta::setDescription($description);

        SEOMeta::setCanonical($canonical);

        SEOMeta::addMeta(
            'robots',
            $robots,
            'name'
        );


        /*
        |--------------------------------------------------------------------------
        | Open Graph
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle($title);

        OpenGraph::setDescription($description);

        OpenGraph::setUrl($canonical);

        OpenGraph::setSiteName(
            config('app.name')
        );

        OpenGraph::addProperty(
            'type',
            $type
        );

        OpenGraph::addProperty(
            'locale',
            'fa_IR'
        );


        /*
        |--------------------------------------------------------------------------
        | Open Graph Image
        |--------------------------------------------------------------------------
        */

        if ($image) {

            OpenGraph::addImage(
                $image,
                [
                    'alt' => $title,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Twitter / X
        |--------------------------------------------------------------------------
        */

        TwitterCard::setType(
            'summary_large_image'
        );

        TwitterCard::setTitle(
            $title
        );

        TwitterCard::setDescription(
            $description
        );

        TwitterCard::setUrl(
            $canonical
        );

        if ($image) {

            TwitterCard::setImage(
                $image
            );
        }
    }


    /**
     * صفحات قابل ایندکس
     */
    public static function index(
        string $title,
        string $description,
        ?string $canonical = null,
        ?string $image = null,
        string $type = 'website'
    ): void {

        self::set(
            title: $title,
            description: $description,
            canonical: $canonical,
            image: $image,
            robots: 'index, follow',
            type: $type
        );
    }


    /**
     * صفحات غیر قابل ایندکس
     */
    public static function noindex(
        string $title,
        string $description,
        ?string $canonical = null,
        ?string $image = null
    ): void {

        self::set(
            title: $title,
            description: $description,
            canonical: $canonical,
            image: $image,
            robots: 'noindex, follow',
            type: 'website'
        );
    }
}
