<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable =
        [
            "category_id",
            "image",
            "description",
            "image",
            "developer",
            "publisher",
            "genre",
            "release_date",
            "slug",
            "seo_keywords",
            'seo_description',
            'seo_title',
            'details',
            'status'
        ];

    public function category()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }

}
