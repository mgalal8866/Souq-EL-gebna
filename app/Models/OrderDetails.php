<?php

namespace App\Models;

use App\Models\items;
use App\Models\SubOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(SubOrder::class, 'order_id');
    }
    public function item()
    {
        return $this->belongsTo(items::class, 'item_id');
    }
}
