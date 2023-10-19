<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class admin extends Model
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
