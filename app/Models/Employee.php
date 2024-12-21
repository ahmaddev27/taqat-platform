<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    protected $guarded=[];
    use HasApiTokens, HasFactory,Notifiable;

    function tasks(){
        return $this->hasMany(Task::class,'employer_id');
    }


    public function routeNotificationForFcm($notification = null,)
    {
        return $this->fcm;
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

   public function newTasks(){
          return $this->hasMany(Task::class,'employer_id')->where('approve',0);
      }



}
