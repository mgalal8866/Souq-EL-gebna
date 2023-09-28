<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function suborder()
    {
        return $this->hasMany(SubOrder::class, 'main_order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
