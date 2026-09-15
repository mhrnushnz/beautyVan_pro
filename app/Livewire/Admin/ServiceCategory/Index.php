<?php
namespace App\Livewire\Admin\ServiceCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\ServiceCategory;
use Livewire\Component;
class Index extends Component{
    use WithFileUploads;
    use WithPagination;
    public $name;
    public $servicesCategoryId;
    public $is_active = true;
    public $image;
    public $deleteOldImage= false;
    public $removeOldImage = false;
    public $imageEdit ;
    public $slug;
    public $meta_description;


    public function updatedName(){
        $this->slug = Str::slug($this->name, '-' , null);
    }


    public function submit(){
        $rules = [
            'name' => 'required|string|max:30',
            'is_active' => 'required|boolean',
            'slug' => 'required|string',
            'meta_description' => 'required|string|max:200',
        ];

        if ($this->servicesCategoryId) {

            $rules['image'] = $this->deleteOldImage
                ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';

        } else {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        $this->validate($rules);

        $category = ServiceCategory::find($this->servicesCategoryId);

        $imagePath = $category?->path;

        // 1️⃣ اگر کاربر عکس جدید گذاشت
        if ($this->image instanceof \Illuminate\Http\UploadedFile) {

            // حذف عکس قبلی
            if ($category?->path) {
                Storage::disk('public')->delete($category->path);
            }

            $imagePath = $this->image->store('service_category', 'public');
        }

        // 2️⃣ اگر کاربر فقط زده سطل زباله (بدون عکس جدید)
        if ($this->deleteOldImage && !$this->image) {

            if ($category?->path) {
                Storage::disk('public')->delete($category->path);
            }

            $imagePath = null;
        }

        ServiceCategory::updateOrCreate(
            ['id' => $this->servicesCategoryId],
            [
                'name' => $this->name,
                'is_active' => $this->is_active,
                'path' => $imagePath,
                'slug' => $this->slug,
                'meta_description' => $this->meta_description,
            ]
        );

        $this->reset(['name', 'servicesCategoryId', 'is_active', 'image', 'imageEdit', 'deleteOldImage', 'slug', 'meta_description']);
        $this->dispatch('toast', type: 'success', message: 'ثبت شد');
    }

    public function edit($categoryId){
        $category = ServiceCategory::query()->where('id', $categoryId)->first();

        if ($category) {
            $this->name = $category->name;
            $this->servicesCategoryId = $category->id;
            $this->is_active = $category->is_active;
            $this->image = null; // مهم
            $this->imageEdit = $category->path;
            $this->meta_description = $category->meta_description;
            $this->slug = $category->slug;
        }
    }


    public function delete($categoryId){
        $category = ServiceCategory::query()->where('id', $categoryId)->firstOrFail();
        if ($category && $category->path) {
            Storage::disk('public')->delete($category->path);
        }
        $category?->delete();
        $this->dispatch('toast', type: 'error', message: 'دسته بندی حذف شد');
        $this->resetPage();
    }


    public function removeImage(){
        // حالت ساخت
        if (!$this->servicesCategoryId) {
            $this->image = null;
            return;
        }

        // حالت ویرایش
        $this->image = null;
        $this->imageEdit = null;

        // فقط علامت بزن، هنوز حذف واقعی نداریم
        $this->deleteOldImage = true;
    }

    public function render(){
        $servicesCategories = ServiceCategory::query()->paginate(10);
        return view('livewire.admin.service_category.index', compact('servicesCategories'))->layout('layouts.admin.app');
    }
}
