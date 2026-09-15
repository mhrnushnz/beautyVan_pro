<?php
namespace App\Livewire\Admin\Profile;
use Livewire\Component;

class Index extends Component{
    public $user;
    public $name;
    public $email;
    public $phone;

    public function mount(){
        abort_unless(auth()->user()->hasAnyRole(['admin', 'manager']), 403);
        $this->user = auth()->user(); //اطلاعاتو از گارد user میگریم

        $this->name = $this->user->name;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
    }

    public function editUser(){
        $this->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'nullable|string|max:11',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ]);

        $this->user->update([
            'name'  => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        session()->flash('toast', ['type' => 'success', 'message' => 'اطلاعات با موفقیت بروز رسانی شد']);
        return redirect(route('dashboard'));
    }

    public function render(){
        return view('livewire.admin.profile.index')->layout('layouts.admin.app');
    }
}
