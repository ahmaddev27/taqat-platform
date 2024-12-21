<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded=[];
    use HasFactory;

    function employee(){
        return $this->belongsTo(Employee::class,'employer_id');
    }

    function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
