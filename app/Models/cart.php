<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo(items::class, 'item_id');
    }
}
