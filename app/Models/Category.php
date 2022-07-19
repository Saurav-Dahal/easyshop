<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category_name',
        'category_slug',
        'category_icon',
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function subsubcategories()
    {
        return $this->hasManyThrough(SubSubCategory::class, SubCategory::class);
    }
}
