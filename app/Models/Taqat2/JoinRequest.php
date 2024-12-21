<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinRequest extends Model
{
    protected $connection = 'second_db';
    protected $table = 'users';
    protected $guarded=[];
    use HasFactory;
}
