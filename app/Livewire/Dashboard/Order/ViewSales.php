<?php

namespace App\Livewire\Dashboard\Order;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;

class ViewSales extends Component
{
    public $orders, $fromdate, $todate;
    public function mount()
    {
        $this->fromdate     = Carbon::now()->startOfMonth()->format('Y/m/d');
        $this->todate       = Carbon::now()->endOfMonth()->format('Y/m/d');

    }
    public function render()
    {
        $this->orders       = User::when('suborder', function ($q) {
            $q->whereBetween('created_at', [$this->fromdate, $this->todate]);
        })->with('suborder')->get();
        return view('dashboard.order.view-sales');
    }
}
