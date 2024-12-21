<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $connection = 'second_db';

    protected $table = 'tags';

}
