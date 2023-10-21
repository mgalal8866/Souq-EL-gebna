<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class admin extends Authenticatable
{

    use  HasFactory, Notifiable, HasApiTokens;
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
}
