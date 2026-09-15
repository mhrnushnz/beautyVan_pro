<?php
namespace App\Livewire\Admin\Users;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component{
   use WithPagination;
   public $filterRole = 'all';
   public $search = '';

   public function setFilterRole($role){
      $this->filterRole = $role;
      $this->resetPage();
   }

    public function delete($userId){
        $user = User::query()->where('id', $userId)->firstOrFail();
        //سشن کاربری ک حذف میکنیمو پاک میکنه تا تو سرعت سایت تاثیری نزاره
        DB::table('sessions')->where('user_id', $user->id)->delete();
        $user->delete();
        $this->dispatch('toast', type: 'error', message: 'کاربر مورد نظر حذف شد');
        $this->resetPage();
    }

    public function render(){
        $users = User::query();

        if (auth()->user()->hasRole('admin')) {
            $users->role(['user', 'admin']);
        } elseif (auth()->user()->hasRole('manager')) {
            // همه را نشان بده
        }

        $users = $users->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
        });
            // فیلتر از طریق مرتبسازی براساس
            if ($this->filterRole !== 'all') {
                $users->role($this->filterRole);
            }
            $users = $users->latest()->paginate(10);
        return view('livewire.admin.users.index', compact('users'))->layout('layouts.admin.app');
    }
}
