<?php
namespace App\Livewire\Admin\Appointment;
use App\Models\Appointment;
use Livewire\Component;

class AcceptAppointment extends Component{
    public $appointment;
    public $status = 'pending';

    public function mount($id){
        $this->appointment = Appointment::query()->with('services')->findOrFail($id);
        $this->status = $this->appointment->status;
    }


    public function updateAppointment(){
        $this->appointment->update(['status' => $this->status]);

        session()->flash('toast', ['type' => 'success', 'message' => 'تغییرات با موفقیت انجام شد']);
        $this->reset(['status']);
        return $this->redirect(route('appointment'));
    }


    public function render(){
        return view('livewire.admin.appointment.accept_appointment')->layout('layouts.admin.app');
    }
}
