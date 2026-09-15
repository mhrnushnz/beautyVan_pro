<?php
namespace App\Livewire\Client\Appointment;
use App\Models\Appointment;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class Index extends Component{
    use SEOTools;
    public $appointments = [];

    public function mount(){
        $this->appointments = Appointment::query()->with('services')->where('user_id', Auth::id())->latest()->get();
        $this->seoConfig();
    }


    public function seoConfig(){
        $this->seo()
            ->setTitle('نوبت های من')
            ->setDescription('در این صفحه می‌توانید تمامی نوبت‌های ثبت‌شده خود را مشاهده، مدیریت و وضعیت هر رزرو را بررسی کنید. امکان پیگیری و مشاهده جزئیات خدمات رزرو شده در بیوتی ون.');
    }

    public function cancelAppointment($appointmentId){
        Appointment::query()
            ->findOrFail($appointmentId)
            ->update([
                'status' => 'canceled',
            ]);
    }


    public function render(){
        return view('livewire.client.appointment.index');
    }
}
