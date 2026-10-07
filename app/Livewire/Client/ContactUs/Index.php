<?php
namespace App\Livewire\Client\ContactUs;
use App\Models\Contact_us;
use App\Services\SeoService;
use Livewire\Component;

class Index extends Component{
    public $name;
    public $email;
    public $phone;
    public $message;
    public array $schema = [];

    public function mount(){
        SeoService::index(
            title: 'تماس با ما | بیوتی ون',
            description: 'برای ارتباط با بیوتی ون، دریافت مشاوره و اطلاعات بیشتر درباره خدمات زیبایی و مراقبت پوست و مو با ما در تماس باشید.',
            canonical: route('contact_us'),
            image: asset('storage/default/og-contact.jpg')
        );

//اسکیما دستی
        $this->schema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'ContactPage',
                    '@id' => route('contact_us') . '#webpage',
                    'url' => route('contact_us'),
                    'name' => 'تماس با ما',
                    'description' => 'راه‌های ارتباط با بیوتی ون',
                ],

                [
                    '@type' => 'Organization',
                    '@id' => url('/') . '/#organization',
                    'name' => 'بیوتی ون',
                    'url' => url('/'),
                    'telephone' => '۰۹۰۴۴۴۴۴۵۹۷',
                    'email' => 'ایمیل شرکت',
                ],
            ],
        ];
    }



    public function submit(){
        $validatedData = $this->validate([
            'name' => 'required|string|max:30',
            'phone' => 'required|regex:/^09[0-9]{9}$/|max:11',
            'email' => 'nullable|email',
            'message' => 'required|string|max:500',
        ],[
            'required' => 'پر کردن فیلد الزامی می باشد',
            'string' =>'فرمت اشتباه است',
            'max' =>'حداکثر تعداد کاراکتر ها 30 می باشد',
            'phone.regex' => 'شماره موبایل باید با 09 شروع شده و 11 رقم باشد',
            'phone.max' => 'حداکثر تعداد کاراکتر ها 11 می باشد',
            'message.max' => 'حداکثر تعداد کاراکتر ها 500 می باشد'
        ]);

        Contact_us::query()->create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'message' => $validatedData['message'],
        ]);

        $this->reset(['name','email','phone','message']);
        $this->dispatch('toast', type: 'success', message: 'پیام شما برای کارشناسان ما ارسال شد');
    }


    public function render(){
        return view('livewire.client.contact_us.index');
    }
}
