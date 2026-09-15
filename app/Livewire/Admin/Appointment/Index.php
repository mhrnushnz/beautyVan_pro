<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component{
    use WithPagination;
    public $status = 'all';
    public $search = '';

    public function filter($status){
        $this->status = $status;
        $this->resetPage();
    }

    public function delete($appointmentId){
        $appointment = Appointment::query()->with('services')->where('id', $appointmentId)->first();
        $appointment->delete();
        $this->dispatch('toast', type: 'error', message: 'نوبت با موفقیت حذف شد');
        $this->resetPage();
    }
    public function render(){
        $appointments = Appointment::query()->with('services')->when($this->status !== 'all', function ($query) {
            $query->where('status', $this->status);
        })
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('phone', 'like', "%{$this->search}%")
                        ->orWhere('name', 'like', "%{$this->search}%")
                        ->orWhere('lastname', 'like', "%{$this->search}%");
                });
            })

            ->latest()->paginate(10);
        return view('livewire.admin.appointment.index', compact('appointments'))->layout('layouts.admin.app');
    }
}
