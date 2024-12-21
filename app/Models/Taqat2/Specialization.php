<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialization extends Model
{
    use HasTranslations;

    public $translatable = ['title_en'];


    protected $connection = 'second_db';

    protected $table='specializations';
    use HasFactory;

     function talents(){
        return $this->hasMany(Talent::class);
    }

    function company_projects(){
        return $this->hasMany(CompanyProject::class);
    }


    public function projects(){
        return $this->hasMany(SpecializationCompanyProject::class,'specialization_id');
    }


    public function jobs(){
        return $this->hasMany(Job::class,'specialization_id');
    }
}
