<?php

namespace App\Models;

use App\Models\User;
use App\Models\brand;
use App\Models\Cart\CartItem;
use App\Models\category;
use App\Models\comments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class items extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function cart()
    {
        return $this->hasOne(CartItem::class, 'item_id');
    }
    public function getUrlimgAttribute()
    {
        return  getimage($this->img, 'brand');
    }
    public function comments()
    {
        return $this->morphMany(comments::class,'commentable');
    }
    public function scopeActive($q)
    {
        return $q->where('active','1');
    }
    public function scopeActive_admin($q)
    {
        return $q->where('active_admin','1');
    }
    public function scopeInmycart($q)
    {
        return $q->with('cart', function ($q)  {
            $q->where('user_id', auth('api')->user()->id);
        });
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = normalize_name($value);
    }
}
