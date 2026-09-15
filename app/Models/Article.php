<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class Article extends Model{
    protected $guarded = [];
    protected $casts = ['secondary_keywords' => 'array',];

    public function submit($validatedData , $articleId, $image ,$editImage){
        $imagePath = $editImage;

        if ($image) {
            if ($editImage && Storage::disk('public')->exists($editImage)) {
                Storage::disk('public')->delete($editImage);
            }
            $imagePath = $image->store('articles', 'public');
        }
        return Article::updateOrCreate(
            ['id' => $articleId
            ], [
                'title' => $validatedData['title'],
                'admin_id' => Auth::id(),
                'content' => $validatedData['description'],
                'article_category_id' => $validatedData['article_category'],
                'slug' => $validatedData['slug'],
                'status' => $validatedData['status'],
                'meta_description'=> $validatedData['meta_description'],
                'focus_keyword' => $validatedData['focus_keyword'],
                'secondary_keywords' => $validatedData['secondary_keywords'],
                'robots' => $validatedData['robots'],
                'path' => $imagePath,
            ]
        );
    }


    protected static function boot(){
        parent::boot();
        static::deleting(function ($article) {
            if ($article->path && Storage::disk('public')->exists($article->path)) {
                Storage::disk('public')->delete($article->path);
            }
        });
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function articleCategories(){
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }
}
