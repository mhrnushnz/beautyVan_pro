<?php
namespace App\Livewire\Admin\Notif;
use App\Models\Contact_us;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component{
    use WithPagination;
    public $search;

    public function updatedSearch(){
        $this->resetPage();
    }

    public function delete($messageId){
        Contact_us::query()->where('id', $messageId)->first()->delete();
        $this->dispatch('toast', type: 'error', message: 'پیام حذف شد');
    }


    public function render(){
        Contact_us::query()->where('is_read',false)->update(['is_read' => true]);


        $messages = Contact_us::query()->when($this->search, function ($q){
            $q->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%');
            });
        })->latest()->paginate(10);
        return view('livewire.admin.notif.index', compact('messages'))->layout('layouts.admin.app');
    }
}
