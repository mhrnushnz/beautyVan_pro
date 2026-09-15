<?php

namespace App\Services;

use App\Models\Article;
use DOMDocument;
use DOMXPath;
use Illuminate\Support\Str;

class SeoAnalyzer
{
    public static function analyze(Article $article): array
    {
        $content = $article->content ?? '';

        $checks = [
            'title_keyword'        => self::checkTitleKeyword($article),
            'h1_keyword'           => self::checkH1Keyword($content, $article->focus_keyword),
            /*'h2_keyword'           => self::checkH2Keyword($content, $article->focus_keyword),*/
            'first_100_words'      => self::checkFirst100Words($content, $article->focus_keyword),
            /*'keyword_density'      => self::checkKeywordDensity($content, $article->focus_keyword),*/
            'content_length'       => self::checkContentLength($content),
            /*'h2_count'              => self::checkHeadingCount($content, 'h2'),
            'h3_count'              => self::checkHeadingCount($content, 'h3'),*/
            'internal_links'       => self::checkInternalLinks($content),
            'external_links'       => self::checkExternalLinks($content),
            'images'               => self::checkImages($content),
            'image_alt'            => self::checkImageAlt($content),
            'slug_keyword'         => self::checkSlugKeyword($article),
            'meta_keyword'         => self::checkMetaKeyword($article),
            'secondary_keywords'   => self::checkSecondaryKeywords($article),
            /*'faq'                  => self::checkFaq($content),*/
            'readability'          => self::checkReadability($content),
            /*'paragraphs'            => self::checkParagraphs($content),*/
            'title_length'          => self::checkTitleLength($article->title),
        ];

        $score = self::calculateScore($checks);

        return [
            'score' => $score,
            'checks' => $checks,
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | 1. Keyword in Title
    |--------------------------------------------------------------------------
    */

    private static function checkTitleKeyword(Article $article): array
    {
        return self::keywordCheck(
            $article->title,
            $article->focus_keyword,
            'کلمه کلیدی در عنوان'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | 2. Keyword in H1
    |--------------------------------------------------------------------------
    */

    private static function checkH1Keyword(string $content, ?string $keyword): array
    {
        $h1s = self::getHeadings($content, 'h1');

        $found = false;

        foreach ($h1s as $h1) {
            if (self::contains($h1, $keyword)) {
                $found = true;
                break;
            }
        }

        return self::result(
            $found,
            'کلمه کلیدی در H1',
            $found
                ? 'کلمه کلیدی در H1 وجود دارد.'
                : 'کلمه کلیدی در H1 پیدا نشد.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | 3. Keyword in H2
    |--------------------------------------------------------------------------
    */

    private static function checkH2Keyword(string $content, ?string $keyword): array
    {
        $h2s = self::getHeadings($content, 'h2');

        foreach ($h2s as $h2) {
            if (self::contains($h2, $keyword)) {
                return self::result(
                    true,
                    'کلمه کلیدی در H2',
                    'کلمه کلیدی حداقل در یک H2 استفاده شده است.'
                );
            }
        }

        return self::result(
            false,
            'کلمه کلیدی در H2',
            'کلمه کلیدی در هیچ H2 استفاده نشده است.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | 4. Keyword in first 100 words
    |--------------------------------------------------------------------------
    */

    private static function checkFirst100Words(string $content, ?string $keyword): array
    {
        $text = self::cleanHtml($content);

        $first100 = Str::words($text, 100);

        $found = self::contains($first100, $keyword);

        return self::result(
            $found,
            'کلمه کلیدی در 100 کلمه اول',
            $found
                ? 'کلمه کلیدی در ابتدای مقاله وجود دارد.'
                : 'کلمه کلیدی در 100 کلمه اول وجود ندارد.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | 5. Keyword Density
    |--------------------------------------------------------------------------
    */

    private static function checkKeywordDensity(string $content, ?string $keyword): array
    {
        $text = self::cleanHtml($content);

        if (!$keyword || !$text) {
            return self::result(
                false,
                'تراکم کلمه کلیدی',
                'کلمه کلیدی یا محتوا وجود ندارد.'
            );
        }

        $words = preg_split('/\s+/u', trim($text));

        $wordCount = count($words);

        $keywordCount = mb_substr_count(
            mb_strtolower($text),
            mb_strtolower(trim($keyword))
        );

        if ($wordCount === 0) {
            return self::result(
                false,
                'تراکم کلمه کلیدی',
                'محتوا خالی است.'
            );
        }

        $density = ($keywordCount / $wordCount) * 100;

        /*
         * محدوده پیشنهادی ما:
         * 0.5% تا 2%
         */

        if ($density >= 0.5 && $density <= 2) {
            $score = 100;
            $status = true;
        } elseif ($density >= 0.3 && $density <= 2.5) {
            $score = 70;
            $status = true;
        } else {
            $score = 40;
            $status = false;
        }

        return [
            'score' => $score,
            'status' => $status,
            'label' => 'تراکم کلمه کلیدی',
            'message' => 'تراکم فعلی: ' . round($density, 2) . '%',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | 6. Content Length
    |--------------------------------------------------------------------------
    */

    private static function checkContentLength(string $content): array
    {
        $text = self::cleanHtml($content);

        $words = preg_split('/\s+/u', trim($text));

        $count = count(array_filter($words));

        if ($count >= 1500) {
            $score = 100;
            $status = true;
        } elseif ($count >= 1000) {
            $score = 80;
            $status = true;
        } elseif ($count >= 700) {
            $score = 60;
            $status = false;
        } else {
            $score = 30;
            $status = false;
        }

        return [
            'score' => $score,
            'status' => $status,
            'label' => 'طول محتوا',
            'message' => "تعداد کلمات: {$count}",
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | 7 & 8. H2 / H3 Count
    |--------------------------------------------------------------------------
    */

    private static function checkHeadingCount(string $content, string $tag): array
    {
        $headings = self::getHeadings($content, $tag);

        $count = count($headings);

        if ($tag === 'h2') {
            $score = $count >= 3 ? 100 : ($count >= 1 ? 70 : 30);
            $label = 'تعداد H2';
        } else {
            $score = $count >= 2 ? 100 : ($count >= 1 ? 70 : 50);
            $label = 'تعداد H3';
        }

        return [
            'score' => $score,
            'status' => $score >= 70,
            'label' => $label,
            'message' => "تعداد {$tag}: {$count}",
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | 9. Internal Links
    |--------------------------------------------------------------------------
    */

    private static function checkInternalLinks(string $content): array
    {
        $links = self::getLinks($content);

        $count = 0;

        $host = parse_url(config('app.url'), PHP_URL_HOST);

        foreach ($links as $href) {

            if (Str::startsWith($href, '/')) {
                $count++;
                continue;
            }

            $linkHost = parse_url($href, PHP_URL_HOST);

            if ($linkHost && $host && $linkHost === $host) {
                $count++;
            }
        }

        if ($count >= 4) {
            $score = 100;
        } elseif ($count === 3) {
            $score = 90;
        } elseif ($count === 2) {
            $score = 75;
        } elseif ($count === 1) {
            $score = 50;
        } else {
            $score = 20;
        }

        return [
            'score' => $score,
            'status' => $count >= 2,
            'label' => 'لینک داخلی',
            'message' => "تعداد لینک داخلی: {$count}",
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | 10. External Links
    |--------------------------------------------------------------------------
    */

    private static function checkExternalLinks(string $content): array
    {
        $links = self::getLinks($content);

        $host = parse_url(config('app.url'), PHP_URL_HOST);

        $external = 0;

        foreach ($links as $href) {

            $linkHost = parse_url($href, PHP_URL_HOST);

            if (
                $linkHost &&
                $host &&
                $linkHost !== $host
            ) {
                $external++;
            }
        }

        $score = $external >= 1 ? 100 : 60;

        return [
            'score' => $score,
            'status' => $external >= 1,
            'label' => 'لینک خارجی',
            'message' => "تعداد لینک خارجی: {$external}",
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | 11. Images
    |--------------------------------------------------------------------------
    */

    private static function checkImages(string $content): array
    {
        $images = self::getImages($content);

        $count = count($images);

        if ($count >= 3) {
            $score = 100;
        } elseif ($count >= 1) {
            $score = 70;
        } else {
            $score = 20;
        }

        return [
            'score' => $score,
            'status' => $count >= 1,
            'label' => 'تصاویر',
            'message' => "تعداد تصاویر: {$count}",
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | 12. Image Alt
    |--------------------------------------------------------------------------
    */

    private static function checkImageAlt(string $content): array
    {
        $images = self::getImages($content);

        if (count($images) === 0) {
            return [
                'score' => 50,
                'status' => false,
                'label' => 'Alt تصاویر',
                'message' => 'تصویری در محتوا وجود ندارد.',
            ];
        }

        $withAlt = 0;

        foreach ($images as $image) {

            if (!empty($image['alt'])) {
                $withAlt++;
            }
        }

        $score = round(($withAlt / count($images)) * 100);

        return [
            'score' => $score,
            'status' => $score >= 80,
            'label' => 'Alt تصاویر',
            'message' => "{$withAlt} از " . count($images) . " تصویر Alt دارد.",
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | 13. Keyword in Slug
    |--------------------------------------------------------------------------
    */

    private static function checkSlugKeyword(Article $article): array
    {
        if (!$article->focus_keyword || !$article->slug) {
            return self::result(
                false,
                'کلمه کلیدی در Slug',
                'کلمه کلیدی یا Slug وجود ندارد.'
            );
        }

        $keyword = Str::slug($article->focus_keyword);

        $slug = Str::slug($article->slug);

        $found = Str::contains(
            $slug,
            $keyword
        );

        return self::result(
            $found,
            'کلمه کلیدی در Slug',
            $found
                ? 'کلمه کلیدی در Slug وجود دارد.'
                : 'کلمه کلیدی در Slug وجود ندارد.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | 14. Keyword in Meta Description
    |--------------------------------------------------------------------------
    */

    private static function checkMetaKeyword(Article $article): array
    {
        return self::keywordCheck(
            $article->meta_description,
            $article->focus_keyword,
            'کلمه کلیدی در Meta Description'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | 15. Secondary Keywords
    |--------------------------------------------------------------------------
    */

    private static function checkSecondaryKeywords(Article $article): array
    {
        $keywords = $article->secondary_keywords ?? [];

        if (!is_array($keywords) || count($keywords) === 0) {
            return [
                'score' => 0,
                'status' => false,
                'label' => 'کلمات فرعی',
                'message' => 'کلمه کلیدی فرعی وارد نشده است.',
            ];
        }

        $content = self::cleanHtml($article->content ?? '');

        $found = 0;

        foreach ($keywords as $keyword) {

            if (self::contains($content, $keyword)) {
                $found++;
            }
        }

        $score = round(
            ($found / count($keywords)) * 100
        );

        return [
            'score' => $score,
            'status' => $score >= 70,
            'label' => 'کلمات فرعی',
            'message' => "{$found} از " . count($keywords) . " کلمه فرعی پیدا شد.",
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | 16. FAQ
    |--------------------------------------------------------------------------
    */

    private static function checkFaq(string $content): array
    {
        $text = mb_strtolower(self::cleanHtml($content));

        $patterns = [
            'سوالات متداول',
            'سؤالات متداول',
            'سوالات رایج',
            'سؤالات رایج',
            'faq',
        ];

        foreach ($patterns as $pattern) {

            if (mb_strpos($text, mb_strtolower($pattern)) !== false) {
                return self::result(
                    true,
                    'FAQ',
                    'بخش سوالات متداول در مقاله وجود دارد.'
                );
            }
        }

        return self::result(
            false,
            'FAQ',
            'بخش سوالات متداول پیدا نشد.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | 17. Readability
    |--------------------------------------------------------------------------
    */

    private static function checkReadability(string $content): array
    {
        $text = self::cleanHtml($content);

        if ($text === '') {
            return self::result(
                false,
                'خوانایی متن',
                'محتوا خالی است.'
            );
        }

        $sentences = preg_split(
            '/[.!؟؛]+/u',
            $text,
            -1,
            PREG_SPLIT_NO_EMPTY
        );

        $words = preg_split('/\s+/u', trim($text));

        $sentenceCount = max(count($sentences), 1);
        $wordCount = max(count($words), 1);

        $average = $wordCount / $sentenceCount;

        if ($average <= 20) {
            $score = 100;
            $status = true;
        } elseif ($average <= 30) {
            $score = 80;
            $status = true;
        } elseif ($average <= 40) {
            $score = 60;
            $status = false;
        } else {
            $score = 40;
            $status = false;
        }

        return [
            'score' => $score,
            'status' => $status,
            'label' => 'خوانایی متن',
            'message' => 'میانگین ' . round($average) . ' کلمه در هر جمله.',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | 18. Paragraphs
    |--------------------------------------------------------------------------
    */

    private static function checkParagraphs(string $content): array
    {
        $paragraphs = self::getElements($content, 'p');

        $count = count($paragraphs);

        if ($count >= 8) {
            $score = 100;
        } elseif ($count >= 5) {
            $score = 80;
        } elseif ($count >= 3) {
            $score = 60;
        } else {
            $score = 30;
        }

        return [
            'score' => $score,
            'status' => $score >= 70,
            'label' => 'تعداد پاراگراف‌ها',
            'message' => "تعداد پاراگراف: {$count}",
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | 19. Title Length
    |--------------------------------------------------------------------------
    */

    private static function checkTitleLength(?string $title): array
    {
        $length = mb_strlen(trim((string) $title));

        if ($length >= 40 && $length <= 60) {
            $score = 100;
        } elseif ($length >= 30 && $length <= 70) {
            $score = 80;
        } else {
            $score = 50;
        }

        return [
            'score' => $score,
            'status' => $score >= 80,
            'label' => 'طول عنوان',
            'message' => "طول عنوان: {$length} کاراکتر",
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Final Score
    |--------------------------------------------------------------------------
    */

    private static function calculateScore(array $checks): int
    {
        /*
         * وزن معیارها
         */

        $weights = [
            'title_keyword'       => 8,
            'h1_keyword'          => 8,
            'h2_keyword'          => 5,
            'first_100_words'     => 7,
            'keyword_density'     => 6,
            'content_length'      => 7,
            'h2_count'            => 4,
            'h3_count'            => 3,
            'internal_links'      => 7,
            'external_links'      => 3,
            'images'              => 3,
            'image_alt'           => 5,
            'slug_keyword'        => 5,
            'meta_keyword'        => 7,
            'secondary_keywords'  => 7,
            'faq'                 => 4,
            'readability'         => 5,
            'paragraphs'          => 2,
            'title_length'        => 4,
        ];

        $total = 0;
        $weightTotal = 0;

        foreach ($weights as $key => $weight) {

            $score = $checks[$key]['score'] ?? 0;

            $total += $score * $weight;

            $weightTotal += $weight;
        }

        if ($weightTotal === 0) {
            return 0;
        }

        return (int) round(
            $total / $weightTotal
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    private static function keywordCheck(
        ?string $text,
        ?string $keyword,
        string $label
    ): array {

        $found = self::contains($text, $keyword);

        return self::result(
            $found,
            $label,
            $found
                ? 'کلمه کلیدی پیدا شد.'
                : 'کلمه کلیدی پیدا نشد.'
        );
    }

    private static function result(
        bool $status,
        string $label,
        string $message
    ): array {

        return [
            'score' => $status ? 100 : 0,
            'status' => $status,
            'label' => $label,
            'message' => $message,
        ];
    }

    private static function contains(
        ?string $text,
        ?string $keyword
    ): bool {

        if (!$text || !$keyword) {
            return false;
        }

        return mb_stripos(
                $text,
                trim($keyword)
            ) !== false;
    }

    private static function cleanHtml(string $html): string
    {
        return trim(
            html_entity_decode(
                strip_tags($html)
            )
        );
    }

    private static function getHeadings(
        string $content,
        string $tag
    ): array {

        return self::getElements($content, $tag);
    }

    private static function getElements(
        string $content,
        string $tag
    ): array {

        if (!$content) {
            return [];
        }

        $dom = new DOMDocument();

        libxml_use_internal_errors(true);

        $dom->loadHTML(
            '<?xml encoding="UTF-8">' . $content
        );

        libxml_clear_errors();

        $xpath = new DOMXPath($dom);

        $nodes = $xpath->query("//{$tag}");

        $result = [];

        foreach ($nodes as $node) {
            $result[] = trim($node->textContent);
        }

        return $result;
    }

    private static function getLinks(string $content): array
    {
        if (!$content) {
            return [];
        }

        $dom = new DOMDocument();

        libxml_use_internal_errors(true);

        $dom->loadHTML(
            '<?xml encoding="UTF-8">' . $content
        );

        libxml_clear_errors();

        $xpath = new DOMXPath($dom);

        $nodes = $xpath->query('//a[@href]');

        $result = [];

        foreach ($nodes as $node) {
            $result[] = $node->getAttribute('href');
        }

        return $result;
    }

    private static function getImages(string $content): array
    {
        if (!$content) {
            return [];
        }

        $dom = new DOMDocument();

        libxml_use_internal_errors(true);

        $dom->loadHTML(
            '<?xml encoding="UTF-8">' . $content
        );

        libxml_clear_errors();

        $xpath = new DOMXPath($dom);

        $nodes = $xpath->query('//img');

        $result = [];

        foreach ($nodes as $node) {

            $result[] = [
                'src' => $node->getAttribute('src'),
                'alt' => trim($node->getAttribute('alt')),
            ];
        }

        return $result;
    }
}
