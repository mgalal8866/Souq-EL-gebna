<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUrlsplashAttribute()
    {
        return  getimage($this->splash, 'images');
    }
    public function getUrllogoAttribute()
    {
        return  getimage($this->logo, 'images');
    }
}
