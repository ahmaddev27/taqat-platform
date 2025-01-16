<?php

namespace App\Models\Taqat2;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    protected $connection = 'second_db';

    use HasFactory;

    protected $guarded=[];

    use SoftDeletes;



    public function getFileType()
    {
        $extension = pathinfo($this->photo, PATHINFO_EXTENSION);
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'pdf';
    }

    public function users(){
        return $this->hasOne(Talent::class,'company_id','id');
    }

    public function getPhoto()
    {
        if (filter_var($this->photo, FILTER_VALIDATE_URL) === false) {
            return url('https://team.taqat-gaza.com/public/files/' . $this->photo);
        }
        return $this->photo;
    }

    public function projects(){
        return $this->hasMany(CompanyProject::class);
    }

    public function jobs(){
        return $this->hasMany(Job::class);
    }
    public function Impprojects(){
        return $this->hasMany(CompanyProject::class)->where('status',2);
    }
    public function completeProjects(){
        return $this->hasMany(CompanyProject::class)->where('status',3);
    }

    public function Impjobs(){
        return $this->hasMany(Job::class)->where('status',2);
    }
    public function completejobs(){
        return $this->hasMany(Job::class)->where('status',3);
    }





}
