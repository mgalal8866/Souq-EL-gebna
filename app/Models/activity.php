<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->hasMany(User::class, 'activity_id');
    }
}
