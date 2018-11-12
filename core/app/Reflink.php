<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reflink extends Model
{
    //
    protected $fillable = [
        'user_id','link',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }


    public function referrals(){
        return $this->hasMany('App\Referral');
    }

}
