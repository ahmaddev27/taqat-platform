<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Talent extends Authenticatable
{
    use SoftDeletes;
    protected $connection = 'second_db';

    protected $table = 'users';
    use HasFactory;
    protected $dates = ['deleted_at'];


protected $guarded=[];


//    public function getPhoto(){
//        return $this->photo ? url('https://team.taqat-gaza.com/public/files/' . $this->photo): asset(url('front/place.png'));
//    }
    function work_experiences (){
        return $this->hasMany(WorkExperience::class,'user_id')->orderBy('end_date', 'asc');
    }




    public function getPhoto()
    {
        // Check if the photo is not a valid URL and does not contain 'uploads'
        if (filter_var($this->photo, FILTER_VALIDATE_URL) === false && strpos($this->photo, 'uploads') === false) {
            return url('https://team.taqat-gaza.com/public/files/' . $this->photo);
        }
        return url($this->photo);
    }




    function projects (){
        return $this->hasMany(Project::class,'user_id')->orderBy('created_at', 'desc');
    }


    function offers (){
        return $this->hasMany(Offer::class,'user_id')->orderBy('created_at', 'desc');
    }

    function jobApplies (){
        return $this->hasMany(JobApplies::class,'user_id')->orderBy('created_at', 'desc');
    }


    function scientificCertificate(){
        return $this->hasMany(ScientificCertificate::class,'user_id')->orderBy('graduation_year', 'asc');
    }

    function training_courses (){
        return $this->hasMany(TrainingCourse::class,'user_id');
    }




    public function scopeWhenSearch($query, $search)
    {
        if ($search) {
            $searchPattern = str_replace(
                ['ا', 'أ', 'إ', 'آ'],
                'ا',
                $search
            );

            $searchPattern = preg_replace('/[اأإآ]/u', 'ا', $searchPattern);

            return $query->where(function ($q) use ($searchPattern) {
                $q->whereRaw("REPLACE(REPLACE(REPLACE(REPLACE(name, 'أ', 'ا'), 'إ', 'ا'), 'آ', 'ا'), 'ء', '') LIKE ?", ["%$searchPattern%"])
                    ->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(job, 'أ', 'ا'), 'إ', 'ا'), 'آ', 'ا'), 'ء', '') LIKE ?", ["%$searchPattern%"])
                    ->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(company_name, 'أ', 'ا'), 'إ', 'ا'), 'آ', 'ا'), 'ء', '') LIKE ?", ["%$searchPattern%"])
                    ->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(bio, 'أ', 'ا'), 'إ', 'ا'), 'آ', 'ا'), 'ء', '') LIKE ?", ["%$searchPattern%"]);
            });
        }

        return $query;
    }




// public function scopeWhenJob($query, $search){
//     $translations = $this->getTranslationsForSearch($search);
//
//     return $query->where(function ($q) use ($search, $translations) {
//         $q->where('job_title', 'like', '%' . $search . '%');
//         foreach ($translations as $translation) {
//             $q->orWhere('job_title', 'like', '%' . $translation . '%');
//
//         }
//     });
//    }




    public function scopeWherefullprofile($query)
    {
        return $query->whereNotNull('photo')
            ->withCount('projects')
            ->orderBy('projects_count', 'desc');

//            ->whereNotNull('bio')
//            ->whereNotNull('skills')
//            ->whereNotNull('photo')
//            ->whereHas('projects');
    }


     function specialization(){
        return $this->belongsTo(Specialization::class,'specialization_id');
     }

     public function chats(){
        return $this->hasMany(Chat::class,'user_id')->orderBy('created_at','desc');
     }
     public function khadmats(){
        return $this->hasMany(Khadmat::class,'user_id')->orderBy('created_at','desc');
     }


    public function jobs(){
        return $this->hasMany(Job::class,'user_id');
    }


}
