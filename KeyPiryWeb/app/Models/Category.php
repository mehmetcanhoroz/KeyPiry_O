<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ["title", "image", "parent", "sort", "seo_keywords", 'seo_description', 'seo_title', 'details', 'status'];

    public function parent()
    {
        return $this->belongsTo(Category::class, "id", "parent");
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, "parent", "id");
    }
}
