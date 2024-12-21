<?php

namespace App\Models\Taqat2;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Offer extends Model
{
    protected $connection = 'second_db';

    protected $table='offers';

    protected $guarded=[];

    use HasFactory;

//    use HasTranslations;
//
//    public $translatable = ['description'];


    public function project(){
        return $this->belongsTo(CompanyProject::class,'project_id');
    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function user(){
        return $this->belongsTo(Talent::class,'user_id');
    }


}
