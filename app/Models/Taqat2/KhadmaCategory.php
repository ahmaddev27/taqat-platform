<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class KhadmaCategory extends Model
{
    use HasFactory;
   use HasTranslations;

    protected $connection = 'second_db';

    public $translatable = ['name'];


    public function getPhoto()
    {
        return asset(url('front/s.png'));
    }


    public function khadmats()
    {
        return $this->hasMany(Khadmat::class, 'category_id'); // Define the relationship
    }

}
