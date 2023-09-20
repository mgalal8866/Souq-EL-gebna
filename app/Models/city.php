<?php

namespace App\Models;

use App\Models\User;
use App\Models\region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class city extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    Public function getNameAttribute()
    {
        $city_name = 'city_name_ar';
        return $this->$city_name;
    }


    public function region()
    {
        return $this->hasMany(region::class,'city_id');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
