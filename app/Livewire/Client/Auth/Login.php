<?php
namespace App\Livewire\Client\Auth;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component{
    public $email;
    public $password;

    public function AuthLogin(){
        $this->validate([
           'email'=>'required|email',
           'password'=>'required'
        ]);
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password,], true)) {
            $this->addError('email', 'ایمیل یا رمز عبور وجود ندارد');
            return;
        }
        session()->regenerate();//سشن قبلی باطل و سشن جدید میسازد و امنیت بالا میرود
        session()->flash('toast', ['type' => 'success', 'message' => 'ورود شما ب حساب کاربری انجام شد.']);

        if (auth()->user()->hasRole(['manager' , 'admin'])) {
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('home');
        }

    }

    public function render(){
        return view('livewire.client.auth.login')->layout('layouts.client.login');
    }
}
