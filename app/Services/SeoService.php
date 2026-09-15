<?php
namespace App\Services;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class SeoService{
    public static function set(
        string $title,
        string $description,
        ?string $canonical = null,
        ?string $image = null,
        string $robots = 'index, follow',
        string $type = 'website',
        array $keywords = []
    ): void {
        $canonical = $canonical ?? url()->current();

        /*
         if (!empty($keywords)) {
             SEOMeta::setKeywords($keywords);
         }
         /*
         |--------------------------------------------------------------------------
         | Basic Meta
         |--------------------------------------------------------------------------
         */

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical($canonical);
        SEOMeta::addMeta('robots', $robots);

        /*
        |--------------------------------------------------------------------------
        | Open Graph
        |--------------------------------------------------------------------------
        */

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($canonical);
        OpenGraph::setSiteName(config('app.name'));
        OpenGraph::addProperty('type', $type);

        if ($image) {
            OpenGraph::addImage($image);
        }

        /*
        |--------------------------------------------------------------------------
        | Twitter / X
        |--------------------------------------------------------------------------
        */

        TwitterCard::setTitle($title);
        TwitterCard::setDescription($description);
        TwitterCard::setUrl($canonical);

        if ($image) {
            TwitterCard::setImage($image);
        }
    }


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
            robots: 'noindex, follow'
        );
    }
}
