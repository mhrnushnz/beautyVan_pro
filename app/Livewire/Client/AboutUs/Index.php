<?php
namespace App\Livewire\Client\AboutUs;
use App\Services\SchemaService;
use App\Services\SeoService;
use Livewire\Component;

class Index extends Component{
    public $schemas = [];

    public function mount(){
        SeoService::index(
            title: 'درباره ما',
            description: 'بیوتی ون ارائه‌دهنده خدمات تخصصی آرایشی، زیبایی و مراقبت پوست و مو در منزل است. با تیمی حرفه‌ای و استفاده از محصولات باکیفیت در کنار شما هستیم.',
            canonical: route('about_us'),
            image: asset('storage/default/og-about.jpg')
        );
        $this->schemas = [
            SchemaService::aboutPage(),
            SchemaService::organization(),
            SchemaService::breadcrumb([
                [
                    'name' => 'خانه',
                    'url' => url('/'),
                ],[
                    'name' => 'درباره ما',
                    'url' => route('about_us'),
                ],
            ]),
        ];
    }



    public function render()
    {
        return view('livewire.client.about_us.index');
    }
}
