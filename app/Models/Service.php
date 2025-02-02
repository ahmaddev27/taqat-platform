<?php

namespace App\Models;

use App\Models\Taqat2\KhadmaCategory;
use App\Models\Taqat2\KhadmatOrder;
use App\Models\Taqat2\Talent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded=[];

    public $translatable = ['title','description','details','slug'];

    public function orders()
    {
        return $this->hasMany(KhadmatOrder::class,'khadmat_id');
    }

    public function user()
    {
        return $this->belongsTo(Talent::class,'user_id');
    }

    public function category()
    {
        return $this->belongsTo(KhadmaCategory::class,'category_id');
    }


}
