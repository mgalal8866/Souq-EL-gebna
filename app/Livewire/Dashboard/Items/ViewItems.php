<?php

namespace App\Livewire\Dashboard\Items;

use App\Models\items;
use Livewire\Component;
use Livewire\WithPagination;

class ViewItems extends Component
{
    use WithPagination;
    protected $listeners = ['view-product' => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    public $search;
    
    public function render()
    {
        $items =  items::latest()->paginate(20);;
        return view('dashboard.items.view-items',compact('items'));
    }

}
