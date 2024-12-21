<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    protected $guarded=[];
    use HasFactory;
    use HasTranslations;

    public $translatable = ['text','name','job'];
}
