<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
}
