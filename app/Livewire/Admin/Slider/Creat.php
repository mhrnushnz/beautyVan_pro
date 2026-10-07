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
    public $position = 'top';

    public function mount($id = null){
        if ($id) {
            $slider = Slider::findOrFail($id);
            $this->sliderId = $slider->id;
            $this->title = $slider->title;
            $this->description = $slider->description;
            $this->short_description = $slider->short_description;
            $this->imageEdit = $slider->path;
            $this->position = $slider->position;
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
        $limits = ['top' => 5, 'center' => 2, 'bottom' => 4,];
        $positionNames = ['top' => 'اسلایدر', 'center' => 'پوستر', 'bottom' => 'تبلیغات',];
        $count = Slider::query()->where('position', $this->position)->when($this->sliderId, function ($query) {
                $query->where('id', '!=', $this->sliderId);})->count();

        if ($count >= $limits[$this->position]) {
            $this->addError(
                'position',
                'ظرفیت بخش ' .
                $positionNames[$this->position] .
                ' تکمیل است. حداکثر ' .
                $limits[$this->position] .
                ' تصویر مجاز است.');
            return;
        }

        $rules = [
        'title' => 'required|string|max:150',
        'description' => 'required|string|max:150',
        'short_description' => 'required|string|max:150',
        'position' => 'required|in:top,center,bottom',];

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
            ['id' => $this->sliderId
            ],[
                'title' => $this->title,
                'description' => $this->description,
                'short_description' => $this->short_description,
                'position' => $this->position,
                'path' => $imagePath,
            ]
        );

        $this->reset();
        $this->dispatch('toast', type: 'success', message: $this->sliderId ? 'اسلایدر ویرایش شد' : 'اسلایدر ثبت شد');
        return redirect()->route('adminSlider');
    }

    public function render(){
        return view('livewire.admin.slider.creat')->layout('layouts.admin.app');
    }
}
