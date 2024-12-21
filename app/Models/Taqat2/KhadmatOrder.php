<?php

namespace App\Models\Taqat2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhadmatOrder extends Model
{

    protected $connection = 'second_db';

    protected $table = 'khadmat_orders';

    protected $guarded=[];
    use HasFactory;


        public function buyer()
        {
            return $this->hasMany(Talent::class,'buyer_id');
        }

        public function Khadmat()
        {
            return $this->belongsTo(Khadmat::class,'khdma_id');
        }


        public function seller()
        {
            return $this->hasMany(Talent::class,'seller_id');
        }



}
