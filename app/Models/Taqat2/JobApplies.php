<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class JobApplies extends Model
{
    protected $guarded = [];
    protected $table = 'apply_jobs';
    protected $connection = 'second_db';

    use HasFactory;


    // use HasTranslations;

    // public $translatable = ['description'];




    public function job(){
        return $this->belongsTo(Job::class,'job_id');
    }



    public function user(){
        return $this->belongsTo(Talent::class,'user_id');
    }


}
