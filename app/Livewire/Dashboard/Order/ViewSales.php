<?php

namespace App\Livewire\Dashboard\Order;

use Livewire\Component;

class ViewSales extends Component
{
    public $orders;
    public function mount()
    {
$this->orders;
    }
    public function render()
    {

        return view('dashboard.order.view-sales');
    }
}
