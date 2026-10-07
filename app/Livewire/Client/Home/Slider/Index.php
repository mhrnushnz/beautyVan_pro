<?php
namespace App\Livewire\Client\Home\Slider;
use App\Models\Slider;
use Livewire\Component;
class Index extends Component{
    public function render(){
        $sliders = Slider::query()->where('position', 'top')
            ->whereNotNull('path')->latest()->take(5)->get();
        return view('livewire.client.home.slider.index', compact('sliders'));
    }
}
