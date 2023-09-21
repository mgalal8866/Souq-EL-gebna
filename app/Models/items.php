<?php

namespace App\Models;

use App\Models\brand;
use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class items extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id');
    }
}
