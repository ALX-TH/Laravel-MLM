<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{

    protected $dates = ['start_time'];

    protected $fillable = [

        'plan_id', 'user_id', 'reference_id','amount','start_time','status',

    ];
    public function user(){

        return $this->belongsTo('App\User');

    }

    public function plan(){

        return $this->belongsTo('App\Plan');

    }
    public function interests(){

        return $this->hasMany('App\Interest');


    }
    public function interestlogs(){

        return $this->hasMany('App\InterestLog');

    }

}
