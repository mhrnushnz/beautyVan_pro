<?php
namespace App\Livewire\Client\Header;
use App\Models\ServiceCategory;
use Livewire\Component;
class Index extends Component{
    public $servicesCategories = [];
    public function mount(){
        $this->servicesCategories = ServiceCategory::query()->where('is_active', 1)->get();
    }
    public function render(){
        return view('livewire.client.header.index');
    }
}
