<?php
namespace App\Livewire\Client\Home;
use App\Services\SchemaService;
use App\Services\SeoService;
use Livewire\Component;

class Index extends Component{
    public $schemas = [];

    public function mount(){
         // SEO
        SeoService::index(
            title: 'بیوتی ون | خدمات زیبایی و مراقبت پوست و مو',
            description: 'بیوتی ون ارائه‌دهنده خدمات تخصصی زیبایی، مراقبت پوست و مو، پاکسازی پوست، میکاپ و مشاوره حرفه‌ای زیبایی با بهترین کیفیت.',
            canonical: url('/'),
            image: asset('storage/default/og-home.jpg')
        );

        // Schema
        $this->schemas = [
            SchemaService::website(),
            SchemaService::organization(),
        ];
    }

    public function render(){
        return view('livewire.client.home.index');
    }
}
