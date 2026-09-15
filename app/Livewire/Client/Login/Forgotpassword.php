<?php
namespace App\Livewire\Client\Login;
use App\Models\User;
use Livewire\Component;

class Forgotpassword extends Component{
    public $phone;
    public $password;
    public $sentCode;
    public $code;

    public $verifyCode;

    public $step = 1;

    public function send(){
        $this->validate([
            'phone' => 'required|exists:users,phone',
        ]);
        $this->sentCode = rand(100000, 999999);

        // فعلا برای تست
        session(['reset_code' => $this->sentCode]);

        $this->step = 2;
    }

    public function resetPassword(){
        $this->validate([
            'password' => 'required|min:6',
            'verifyCode' => 'required'
        ]);

        if ($this->verifyCode != session('reset_code')) {
            $this->addError('verifyCode', 'کد وارد شده صحیح نیست');
            return;
        }

        $user = User::where('phone', $this->phone)->firstOrFail();

        $user->update([
            'password' => $this->password,
        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'رمز عبور با موفقیت تغییر کرد'
        ]);

        return $this->redirectRoute('login_client');
    }



    public function render(){
        return view('livewire.client.login.forgotpassword')->layout('layouts.client.login');
    }
}
