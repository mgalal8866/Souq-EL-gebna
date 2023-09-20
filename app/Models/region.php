<?php

namespace App\Models;

use App\Models\city;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class region extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;
    Public function getNameAttribute()
    {
        $region_name = 'region_name_ar';
        return $this->$region_name;
    }
    public function city()
    {
        return $this->belongsTo(city::class);
    }
    public function user()
    {
        return $this->hasMany(User::class,'region_id');
    }

    public function scopeMain($query,$id){

        return region::whereId($id)->select('main','city_id')->first();
    }
}
