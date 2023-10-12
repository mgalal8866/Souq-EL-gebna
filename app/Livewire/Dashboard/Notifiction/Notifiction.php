<?php

namespace App\Livewire\Dashboard\Notifiction;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class Notifiction extends Component
{
    use WithFileUploads;
    public $selectactive =true,$users, $image, $selectmultiuser, $title, $body;
    public function mount()
    {
        $this->users =User::all();
    }

    public function sendnotifiction()
    {
        if ($this->selectactive == 0 && count($this->selectmultiuser) > 0) {
            $send = DB::table('users')->where('fsm', '!=', null)->where('id', $this->selectmultiuser)->pluck('fsm')->toArray();
        } elseif ($this->selectactive == 1) {
            $send =   DB::table('users')->where('fsm', '!=', null)->pluck('fsm')->toArray();
        }
        if (count($send) != 0) {
            $results =  notificationFCM($this->title, $this->body, $send);
        }
    }
    public function render()
    {
        return view('dashboard.notifiction.notifiction');
    }
}
