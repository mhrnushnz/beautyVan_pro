<?php
namespace App\Livewire\Admin\Users;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component{
    public $user;
    public $role;
    public $roles = [];

    public function mount($id){
        $this->user = User::findOrFail($id);

        if (auth()->user()->hasRole('admin') && !$this->user->hasRole('user')) {
            abort(403);
        }

        if (auth()->user()->hasRole('manager') && $this->user->hasRole('manager')) {
            abort(403);
        }

        //فیلتر کردن نقش ها برای نمایش تو تگ select
        if (auth()->user()->hasRole('admin')) {
            $this->roles = Role::query()->whereIn('name', ['admin', 'user'])->get();
        }else{
            $this->roles = Role::query()->whereIn('name', ['admin', 'user', 'manager'])->get();
        }


        $this->role = $this->user->getRoleNames()->first() ?? '';
    }


    public function edit(){
        $this->validate(['role' => 'required|string',]);
        $this->user->syncRoles([$this->role]); //حذف نقش قبلی و ست کردن نقش جدید
        session()->flash('toast', ['type' => 'success', 'message' => 'نقش کاربر با موفقیت ویرایش شد.']);
        return $this->redirect(route('users.index'));
    }


    public function render(){
        return view('livewire.admin.users.edit')->layout('layouts.admin.app');
    }
}
