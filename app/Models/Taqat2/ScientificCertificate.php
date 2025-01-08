<?php

namespace App\Models\Taqat2;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ScientificCertificate extends Model
{
    protected $connection = 'second_db';

    use HasFactory;

    protected $guarded = [];


    use HasTranslations;


    public $translatable = ['title', 'country', 'specialization', 'university', 'college'];

    public function getPhoto()
    {
        if (filter_var($this->photo, FILTER_VALIDATE_URL) === false) {
            return url('https://team.taqat-gaza.com/public/files/' . $this->photo);
        }
        return $this->photo;
    }

    public function getFileType()
    {
        $extension = pathinfo($this->photo, PATHINFO_EXTENSION);
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'pdf';
    }
}
