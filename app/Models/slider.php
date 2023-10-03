<?php

namespace App\Models;

use App\Models\city;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class slider extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUrlimgAttribute()
    {
        return  getimage($this->img, 'slider');
    }
    public function city()
    {
        return $this->belongsTo(city::class, 'city_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'store_id');
    }

}
