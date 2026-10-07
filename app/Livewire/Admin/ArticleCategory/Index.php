<?php
namespace App\Livewire\Admin\ArticleCategory;
use App\Models\ArticleCategory;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component{
    use WithPagination;
    public $slug;
    public $meta_description;
    public $name;
    public $parent_id = null;
    public $articleCategoryId;


    public function updatedName(){
        $this->slug = Str::slug($this->name, '-' , null);
    }

    public function submit(){
        $validatedData = $this->validate([
            'name' => 'required|string|max:30',
            'slug' => 'required|string|max:30',
            'parent_id' => ['nullable','exists:article_categories,id',
                function ($attribute, $value, $fail) {
                    if ($this->articleCategoryId && $value && (int) $value === (int) $this->articleCategoryId){
                        $fail('یک دسته‌بندی نمی‌تواند والد خودش باشد.');
                    }}],
            'meta_description' => 'required|string|max:200',
        ],[
            'name.required' => 'نام دسته‌بندی الزامی است.',
            'name.string' => 'فرمت نام دسته‌بندی صحیح نیست.',
            'name.max' => 'نام دسته‌بندی حداکثر 30 کاراکتر باشد.',
            'slug.required' => 'اسلاگ الزامی است.',
            'slug.string' => 'فرمت اسلاگ صحیح نیست.',
            'slug.max' => 'اسلاگ بیش از حد طولانی است.',
            'slug.unique' => 'این اسلاگ قبلاً استفاده شده است.',
            'meta_description.required' => 'توضیحات متا الزامی است.',
            'meta_description.string' => 'فرمت توضیحات متا صحیح نیست.',
            'meta_description.max' => 'توضیحات متا حداکثر 200 کاراکتر باشد.',
            'parent_id.exists' => 'دسته‌بندی والد انتخاب‌شده معتبر نیست.',
        ]);

        ArticleCategory::query()->updateOrCreate([
            'id' => $this->articleCategoryId
        ],[
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'parent_id' => $validatedData['parent_id'] ?: null,      //چون مقدار پیش فرض داره
            'meta_description' => $validatedData['meta_description'],
        ]);

        $this->reset(['name','slug','meta_description','articleCategoryId', 'parent_id']);
        $this->dispatch('toast', type: 'success', message: 'دسته بندی با موفقیت ثبت شد');
    }

    public function edit($articleCategoryId){
        $article_category = ArticleCategory::query()->where('id', $articleCategoryId)->first();
        if($article_category){
            $this->name = $article_category->name;
            $this->slug = $article_category->slug;
            $this->parent_id = $article_category->parent_id;
            $this->meta_description = $article_category->meta_description;
            $this->articleCategoryId = $article_category->id;
        }
    }


    public function delete($articleCategoryId){
        ArticleCategory::query()->where('id', $articleCategoryId)->delete();
        $this->dispatch('toast', type: 'error', message: 'دسته بندی حذف شد');
        $this->resetPage();
    }


    public function render(){
        $articleCategories = ArticleCategory::paginate(10);
        return view('livewire.admin.article_category.index', compact('articleCategories'))->layout('layouts.admin.app');
    }
}
