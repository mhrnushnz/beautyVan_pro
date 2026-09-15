<?php
namespace App\Livewire\Client\Home\Specialty;
use Livewire\Component;
class Index extends Component{
    public function placeholder() {
        return view('livewire.client.home.specialty.placeholder');
    }

    public function render()
    {
        return view('livewire.client.home.specialty.index');
    }
}
