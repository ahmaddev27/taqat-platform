<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Khadmat extends Model
{
    use HasTranslations;

    protected $connection = 'second_db';

    protected $guarded=[];
    protected $table = 'khadmats';


    public $translatable = ['title', 'description', 'slug'];

    use HasFactory;

    function user()
    {
        return $this->belongsTo(Talent::class, 'user_id');
    }


    public function getPhoto()
    {
        if (filter_var($this->image, FILTER_VALIDATE_URL) === false) {
            return url('https://team.taqat-gaza.com/public/files/' . $this->image);
        }
        return $this->image;
    }



    public function category()
    {
        return $this->belongsTo(KhadmaCategory::class, 'category_id'); // Define the relationship
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
                $q->whereRaw("REPLACE(REPLACE(REPLACE(REPLACE(title, 'أ', 'ا'), 'إ', 'ا'), 'آ', 'ا'), 'ء', '') LIKE ?", ["%$searchPattern%"])
                    ->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(description, 'أ', 'ا'), 'إ', 'ا'), 'آ', 'ا'), 'ء', '') LIKE ?", ["%$searchPattern%"])
                    ->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(slug, 'أ', 'ا'), 'إ', 'ا'), 'آ', 'ا'), 'ء', '') LIKE ?", ["%$searchPattern%"]);

            });
        }

        return $query;
    }

    public function reviews()
    {
        return $this->hasMany(KhadmatReviwe::class);
    }

    public function averageReview()
    {
        $total = $this->reviews()->sum('review');
        $count = $this->reviews()->count();

        if ($count > 0) {
            $average = $total / $count;
            return number_format(min($average, 5), 1); // Ensure max value is 5
        }

        return number_format(0, 1);
    }


    public function orders()
    {
        return $this->hasMany(KhadmatOrder::class);
    }

}
