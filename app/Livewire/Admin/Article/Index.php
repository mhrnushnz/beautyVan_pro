<?php
namespace App\Livewire\Admin\Article;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component{
    use WithPagination;
    public $search = '';
    public $status = 'all';

    protected $queryString = ['status' => ['except' => 'all'], 'search' => ['except' => ''],];


    public function updatingSearch(){
        $this->resetPage();
    }



    //این 2 متد برای حذف تصاویر داخل ادیتور هنگام حذف مقاله اند
    private function extractTrixImages($html){
        preg_match_all('/<img[^>]+src="([^">]+)"/i', $html, $matches);
        return $matches[1] ?? [];
    }
    private function deleteTrixImages($images){
        foreach ($images as $url) {
            $path = parse_url($url, PHP_URL_PATH);
            $path = str_replace('/storage/', '', $path);

            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }
    }

    public function delete($articleId){
        $article = Article::find($articleId);
        if (!$article) {return;}
        // استخراج عکس‌های داخل ادیتورحذف از storage
        $images = $this->extractTrixImages($article->content);
        $this->deleteTrixImages($images);

        $article->delete();
        $this->dispatch('toast', type: 'error', message: 'مقاله مورد نظر حذف شد');
        $this->resetPage();
    }


    public function render(){
        $articles = Article::with(['admin', 'articleCategories'])->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })->when($this->status !== 'all', function ($query) {
                $query->where('status', $this->status);
            })->latest()->paginate(10);

        return view('livewire.admin.article.index', compact('articles'))->layout('layouts.admin.app');}
}
