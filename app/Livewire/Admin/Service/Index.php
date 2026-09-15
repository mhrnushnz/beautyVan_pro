<?php
namespace App\Livewire\Admin\Service;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceGallery;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component{
    use WithPagination;
    public $category = 'all';



    public function delete($imageId){
        $image = ServiceGallery::query()->where('id', $imageId)->first();
        if (!$image){
            return;
        }
        //حذف از استوریج حافظه دائمی
        Storage::disk('public')->delete( $image->path);
        $image->delete();

// بررسی اینکه تصویری برای این سرویس باقی مانده یا نه
        $serviceId = $image->service_id;
        $hasGallery = ServiceGallery::where('service_id', $serviceId)->exists();
        if (!$hasGallery) {
            Service::where('id', $serviceId)->delete();
        }
        $this->dispatch('toast', type: 'error', message: 'نمونه کار مورد نظر با موفقیت حذف شد');
    }

    public function setCategory($id){
        $this->category = $id;
        $this->resetPage();
    }

    public function updatedCategory(){
        $this->resetPage();
    }

    public function render(){
        $categories = ServiceCategory::query()->where('is_active', 1)->get();
        $galleries = ServiceGallery::query()->with(['service.serviceCategory'])->when($this->category != 'all', function ($query) {
            $query->whereHas('service', function ($q) {
                $q->where('service_category_id', $this->category);
            });
            })->latest()->paginate(10);
        return view('livewire.admin.service.index', compact(['galleries' ,'categories']))->layout('layouts.admin.app');
    }
}
