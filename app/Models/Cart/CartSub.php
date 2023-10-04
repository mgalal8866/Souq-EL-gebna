<?php

namespace App\Models\Cart;

use App\Models\User;
use App\Models\Cart\CartItem;
use App\Models\Cart\CartMain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartSub extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function cartitem()
    {
        return $this->hasMany(CartItem::class, 'cart_sub_id');
    }
    public function store()
    {
        return $this->belongsTo(User::class, 'store_id');
    }
    public function cartmain()
    {
        return $this->belongsTo(CartMain::class, 'cart_main_id');
    }
}
