<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUrlimgAttribute()
    {
        return  getimage($this->img, 'slider');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
