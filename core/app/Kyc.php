<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    //
    protected $dates = ['dob'];
    protected $fillable = [

        'name', 'user_id', 'number','front','back','dob','status',

    ];
    public function user(){

        return $this->belongsTo('App\User');

    }
    public function getFrontAttribute($front){

        return asset($front);

    }
    public function getBackAttribute($back){

        return asset($back);

    }
}
