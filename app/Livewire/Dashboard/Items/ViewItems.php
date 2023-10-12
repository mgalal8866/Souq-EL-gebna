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
    public $search, $items1;

    // public function mount()
    // {
    //     $this->items1 =  items::latest()->paginate(20);
    // }
    // public function updatedSearch()
    // {
    //     $this->items1 =    items::where('name', 'LIKE', "%" . $this->search . "%")->latest()->paginate(20);
    // }
    public function render()
    {
        $search = normalize_name($this->search);
        $items =  items::where('name', 'LIKE', "%" . $search  . "%")->latest()->paginate(20);
        return view('dashboard.items.view-items', compact('items'));
    }
}
