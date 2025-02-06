<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhadmatReviwe extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $connection = 'second_db';


    public function user()
    {
        return $this->belongsTo(Talent::class, 'user_id');
    }
}

