<?php

namespace App\Livewire\Dashboard\Order;

use App\Models\OrderDetails;
use Livewire\Component;

class Invodetails extends Component
{
    public $order;
    public function mount($id)
    {
        $this->order = OrderDetails::where('sub_order_id', $id)->get();
    }
    public function render()
    {
        return view('dashboard.order.invodetails');
    }
}
