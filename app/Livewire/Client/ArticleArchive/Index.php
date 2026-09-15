<?php
namespace App\Livewire\Client\ArticleArchive;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Services\SchemaService;
use App\Services\SeoService;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component{
    use WithPagination;
    public $articlecategories = [];
    public $articlecategoryId;
    public $status = 'published';
    public $search = '';
    public $schemas = [];

    public function updatedSearch(){
        $this->resetPage();
    }


    public function mount($slug = null){
        $this->articlecategories = ArticleCategory::all();
        $category = null;
        if ($slug !== null) {
            $category = ArticleCategory::where('slug', $slug)->firstOrFail();
            $this->articlecategoryId = $category;
        }
        $this->setSeo($category);
        $this->setSchemas($category);
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
            $baseCanonical = route('article_archive', ['slug' => $category->slug,]);
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


    private function setSchemas($category = null): void{
        if ($category) {
            $this->schemas = [
                SchemaService::articleCategoryPage($category),
                SchemaService::breadcrumb([
                    [
                        'name' => 'خانه',
                        'url' => route('home'),
                    ],[
                        'name' => 'مجله آموزشی',
                        'url' => route('articleArchive'),
                    ],[
                        'name' => $category->name,
                        'url' => route('article_archive', [
                            'slug' => $category->slug,
                        ]),
                    ],
                ]),
            ];
        } else {
            $this->schemas = [
                SchemaService::articlesPage(),
                SchemaService::breadcrumb([
                    [
                        'name' => 'خانه',
                        'url' => route('home'),
                    ],
                    [
                        'name' => 'مجله آموزشی',
                        'url' => route('articleArchive'),
                    ],
                ]),
            ];
        }
    }



    public function render(){
        $articles = Article::query()->with('articleCategories')->where('status', 'published')->when($this->articlecategoryId, function ($query) {
            $query->where(function ($q) {
                $q->where('article_category_id', $this->articlecategoryId->id)
                    ->orWhereNull('article_category_id');
            });
        })->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%');
                });
            })->latest()->paginate(20);


        return view('livewire.client.article_archive.index', compact('articles'));
    }
}
