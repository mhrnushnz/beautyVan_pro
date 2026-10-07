<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ArticleCategory extends Model{
    protected $guarded = [];
    public function parent(){ //ریلیشن دسته اصلی
        return $this->belongsTo(ArticleCategory::class, 'parent_id');
    }
    public function children(){ //ریلیشن فرزند دسته اصلی
        return $this->hasMany(ArticleCategory::class, 'parent_id');
    }
    public function childrenRecursive(){  //ریلیشن ارتباط فرزندانه فرزندان
        return $this->children()->with('childrenRecursive');
    }
    public function getFullPathAttribute(): string{
        $slugs = [$this->slug];
        $parent = $this->parent;
        while ($parent) {
            array_unshift($slugs, $parent->slug);
            $parent = $parent->parent;
        }
        return implode('/', $slugs);
    }
}
