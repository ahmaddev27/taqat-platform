<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $connection = 'second_db';

    protected $table='chats';
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(Talent::class, 'user_id');
    }

}
