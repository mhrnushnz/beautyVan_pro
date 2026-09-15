<?php
namespace App\Livewire\Client\Home\Blog;
use App\Models\Article;
use Livewire\Component;
class Index extends Component{
    public $status = 'published';

    public function placeholder() {
        return view('livewire.client.home.blog.placeholder');
    }


    public function render(){
        $articles = Article::query()->with('articleCategories')->where('status' , 'published')->latest()->take(3)->get();
        return view('livewire.client.home.blog.index', compact('articles'));
    }
}
