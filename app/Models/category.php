<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getUrlimgAttribute()
    {
        return  getimage($this->img, 'category');
    }
    public function item()
    {
        return $this->hasMany(items::class, 'category_id');
    }



}
