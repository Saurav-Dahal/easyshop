<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MultiImage;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(MultiImage::class);
    }
    
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
