<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title_en', 'title_ru', 'title_uz', 'body_en', 'body_ru', 'body_uz', 'image', 'category_id', 'slug', 'views', 'ads'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag',  'post_id', 'tag_id');
    }


    public static function boot()
    {
        parent::boot();

        // Добавляем обработчик события "deleting"
        static::deleting(function ($post) {
            $post->tags()->detach();
        });
    }
}
