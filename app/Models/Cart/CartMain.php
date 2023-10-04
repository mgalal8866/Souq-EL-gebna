<?php

namespace App\Models\Cart;

use App\Models\User;
use App\Models\Cart\CartSub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartMain extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function cartsub()
    {
        return $this->hasMany(CartSub::class, 'cart_main_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
