<?php
namespace App\Livewire\Client\Login;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class Index extends Component{
    public $name;
    public $phone;
    public $email;
    public $password;

    public function submit(){
        $validatedData = $this->validate([
            'name' => 'required|string|max:30',
            'phone' => 'required|regex:/^09[0-9]{9}$/|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|regex:/[a-zA-Z]/|regex:/[0-9]/',
        ],[
            '*.required' => 'پر کردن فیلد الزامی می باشد',
            '*.string' =>'فرمت اشتباه است',
            '*.max' =>'حداکثر تعداد کاراکتر ها 30 می باشد',
            'phone.regex' => 'شماره موبایل باید با 09 شروع شده و 11 رقم باشد',
            'password.min' => 'رمز عبور باید حداقل 6 کاراکتر باشد',
            'password.regex' => 'رمز عبور باید شامل حروف و اعداد باشد',
            'phone.unique' => 'این شماره موبایل قبلاً ثبت شده است',
            'email.unique' => 'این ایمیل قبلاً ثبت شده است',
            'email.email' => 'فرمت ایمیل معتبر نیست',
        ]);

        $user = User::query()->create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);

        $user->assignRole('user');     //نقش پیش فرض user
        Auth::login($user, true);//این true برای اینه که اگر کاربر لاگین کرد اطلاعاتش ذخیره شه و دوباره لاگین نکنه

        session()->flash('toast', ['type' => 'success', 'message' => 'تبریک میگم! ثبت نام شما با موفقیت انجام شد']);
        $this->reset('name', 'phone', 'email', 'password');
        return redirect()->route('home');
    }

    public function render(){
        return view('livewire.client.login.index')->layout('layouts.client.login');
    }
}
