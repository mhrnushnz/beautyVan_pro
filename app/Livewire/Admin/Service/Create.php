<?php
namespace App\Livewire\Admin\Service;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceGallery;
use Livewire\Component;
use Livewire\WithFileUploads;
class Create extends Component{
    use WithFileUploads;

    public $serviceCategories = [];
    public $serviceCategory;
    public $images = [];
    public function mount(){
        $this->serviceCategories = ServiceCategory::query()->where('is_active', 1)->get();
    }
    public function submit(){
        $validatedData = $this->validate([
            'images'   => 'required|array|min:1',     //چک میکنه تصاویر وجود داشته باشن از نوع ارایشه باشن و حداقل یک تصویر باشه
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', //ولیدیشن تک تک تصاویر داخل ارایه
            'serviceCategory' => 'required|exists:service_categories,id',
        ],[
            'images.*.max' => 'حداکثر حجم هر تصویر 2 مگابایت است',
            'images.*.image' => 'فرمت تصویر معتبر نیست',
            'serviceCategory.exists' => 'دسته بندی خدمات معتبر نیست',
            '*.required' => 'پر کردن فیلد الزامی می باشد',
            '*.min' => ' حداقل یک تصویر وجود داشته باشد',
        ]);
        $serviceCategoryModel = new Service();
        $serviceCategoryModel->submit($validatedData, $this->images);
        $this->dispatch('toast', type: 'success', message: 'نمونه کار برای خدمات مورد نظر با موفقیت ثبت شد');
        $this->reset();
        return $this->redirect(route('service'));
    }

    public function removeImage($index){
        unset($this->images[$index]);
        $this->images = array_values($this->images);// مرتب کردن مجدد ایندکس‌ها
    }

    public function render(){
        $galleries = ServiceGallery::query()->with(['service.serviceCategory'])->latest()->paginate(10);
        return view('livewire.admin.service.create', compact('galleries'))->layout('layouts.admin.app');
    }
}
