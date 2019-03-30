<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const ACTIVE = 1;

    const PASSIVE = 0;

    protected $table = 'categories';

    protected $casts = [
        'status' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, "id", "parent")->orderBy('sort');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, "parent", "id")->orderBy('sort');
    }
}
