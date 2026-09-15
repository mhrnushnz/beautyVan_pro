<?php
namespace App\Livewire\Admin\Slider;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component{

    public function delete($id){
        $slider = Slider::query()->where('id', $id)->first();
        // حذف فایل تصویر اگر وجود دارد
        if ($slider->path) {
            Storage::disk('public')->delete($slider->path);
        }
        $slider->delete();
        $this->dispatch('toast', type: 'error', message: 'اسلایدر حذف شد');
    }

    public function render(){
        $sliders = Slider::all();
        return view('livewire.admin.slider.index', compact('sliders'))->layout('layouts.admin.app');
    }
}
