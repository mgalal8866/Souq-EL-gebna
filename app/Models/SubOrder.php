<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class, 'sub_order_id');
    }
    public function store()
    {
        return $this->belongsTo(User::class, 'store_id');
    }
}
