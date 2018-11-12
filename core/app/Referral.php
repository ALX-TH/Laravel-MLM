<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    //
    protected $fillable = [
        'user_id','reflink_id',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function reflink(){
        return $this->belongsTo('App\Reflink');
    }

}
