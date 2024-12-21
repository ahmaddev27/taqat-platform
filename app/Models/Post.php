<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasTranslations;

    use HasFactory;
    protected $guarded=[''];

    public $translatable = ['title','description','slug'];

//    public static function boot()
//    {
//        parent::boot();
//
//        static::creating(function ($post) {
//            $post->slug_ar = Str::slug($post->title_ar);
//            $post->slug_en = Str::slug($post->title_en);
//        });
//    }

    protected $casts = [
        'slug' => 'json',
    ];

    function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
