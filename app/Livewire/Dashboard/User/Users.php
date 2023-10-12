<?php

namespace App\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users=[], $search;
    public function updatedSearch()
    {

        $this->users =    User::where('user_name', 'LIKE', "%" . $this->search . "%")
            ->orwhere('phone', 'LIKE', "%" . $this->search . "%")
            ->orwhere('phone1', 'LIKE', "%" . $this->search . "%")
            ->orderBy('date_payment', 'ASC')->get();
    }
    public function mount()
    {
        $this->users =    User::orderBy('date_payment', 'ASC')->get();

    }
    public function render()
    {

        return view('dashboard.user.users');
    }
}
