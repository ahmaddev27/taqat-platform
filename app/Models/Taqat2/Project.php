<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{

    protected $connection = 'second_db';

    protected $table = 'projects';
    use HasFactory;

    protected $guarded=[];


    use HasTranslations;


    public $translatable = ['title','description'];


    public function getPhoto()
    {
        if (filter_var($this->photo, FILTER_VALIDATE_URL) === false) {
            return url('https://team.taqat-gaza.com/public/files/' . $this->photo);
        }
        return $this->photo;
    }

    public function images(){
        return $this->hasMany(ProjectImage::class,'project_id','id');
    }


    public function project_type_relation(){
        return $this->belongsTo(Project_type::class,'project_type','id');

    }

}
