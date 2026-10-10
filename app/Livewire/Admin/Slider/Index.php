<?php
namespace App\Livewire\Admin\Slider;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component{
    use WithPagination;
    public $search = '';
    public $status = 'all';

    public function delete($id){
        $slider = Slider::query()->where('id', $id)->first();
        // حذف فایل تصویر اگر وجود دارد
        if ($slider->path) {
            Storage::disk('public')->delete($slider->path);
        }
        $slider->delete();
        $this->dispatch('toast', type: 'error', message: 'اسلایدر حذف شد');
    }

    // بازگشت به صفحه اول هنگام جستجو
    public function updatedSearch(): void{
        $this->resetPage();
    }


    // بازگشت به صفحه اول هنگام تغییر فیلتر
    public function updatedStatus(): void{
        $this->resetPage();
    }

    public function render(){
        $sliders = Slider::query()
            ->when($this->search, function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%');
            })
            ->when(in_array($this->status, ['top', 'center', 'bottom'], true), function ($q) {
                $q->where('position', $this->status);
            })
            ->latest()
            ->paginate(10);
        return view('livewire.admin.slider.index', compact('sliders'))->layout('layouts.admin.app');
    }
}
