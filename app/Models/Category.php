<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_en', 'category_ru', 'category_uz', 'slug'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
