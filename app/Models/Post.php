<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id', 'image', 'title', 'content'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
