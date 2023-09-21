<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function item()
    {
        return $this->hasMany(items::class, 'brand_id');
    }
}

