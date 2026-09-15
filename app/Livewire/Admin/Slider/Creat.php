<?php
namespace App\Livewire\Admin\Slider;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Creat extends Component{
    use WithFileUploads;
    public $sliderId;
    public $title;
    public $description;
    public $short_description;
    public $image;
    public $imageEdit;

    public function mount($id = null){
        if ($id) {
            $slider = Slider::findOrFail($id);
            $this->sliderId = $slider->id;
            $this->title = $slider->title;
            $this->description = $slider->description;
            $this->short_description = $slider->short_description;
            $this->imageEdit = $slider->path;
        }
    }

    public function clear_temporary_image(){
        if ($this->imageEdit) {
            Storage::disk('public')->delete($this->imageEdit);

            Slider::where('id', $this->sliderId)->update(['path' => null]);
        }

        $this->image = null;
        $this->imageEdit = null;
    }

    public function submit(){
        // 👇 محدودیت تعداد اسلایدر
        if (!$this->sliderId && Slider::count() >= 5) {
            $this->dispatch('toast',
                type: 'error',
                message: 'ظرفیت اسلایدر تکمیل است (حداکثر ۵ عدد)'
            );
            return;
        }

        $rules = [
        'title' => 'required|string|max:150',
        'description' => 'required|string|max:150',
        'short_description' => 'required|string|max:150',];

        // تصویر فقط در ساخت یا وقتی عکس جدید آپلود شده
        if (!$this->sliderId || $this->image) {
            $rules['image'] = 'required|image|mimes:jpg,jpeg,png,webp|max:2048';
        }

        $validated = $this->validate($rules);

        if ($this->image) {
            $imagePath = $this->image->store('sliders', 'public');
        } else {
            $imagePath = $this->imageEdit;
        }

        Slider::updateOrCreate(
            ['id' => $this->sliderId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'short_description' => $this->short_description,
                'path' => $imagePath,
            ]
        );

        $this->reset();

        $this->dispatch('toast',
            type: 'success',
            message: $this->sliderId ? 'اسلایدر ویرایش شد' : 'اسلایدر ثبت شد'
        );

        return redirect()->route('adminSlider');
    }

    public function render(){
        return view('livewire.admin.slider.creat')->layout('layouts.admin.app');
    }
}
