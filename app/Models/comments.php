<?php

namespace App\Models;

use App\Models\User;
use App\Models\items;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comments extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function item()
    {
        return $this->belongsTo(items::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
