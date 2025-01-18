<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentProjectCompany extends Model
{
    protected $table='attachment_project_companies';
    use HasFactory;



    public function getAtt(){
        return $this->attachment ? url('https://team.taqat-gaza.com/public/files/' . $this->attachment): asset(url('front/place.png'));
    }

    public function getFile()
    {
        if (filter_var($this->attachment, FILTER_VALIDATE_URL) === false) {
            return url('https://team.taqat-gaza.com/public/files/' . $this->attachment);
        }
        return $this->attachment;
    }


    public function getFileType()
    {
        $extension = pathinfo($this->attachment, PATHINFO_EXTENSION);
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'pdf';
    }



}
