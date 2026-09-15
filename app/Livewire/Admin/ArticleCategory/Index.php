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
    public $articleCategoryId;


    public function updatedName(){
        $this->slug = Str::slug($this->name, '-' , null);
    }

    public function submit(){
        $validatedData = $this->validate([
            'name' => 'required|string|max:30',
            'slug' => 'required|string|max:30',
            'meta_description' => 'required|string|max:200',
        ],[
            'required' => 'پر کردن فیلد الزامی می باشد',
            'string' =>'فرمت اشتباه است',
            'max' =>'حداکثر تعداد کاراکتر ها 30 می باشد',
            'meta_description' => 'حداکثر تعداد کاراکتر ها 200 می باشد'
        ]);

        ArticleCategory::query()->updateOrCreate([
            'id' => $this->articleCategoryId
        ],[
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        $this->reset(['name','slug','meta_description','articleCategoryId']);
        $this->dispatch('toast', type: 'success', message: 'دسته بندی با موفقیت ثبت شد');
    }

    public function edit($articleCategoryId){
        $article_category = ArticleCategory::query()->where('id', $articleCategoryId)->first();
        if($article_category){
            $this->name = $article_category->name;
            $this->slug = $article_category->slug;
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
