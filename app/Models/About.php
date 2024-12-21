<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    protected $guarded=[];
    use HasTranslations;

    use HasFactory;

    public $translatable = ['title','description'];
}
