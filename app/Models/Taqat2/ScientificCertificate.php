<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ScientificCertificate extends Model
{
    protected $connection = 'second_db';

    use HasFactory;
    protected $guarded=[];


    use HasTranslations;


    public $translatable = ['title','country','university','college','specialization'];

    public function getPhoto(){
        return url('https://team.taqat-gaza.com/public/files/'.$this->photo);
    }

    public function getFileType()
    {
        $extension = pathinfo($this->photo, PATHINFO_EXTENSION);
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'pdf';
    }
}
