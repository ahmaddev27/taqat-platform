<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Relay\Relay;

class Inbox extends Model
{

    protected $guarded=[];
    use HasFactory;

    function relies(){
        return $this->hasMany(Reply::class);
    }
}
