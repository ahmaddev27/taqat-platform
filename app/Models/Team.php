<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Team extends Model
{
  protected $guarded=[];
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name','job'];

}

