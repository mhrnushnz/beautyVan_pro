<?php
namespace App\Livewire\Client\Home\Comment;
use Livewire\Component;
class Index extends Component{
    public function placeholder() {
        return view('livewire.client.home.comment.placeholder');
    }

    public function render(){
        return view('livewire.client.home.comment.index');
    }
}
