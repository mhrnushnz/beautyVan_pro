<?php
namespace App\Livewire\Admin\Layout;
use App\Models\Contact_us;
use Livewire\Component;

class Navbar extends Component{

    public function render(){
        $messageCount = Contact_us::query()->where('is_read',false)->count();
        return view('livewire.admin.layout.navbar', compact('messageCount'))->layout('layouts.admin.app');
    }
}
