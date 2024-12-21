<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecializationCompanyProject extends Model
{
    protected $connection = 'second_db';

    protected $table='specialization_company_project';

    use HasFactory;

    public function specialization (){
        return $this->belongsTo(Specialization::class,'specialization_id');
    }


}
