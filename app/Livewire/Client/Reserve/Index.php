<?php
namespace App\Livewire\Client\Reserve;
use App\Models\Appointment;
use App\Models\ServiceCategory;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component{
    use SEOTools;
    public $name;
    public $lastname;
    public $phone;
    public $date;
    public $time;
    public $serviceCategory = [];
    public $description;
    public $city;
    public $district;
    public $address;

    public $serviceCategories = [];

    public function mount(){
        $this->serviceCategories = ServiceCategory::query()->where('is_active', 1)->get();
        $this->seoConfig();
    }

    public function seoConfig(){
        $this->seo()
            ->setTitle('رزرو نوبت خدمات زیبایی')
            ->setDescription('رزرو آنلاین نوبت خدمات پوست، مو، پاکسازی و میکاپ در بیوتی ون. انتخاب زمان دلخواه و دریافت خدمات حرفه‌ای با تیم متخصص.')
            ->setCanonical(url('/booking'));
    }


    public function submit(){
        $validatedData = $this->validate([
            'name' => 'required|string|max:30',
            'lastname' => 'required|string|max:30',
            'phone' => "required|regex:/^09[0-9]{9}$/|max:11",
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'nullable|string|max:1000',
            'serviceCategory' => 'required|array|min:1',
            'serviceCategory.*' => 'exists:service_categories,id',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:30',
            'district' => 'required|string|max:300',
        ],[
            '*.required' => 'پر کردن فیلد الزامی می باشد',
            '*.string' =>'فرمت اشتباه است',
            '*.max' =>'حداکثر تعداد کاراکتر ها 30 می باشد',
            'phone.max' => 'حداکثر کاراکتر ها 11 می باشد',
            'district.max' => 'حداکثر کاراکتر ها 300 می باشد',
            'date.date' => 'فرمت نامعتبر است',
            'description.max' =>'حداکثر تعداد کاراکتر ها 1000 می باشد',
            'image.max' =>'حداکثر حجم تصویر 2 مگابایت است',
            'serviceCategory.exists' => 'خدمات مورد نظر وجود ندارد',
            'serviceCategory.min' => 'حداقل یک خدمات انتخاب شود',
        ]);

        $appointment = Appointment::query()->create([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'phone' => $validatedData['phone'],
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'description' => $validatedData['description'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'district' => $validatedData['district'],
            'user_id' => Auth::id(),
        ]);

        $appointment->services()->attach(
            $validatedData['serviceCategory']
        );

        $this->reset(['name','lastname','phone','date','time','description','serviceCategory']);
        session()->flash('toast', ['type' => 'success', 'message' => 'نوبت با موفقیت ثبت شد اکنون درصف انتظار هستید']);
        return $this->redirect(route('clientAppointment'));
    }



    public function render(){
        return view('livewire.client.reserve.index');
    }
}
