<?php
namespace App\Livewire\Client\Services;
use App\Models\ServiceCategory;
use App\Models\ServiceGallery;
use App\Services\SeoService;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component{
    use WithPagination;
    public $servicecategories = [];
    public $serviceCategoryId;
    public array $schema = [];

    public function mount($slug = null){
        $this->servicecategories = ServiceCategory::all();
        $category = null;

        if ($slug !== null) {
            $category = ServiceCategory::where('slug', $slug)->firstOrFail();
            $this->serviceCategoryId = $category->id;
        }

        $this->setSeo($category);
        $this->setSchema($category);
    }

    private function setSeo($category = null){
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

    private function setSchema($category = null) {
        if ($category) {
            $url = route('our_service', ['slug' => $category->slug]);

            $this->schema = [
                '@context' => 'https://schema.org',
                '@graph' => [
                    [
                        '@type' => 'Service',
                        '@id' => $url . '/service',
                        'name' => $category->name,
                        'url' => $url,
                        'description' => $category->meta_description
                            ?? 'خدمات تخصصی ' . $category->name . ' در بیوتی ون',

                        'provider' => [
                            '@type' => 'Organization',
                            '@id' => url('/') . '/#organization',
                            'name' => 'بیوتی ون',
                            'url' => url('/'),
                        ],
                    ],

                    [
                        '@type' => 'BreadcrumbList',
                        '@id' => $url . '/breadcrumb',
                        'itemListElement' => [
                            [
                                '@type' => 'ListItem',
                                'position' => 1,
                                'name' => 'خانه',
                                'item' => url('/'),
                            ],[
                                '@type' => 'ListItem',
                                'position' => 2,
                                'name' => 'خدمات',
                                'item' => route('ourService'),
                            ],[
                                '@type' => 'ListItem',
                                'position' => 3,
                                'name' => $category->name,
                                'item' => $url,
                            ],
                        ],
                    ],

                ],
            ];

        } else {

            $url = route('ourService');
            $this->schema = [
                '@context' => 'https://schema.org',
                '@graph' => [
                    [
                        '@type' => 'CollectionPage',
                        '@id' => $url . '/webpage',
                        'url' => $url,
                        'name' => 'خدمات بیوتی ون',
                        'description' => 'خدمات تخصصی زیبایی و مراقبت پوست، مو، ناخن و سایر خدمات بیوتی ون.',
                        'isPartOf' => [
                            '@id' => url('/') . '/website',
                        ],
                    ],[
                        '@type' => 'BreadcrumbList',
                        '@id' => $url . '/breadcrumb',
                        'itemListElement' => [
                            [
                                '@type' => 'ListItem',
                                'position' => 1,
                                'name' => 'خانه',
                                'item' => url('/'),
                            ],[
                                '@type' => 'ListItem',
                                'position' => 2,
                                'name' => 'خدمات',
                                'item' => $url,
                            ],
                        ],
                    ],

                ],
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
