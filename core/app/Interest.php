<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    //
    protected $dates = ['start_time','made_time'];

    protected $fillable = [

        'invest_id', 'user_id', 'reference_id','made_time','total_repeat','status','start_time',

    ];
    public function user(){

        return $this->belongsTo('App\User');

    }

    public function invest(){

        return $this->belongsTo('App\Invest');

    }
}
