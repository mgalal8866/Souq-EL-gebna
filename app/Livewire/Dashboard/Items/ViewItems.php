<?php

namespace App\Livewire\Dashboard\Items;

use App\Models\items;
use Livewire\Component;

class ViewItems extends Component
{
    public $items;
    public function render()
    {
       $this->items=  items::get();
        return view('dashboard.items.view-items');
    }
}
