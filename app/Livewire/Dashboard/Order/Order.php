<?php

namespace App\Livewire\Dashboard\Order;

use Livewire\Component;
use App\Models\SubOrder;
use Livewire\WithPagination;

class Order extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $sorder = SubOrder::with(['store','main','main.user'])->latest()->paginate(30);
        return view('dashboard.order.order' ,compact('sorder'));
    }
}
