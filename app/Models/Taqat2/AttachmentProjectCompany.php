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
}
