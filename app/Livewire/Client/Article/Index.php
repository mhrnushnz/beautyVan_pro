<?php
namespace App\Livewire\Client\Article;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Services\SeoService;
use Livewire\Component;

class Index extends Component{
    public $articleId;
    public array $schema = [];

    public array $breadcrumbSchema = [];
    public array $categoryBreadcrumbs = [];
    public function mount($path, $slug){

        /* پیدا کردن و اعتبارسنجی مسیر کامل دسته‌بندی*/
        $slugs = array_values(array_filter(explode('/', trim($path, '/'))));
        $parentId = null;
        $category = null;
        $builtPath = [];

        foreach ($slugs as $categorySlug) {
            $category = ArticleCategory::query()->where('slug', $categorySlug)->where('parent_id', $parentId)->firstOrFail();
            $builtPath[] = $category->slug;

            /*Breadcrumb دسته‌ها*/
            $this->categoryBreadcrumbs[] = [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'path' => implode('/', $builtPath),
            ];
            $parentId = $category->id;
        }


        /* اگر هیچ دسته‌ای پیدا نشد*/
        abort_if(!$category, 404);


        /* پیدا کردن مقاله
        |--------------------------------------------------------------------------
        | علاوه بر slug مقاله، بررسی می‌کنیم مقاله واقعاً متعلق
        | به آخرین دسته موجود در URL باشد.*/

        $article = Article::query()->with(['articleCategories','admin',])->where('slug', $slug)
            ->where('status', 'published')
            ->where('article_category_id', $category->id)
            ->firstOrFail();
        $this->articleId = $article;


        /* Schema */
        $this->breadcrumb($article);

        /* Schema اختصاصی مقاله*/
        $this->schema = $article->schema ?? [];


        /* SEO*/
        $this->seoHandeler($article);
    }

    public function seoHandeler($article){
        $category = $article->articleCategories;
        SeoService::set(
            title: $article->seo_title ?? $article->title,
            description: $article->meta_description,
            canonical: route('article_client', ['path' => $category->full_path, 'slug' => $article->slug,]),
            image: $article->path ? asset('storage/' . $article->path) : null,
            robots: $article->robots ?? 'index, follow',
            type: 'article'
        );
    }


    /* Breadcrumb Schema*/
    public function breadcrumb($article){
        $category = $article->articleCategories;


        /* URL مقاله*/
        $articleUrl = route('article_client', ['path' => $category->full_path, 'slug' => $article->slug,]);

        /* شروع Breadcrumb*/
        $breadcrumbItems = [[
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'خانه',
                'item' => route('home'),
            ],[
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'مجله آموزشی',
                'item' => route('articleArchive'),
            ],
        ];


        /*| اضافه کردن تمام دسته‌ها*/
        $position = 3;
        foreach ($this->categoryBreadcrumbs as $breadcrumbCategory) {
            $breadcrumbItems[] = [
                '@type' => 'ListItem',
                'position' => $position++,
                'name' => $breadcrumbCategory['name'],
                'item' => route('article_archive', [
                    'path' => $breadcrumbCategory['path'],
                ]),
            ];
        }


        /* خود مقاله */
        $breadcrumbItems[] = [
            '@type' => 'ListItem',
            'position' => $position,
            'name' => $article->title,
            'item' => $articleUrl,
        ];


        /* BreadcrumbList*/
        $this->breadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumbItems,
        ];
    }


    public function render(){
        $articles = Article::query()
            ->with('articleCategories')
            ->where('status', 'published')
            ->whereHas('articleCategories', function ($query) {
                $query->whereNotNull('slug')
                    ->where('slug', '!=', '');
            })
            ->when($this->articleId, function ($query) {
                $query->where('id', '!=', $this->articleId->id);
            })->latest()->take(3)->get();

        return view('livewire.client.article.index', compact('articles'));
    }
}
