<?php
namespace App\Livewire\Client\ArticleArchive;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Services\SeoService;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component{
    use WithPagination;
    public $articlecategories = [];
    public $articlecategoryId;
    public $status = 'published';
    public $search = '';
    public array $schemas = [];
    public $categoryBreadcrumbs = [];

    public function updatedSearch(){
        $this->resetPage();
    }

    public function mount($path  = null){
        //whereNull('parent_id') می‌گوید فقط دسته‌هایی را بگیر که والد ندارند
        $this->articlecategories = ArticleCategory::query()->whereNull('parent_id')->with('childrenRecursive')->orderBy('name')->get();
        $category = null;
        if ($path !== null) {
            $slugs = explode('/', trim($path, '/'));
            $parentId = null;
            foreach ($slugs as $slug) {
                $category = ArticleCategory::query()->where('slug', $slug)->where('parent_id', $parentId)->firstOrFail();
                $parentId = $category->id;
            }
            $this->articlecategoryId = $category;
            // ساخت مسیر دسته‌بندی از والد اصلی تا دسته فعلی
            $breadcrumbs = [];
            $currentCategory = $category;
            while ($currentCategory) {
                array_unshift($breadcrumbs,$currentCategory);
                $currentCategory = $currentCategory->parent;
            }
            $this->categoryBreadcrumbs = $breadcrumbs;
        }
        $this->setSeo($category);
        $this->setSchema($category);
    }

    private function canonicalWithPagination(string $baseUrl): string{
        $page = (int) request()->query('page', 1);
        if ($page > 1) {
            return $baseUrl . '?page=' . $page;
        }
        return $baseUrl;
    }


    private function setSeo($category = null): void {
        if ($category) {
            $baseCanonical = route('article_archive', ['path' => $category->full_path,]);
            $canonical = $this->canonicalWithPagination($baseCanonical);
            SeoService::index( title: $category->seo_title?? $category->name . ' | مقالات بیوتی ون',
                description: $category->meta_description?? 'جدیدترین مقالات و آموزش‌های ' .$category->name .' را در مجله بیوتی ون مطالعه کنید.',
                canonical: $canonical,
                image: $category->path? asset('storage/' . $category->path): asset('storage/default/og-articles.jpg'),
                type: 'website'
            );
        } else {
            $baseCanonical = route('articleArchive');
            $canonical = $this->canonicalWithPagination($baseCanonical);
            SeoService::index(title: 'وبلاگ بیوتی ون | مقالات زیبایی و سلامت',description: 'در وبلاگ بیوتی ون جدیدترین مقالات آموزشی زیبایی، مراقبت پوست، مو، ناخن و سبک زندگی را مطالعه کنید.',canonical: $canonical, image: asset('storage/default/og-articles.jpg'),
                type: 'website'
            );
        }
    }


    private function setSchema($category = null): void
    {
        /*
        |--------------------------------------------------------------------------
        | آرشیو یک دسته‌بندی
        |--------------------------------------------------------------------------
        */

        if ($category) {

            $baseUrl = route('article_archive', [
                'path' => $category->full_path,
            ]);

            $url = $this->canonicalWithPagination($baseUrl);


            /*
            |--------------------------------------------------------------------------
            | ساخت Breadcrumb چند سطحی
            |--------------------------------------------------------------------------
            */

            $breadcrumbItems = [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'خانه',
                    'item' => route('home'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'مجله آموزشی',
                    'item' => route('articleArchive'),
                ],
            ];


            $position = 3;

            foreach ($this->categoryBreadcrumbs as $breadcrumbCategory) {

                $breadcrumbItems[] = [
                    '@type' => 'ListItem',
                    'position' => $position,
                    'name' => $breadcrumbCategory->name,
                    'item' => route('article_archive', [
                        'path' => $breadcrumbCategory->full_path,
                    ]),
                ];

                $position++;
            }


            /*
            |--------------------------------------------------------------------------
            | Schema صفحه دسته‌بندی
            |--------------------------------------------------------------------------
            */

            $this->schemas = [

                '@context' => 'https://schema.org',

                '@graph' => [

                    [
                        '@type' => 'CollectionPage',

                        '@id' => $baseUrl . '#webpage',

                        'url' => $url,

                        'name' => $category->seo_title
                            ?? $category->name . ' | مقالات بیوتی ون',

                        'description' => $category->meta_description
                            ?? 'جدیدترین مقالات و آموزش‌های '
                            . $category->name
                            . ' را در مجله بیوتی ون مطالعه کنید.',

                        'isPartOf' => [
                            '@id' => url('/') . '/#website',
                        ],

                        'about' => [
                            '@id' => url('/') . '/#organization',
                        ],

                        'breadcrumb' => [
                            '@id' => $baseUrl . '#breadcrumb',
                        ],
                    ],


                    [
                        '@type' => 'BreadcrumbList',

                        '@id' => $baseUrl . '#breadcrumb',

                        'itemListElement' => $breadcrumbItems,
                    ],

                ],

            ];

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | آرشیو اصلی مقالات
        |--------------------------------------------------------------------------
        */

        $baseUrl = route('articleArchive');

        $url = $this->canonicalWithPagination($baseUrl);


        $this->schemas = [

            '@context' => 'https://schema.org',

            '@graph' => [

                [
                    '@type' => 'Blog',

                    '@id' => $baseUrl . '#blog',

                    'url' => $url,

                    'name' => 'وبلاگ بیوتی ون',

                    'description' =>
                        'جدیدترین مقالات آموزشی زیبایی، مراقبت پوست، مو، ناخن و سبک زندگی در بیوتی ون.',

                    'publisher' => [
                        '@id' => url('/') . '/#organization',
                    ],

                    'isPartOf' => [
                        '@id' => url('/') . '/#website',
                    ],

                    'breadcrumb' => [
                        '@id' => $baseUrl . '#breadcrumb',
                    ],
                ],


                [
                    '@type' => 'BreadcrumbList',

                    '@id' => $baseUrl . '#breadcrumb',

                    'itemListElement' => [

                        [
                            '@type' => 'ListItem',
                            'position' => 1,
                            'name' => 'خانه',
                            'item' => route('home'),
                        ],

                        [
                            '@type' => 'ListItem',
                            'position' => 2,
                            'name' => 'مجله آموزشی',
                            'item' => $baseUrl,
                        ],

                    ],

                ],

            ],

        ];
    }


    private function getDescendantIds(int $categoryId): array
    {
        $ids = [];

        $children = ArticleCategory::query()
            ->where('parent_id', $categoryId)
            ->get(['id']);

        foreach ($children as $child) {

            // خود فرزند
            $ids[] = $child->id;

            // تمام فرزندان این فرزند
            $ids = array_merge(
                $ids,
                $this->getDescendantIds($child->id)
            );
        }
        return $ids;
    }

    public function render(){
        $articles = Article::query()->with('articleCategories')->where('status', 'published')->when($this->articlecategoryId, function ($query) {
                /* خود دسته فعلی*/
                $categoryIds = [$this->articlecategoryId->id];

                /*| تمام زیر دسته‌ها در هر عمقی*/
                $descendantIds = $this->getDescendantIds($this->articlecategoryId->id);

                /* ادغام خود دسته + تمام زیر دسته‌ها*/
                $categoryIds = array_merge($categoryIds, $descendantIds);

                /* فیلتر مقالات*/
                $query->whereIn('article_category_id', $categoryIds);
                    })->when($this->search, function ($query) {
                    $query->where(function ($q) {
                        $q->where('title','like','%' . $this->search . '%');
                    });})->latest()->paginate(20);

        return view('livewire.client.article_archive.index', compact('articles'));
    }
}
