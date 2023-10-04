<?php

namespace App\Models\Cart;

use App\Models\items;
use App\Models\Cart\CartSub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo(items::class, 'item_id');
    }
    public function cartsub()
    {
        return $this->belongsTo(CartSub::class, 'cart_sub_id');
    }
}
