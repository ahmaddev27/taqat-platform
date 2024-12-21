<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    use HasTranslations;

    protected $guarded=[];

    function section(){
        return $this->belongsTo(Section::class,'section_id');
    }

    public $translatable = ['question','answer'];
    use HasFactory;
}
