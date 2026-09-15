<?php
namespace App\Livewire\Client\Services;
use App\Models\ServiceCategory;
use App\Models\ServiceGallery;
use App\Services\SchemaService;
use App\Services\SeoService;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component{
    use WithPagination;
    public $servicecategories = [];
    public $serviceCategoryId;

    public $schemas = [];

    public function mount($slug = null){
        $this->servicecategories = ServiceCategory::all();

        $category = null;

        if ($slug !== null) {
            $category = ServiceCategory::where('slug', $slug)->firstOrFail();
            $this->serviceCategoryId = $category->id;
        }

        $this->setSeo($category);
        $this->setSchemas($category);
    }

    private function setSeo($category = null): void{
        if ($category) {
            SeoService::index(
                title: $category->seo_title ?? $category->name . ' | خدمات بیوتی ون',
                description: $category->meta_description ?? 'نمونه کارها و خدمات تخصصی ' . $category->name . ' در بیوتی ون.',
                canonical: route('our_service', ['slug' => $category->slug]),
                image: $category->path? asset('storage/' . $category->path): asset('storage/default/og-service.jpg'),
                type: 'website'
            );
        } else {
            SeoService::index(
                title: 'خدمات زیبایی و مراقبت پوست و مو | بیوتی ون',
                description: 'خدمات تخصصی بیوتی ون شامل مراقبت پوست، مو، ناخن و سایر خدمات زیبایی حرفه‌ای را مشاهده و بررسی کنید.',
                canonical: route('ourService'),
                image: asset('storage/default/og-service.jpg'),
                type: 'website'
            );
        }
    }


    private function setSchemas($category = null): void{
        if ($category) {
            $this->schemas = [SchemaService::serviceCategory($category),
                SchemaService::breadcrumb([
                    [
                        'name' => 'خانه',
                        'url' => url('/'),
                    ],[
                        'name' => 'خدمات',
                        'url' => route('ourService'),
                    ],[
                        'name' => $category->name,
                        'url' => route('our_service', ['slug' => $category->slug,
                        ]),
                    ],
                ]),
            ];

        } else {
            $this->schemas = [
                SchemaService::servicesPage(),
                SchemaService::breadcrumb([
                    [
                        'name' => 'خانه',
                        'url' => url('/'),
                    ],[
                        'name' => 'خدمات',
                        'url' => route('ourService'),
                    ],
                ]),
            ];
        }
    }




    public function updatedServiceCategoryId(){
        $this->resetPage();
    }
    public function render(){
        $servicesImages = ServiceGallery::with('service')->when($this->serviceCategoryId, function ($query) {
            $query->whereHas('service', function ($q) {
                $q->where('service_category_id', $this->serviceCategoryId);});
        })->latest()->paginate(32);
        return view('livewire.client.service.index', compact('servicesImages'));
    }
}
