<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Job extends Model
{
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'company_jobs';
    protected $connection = 'second_db';

    protected $guarded = [];
    protected $casts = [
        'skills' => 'array',
    ];


    public $translatable = ['description','job_requirements','title','slug'];



    use HasFactory;


    public function applies()
    {
        return $this->hasMany(JobApplies::class);
    }

    function company()
    {
        return $this->belongsTo(Company::class);
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

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}
