<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterestLog extends Model
{
    //
    protected $fillable = [

        'invest_id', 'user_id', 'reference_id','amount',

    ];
    public function user(){

        return $this->belongsTo('App\User');

    }
    public function invest(){

        return $this->belongsTo('App\Invest');

    }
}
