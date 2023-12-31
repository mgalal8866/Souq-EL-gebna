<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\city;
use App\Models\region;
use App\Models\comments;
use App\Models\SubOrder;

use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use  HasFactory, Notifiable,HasApiTokens;
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'phone_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function city()
    {
        return $this->belongsTo(city::class,'city_id');
    }
    public function activity()
    {
        return $this->belongsTo(activity::class,'activity_id');
    }
    public function item()
    {
        return $this->hasMany(items::class,'user_id');
    }
    public function region()
    {
        return $this->belongsTo(region::class,'region_id');
    }
    public function question1()
    {
        return $this->belongsTo(question::class,'question1_id');
    }
    public function question2()
    {
        return $this->belongsTo(question::class,'question2_id');
    }
    public function suborder()
    {
        return $this->hasMany(SubOrder::class, 'store_id');
    }
    public function scopeActive($q)
    {
        return $q->where('active', '1');
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getUrllogoAttribute()
    {
        return  getimage($this->logo,'store');
    }
    public function getUrlimg1Attribute()
    {
        return  getimage($this->img1,'store');
    }
    public function getUrlimg2Attribute()
    {
        return  getimage($this->img2,'store');
    }
    public function comments()
    {
        return $this->morphMany(comments::class,'commentable');
    }
}
