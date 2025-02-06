<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $connection = 'second_db';

    use HasFactory;

    protected $guarded=[];


    public function getPhoto()
    {
        if (filter_var($this->photo, FILTER_VALIDATE_URL) === false && strpos($this->photo, 'uploads') === false) {
            return url('https://team.taqat-gaza.com/public/files/' . $this->photo);
        }
        return url($this->photo);
    }

    public function getFileType()
    {
        $extension = pathinfo($this->photo, PATHINFO_EXTENSION);
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'pdf';
    }
}
