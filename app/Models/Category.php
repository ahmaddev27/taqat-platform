<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{

    use HasFactory;
    use HasTranslations;
    protected $guarded=[];

    public $translatable = ['title','slug'];

    function posts(){
        return $this->hasMany(Post::class,'category_id');

    }
}
