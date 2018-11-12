<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    //

    protected  $fillable =[

        'user_id',
        'ptc_id',
        'date',
        'status'





    ];
    public function user(){

        return $this->belongsTo('App\User');


    }

    public function ptc(){

        return $this->belongsTo('App\Ptc');


    }
}
