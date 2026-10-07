<?php
namespace App\Livewire\Client\Home;
use App\Models\Article;
use App\Models\Slider;
use App\Services\SeoService;
use Livewire\Component;

class Index extends Component{
    public array $schema = [];
    public function mount(){
        $this->seoHandeller();
        $this->schemaHandeller();
    }
    public function seoHandeller(){
        SeoService::index(
            title: 'بیوتی ون | خدمات زیبایی و مراقبت پوست و مو',
            description: 'بیوتی ون ارائه‌دهنده خدمات تخصصی زیبایی، مراقبت پوست و مو، پاکسازی پوست، میکاپ و مشاوره حرفه‌ای زیبایی با بهترین کیفیت.',
            canonical: url('/'),
            image: asset('storage/default/og-home.jpg')
        );
    }

    public function schemaHandeller(){
        $this->schema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                // اطلاعات شرکت
                [
                    '@type' => 'Organization',
                    '@id' => url('/') . '#organization',
                    'name' => 'بیوتی ون',
                    'url' => url('/'),
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => asset('images/logo.png'),
                    ],
                ],

                // معرفی کل وب‌سایت
                [
                    '@type' => 'WebSite',
                    '@id' => url('/') . '#website',
                    'url' => url('/'),
                    'name' => 'بیوتی ون',
                    'publisher' => [
                        '@id' => url('/') . '#organization',
                    ],
                ],

                // خود صفحه اصلی
                [
                    '@type' => 'WebPage',
                    '@id' => url('/') . '#webpage',
                    'url' => url('/'),
                    'name' => 'بیوتی ون | خانه',
                    'isPartOf' => [
                        '@id' => url('/') . '#website',
                    ],
                    'about' => [
                        '@id' => url('/') . '#organization',
                    ],
                ],

            ],
        ];
    }

    public function render(){
        $centerSliders = Slider::query()->where('position', 'center')->whereNotNull('path')->latest()->take(2)->get();
        $bottomSliders = Slider::query()->where('position', 'bottom')->whereNotNull('path')->latest()->take(4)->get();
        return view('livewire.client.home.index', compact(['centerSliders', 'bottomSliders']));
    }
}
