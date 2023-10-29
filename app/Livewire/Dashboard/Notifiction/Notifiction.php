<?php

namespace App\Livewire\Dashboard\Notifiction;

use App\Models\activity;
use App\Models\city;
use App\Models\User;
use Livewire\Component;
use App\Models\notification;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class Notifiction extends Component
{
    use WithFileUploads;
    public $activity ,$selectactive = true, $citys,$users, $image, $selectmultiuser, $title, $body, $selectstore = null,$selectcity = '0',$selectactivety = '0';
    public function mount()
    {
        $this->users    = User::all();
        $this->citys    = city::all();
        $this->activity = activity::all();

    }

    public function sendnotifiction()
    {
        $query = DB::table('users')->where('fsm','!=',null);
        if($query->count() < 1){

          return  $this->dispatch('swal', message: 'لايوجد مستخدمين لديهم توكن',ev:'danger');

        }
        if($this->selectactivety != '0'){
            $query->where('activity_id', $this->selectactivety);
        }
        if($this->selectcity != '0'){
            $query->where('city_id', $this->selectcity);
        }
        if ($this->selectactive == 0 && count($this->selectmultiuser) > 0) {
            $send = $query->where('id', $this->selectmultiuser)->pluck('fsm')->toArray();
        } elseif ($this->selectactive == 1) {
            $send =   $query->pluck('fsm')->toArray();
        }

        if (count($send) != 0) {
            if ($this->image !=  null) {
                $image  =  uploadimages('notifi', $this->image);
            } else {
                $image = null;
            }
            $results =  notificationFCM($this->title, $this->body, $send, null, $image, null, null, true, $this->selectstore == 0 ? null : $this->selectstore);
        }
        $this->dispatch('swal', message: 'تم الارسال بنجاح',ev:'info');

    }
    public function render()
    {
        return view('dashboard.notifiction.notifiction');
    }
}
