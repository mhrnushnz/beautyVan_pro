<?php
namespace App\Livewire\Client\AboutUs;
use App\Services\SeoService;
use Livewire\Component;
class Index extends Component{
    public array $schema = [];
    public function mount(){
        SeoService::index(
            title: 'درباره ما',
            description: 'بیوتی ون ارائه‌دهنده خدمات تخصصی آرایشی، زیبایی و مراقبت پوست و مو در منزل است. با تیمی حرفه‌ای و استفاده از محصولات باکیفیت در کنار شما هستیم.',
            canonical: route('about_us'),
            image: asset('storage/default/og-about.jpg')
        );

        $this->schema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'AboutPage',
                    '@id' => route('about_us') . '#webpage',
                    'url' => route('about_us'),
                    'name' => 'درباره ما',
                    'description' => 'درباره بیوتی ون و خدمات ما',
                ],

                [
                    '@type' => 'Organization',
                    '@id' => url('/') . '/#organization',
                    'name' => 'نام بیوتی ون',
                    'url' => url('/'),
                ],
            ],
        ];
    }

    public function render(){
        return view('livewire.client.about_us.index');
    }
}
