<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUrlimgAttribute()
    {
        return  getimage($this->img, 'activity');
    }
    public function user()
    {
        return $this->hasMany(user::class, 'activity_id');
    }
}
