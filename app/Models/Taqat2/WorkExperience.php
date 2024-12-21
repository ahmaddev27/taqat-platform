<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WorkExperience extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $connection = 'second_db';

    public function getPhoto(){
        return url('https://team.taqat-gaza.com/public/files/'.$this->photo);
    }


    use HasTranslations;

    public $translatable = ['company_name','location','job','tasks'];


    public function getFileType()
    {
        $extension = pathinfo($this->photo, PATHINFO_EXTENSION);
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'pdf';
    }

}

