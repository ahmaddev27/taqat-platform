<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class CompanyProject extends Model
{
    use HasTranslations;


    protected $table = 'company_projects';

    protected $connection = 'second_db';
    use SoftDeletes;
    use HasFactory;

    public $translatable = ['description','received_required','title','slug'];


    protected $guarded=[];
    protected $casts = [
        'skills' => 'array',
    ];



    function company()
    {
        return $this->belongsTo(Company::class);
    }

    function user()
    {
        return $this->belongsTo(Talent::class);
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
                $q->WhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(title, 'أ', 'ا'), 'إ', 'ا'), 'آ', 'ا'), 'ء', '') LIKE ?", ["%$searchPattern%"])
                    ->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(description, 'أ', 'ا'), 'إ', 'ا'), 'آ', 'ا'), 'ء', '') LIKE ?", ["%$searchPattern%"]);
            });
        }

        return $query;
    }

    public function specializations()
    {
        return $this->hasMany(SpecializationCompanyProject::class, 'project_company_id', 'id');
    }


    public function offers()
    {
        return $this->hasMany(Offer::class, 'project_id');
    }


    public function attachments()
    {
        return $this->hasMany(AttachmentProjectCompany::class, 'project_company_id');
    }




    public function getAverageCostAttribute()
    {
        $offers = $this->offers; // Assuming $offers is already a collection
        $costs = $offers->pluck('cost')->toArray();
        return count($costs) > 0 ? array_sum($costs) / count($costs) : 0;
    }




}

