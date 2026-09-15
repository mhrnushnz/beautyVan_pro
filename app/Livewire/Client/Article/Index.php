<?php
namespace App\Livewire\Client\Article;
use App\Models\Article;
use App\Services\SchemaService;
use App\Services\SeoService;
use Livewire\Component;
class Index extends Component{
    public $articleId;
    public array $schemas = [];

    public function mount($slug){
        $article = Article::query()->with(['articleCategories', 'admin'])->where('slug', $slug)->where('status', 'published')->firstOrFail();
        $this->articleId = $article;

        SeoService::set(
            title: $article->seo_title ?? $article->title,
            description: $article->meta_description,
            canonical: route('article_client', [
                'slug' => $article->slug
            ]),
            image: $article->path
                ? asset('storage/' . $article->path)
                : null,
            robots: $article->robots ?? 'index, follow',
            type: 'article'
        );

        $this->schemas = [
            SchemaService::article($article),

            SchemaService::breadcrumb([
                [
                    'name' => 'خانه',
                    'url' => route('home'),
                ],
                [
                    'name' => 'مجله آموزشی',
                    'url' => route('articleArchive'),
                ],
                [
                    'name' => $article->title,
                    'url' => route('article_client', [
                        'slug' => $article->slug,
                    ]),
                ],
            ]),
        ];
    }

    public function render()
    {
        $articles = Article::query()
            ->with('articleCategories')
            ->where('status', 'published')
            ->where('id', '!=', $this->articleId->id)
            ->latest()
            ->take(3)
            ->get();

        return view(
            'livewire.client.article.index',
            compact('articles')
        );
    }
}
