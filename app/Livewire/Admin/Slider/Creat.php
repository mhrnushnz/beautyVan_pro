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
    public $link = '';

    public function mount($id = null){
        if ($id) {
            $slider = Slider::findOrFail($id);
            $this->sliderId = $slider->id;
            $this->title = $slider->title;
            $this->description = $slider->description;
            $this->short_description = $slider->short_description;
            $this->imageEdit = $slider->path;
            $this->position = $slider->position;
            $this->link = $slider->link ?? '';
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
        $limits = ['top' => 5, 'center' => 2];
        $positionNames = ['top' => 'اسلایدر', 'center' => 'پوستر'];
        if (isset($limits[$this->position])) {
            $count = Slider::query()->where('position', $this->position)->when($this->sliderId, function ($query) {
                    $query->where('id', '!=', $this->sliderId);})->count();
            if ($count >= $limits[$this->position]) {
                $this->addError('position', 'ظرفیت بخش ' . $positionNames[$this->position] .
                    ' تکمیل است. حداکثر ' . $limits[$this->position] . ' تصویر مجاز است.');
                return;
            }
        }

        $rules = [
        'title' => $this->position === 'top' ? 'required|string|max:150' : 'nullable|string|max:150',
        'description' => $this->position === 'top' ? 'required|string|max:150' : 'nullable|string|max:150',
        'short_description' => $this->position === 'top' ? 'required|string|max:150' : 'nullable|string|max:150',
        'position' => 'required|in:top,center,bottom',
        'link' => $this->position === 'bottom' ? 'nullable|url:http,https|max:2048' : 'nullable',
        ];

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
            ['id' => $this->sliderId],[
                'title' => $this->position === 'top' ? ($this->title ?: null) : null,
                'description' => $this->position === 'top' ? ($this->description ?: null) : null,
                'short_description' => $this->position === 'top' ? ($this->short_description ?: null) : null,
                'position' => $this->position,
                'path' => $imagePath,
                'link' => $this->position === 'bottom' ? ($this->link ?: null) : null,
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
