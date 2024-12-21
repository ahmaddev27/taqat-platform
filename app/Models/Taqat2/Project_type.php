<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project_type extends Model
{



    use HasTranslations;

    public $translatable = ['title'];

    protected $connection = 'second_db';
    use HasFactory;
}
