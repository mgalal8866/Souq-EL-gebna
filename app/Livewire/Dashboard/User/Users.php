<?php

namespace App\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public  $search;

    public $pg = 30;
    protected $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        if ($this->search == '') {

            $users =    User::orderBy('created_at', 'DESC')->paginate($this->pg);
        } else {
            $users =    User::where('user_name', 'LIKE', "%" . $this->search . "%")
                ->orwhere('phone', 'LIKE', "%" . $this->search . "%")
                ->orwhere('phone1', 'LIKE', "%" . $this->search . "%")
                ->orderBy('date_payment', 'ASC')->paginate($this->pg);
        }

        return view('dashboard.user.users', compact('users'));
    }
}
