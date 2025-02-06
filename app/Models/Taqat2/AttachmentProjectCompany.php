<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentProjectCompany extends Model
{
    protected $table='attachment_project_companies';
    protected $connection = 'second_db';

    use HasFactory;

    protected $guarded=[];



    public function getFile()
    {
        // Check if the photo is not a valid URL and does not contain 'uploads'
        if (filter_var($this->attachment, FILTER_VALIDATE_URL) === false && strpos($this->attachment, 'uploads') === false) {
            return url('https://team.taqat-gaza.com/public/files/' . $this->attachment);
        }
        return url($this->attachment);
    }



    public function getFileType()
    {
        $extension = pathinfo($this->attachment, PATHINFO_EXTENSION);
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'pdf';
    }



}
