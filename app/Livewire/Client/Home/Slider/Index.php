<?php
namespace App\Livewire\Client\Home\Slider;
use App\Models\Slider;
use Livewire\Component;
class Index extends Component{
    public function render(){
        $sliders = Slider::all();
        return view('livewire.client.home.slider.index', compact('sliders'));
    }
}
