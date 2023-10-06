<?php

namespace App\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users;
    public function render()
    {
            $this->users=    User::get();
        return view('dashboard.user.users');
    }
}
