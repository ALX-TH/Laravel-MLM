<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppv extends Model
{
    //

    protected $fillable = [
        'title', 'details', 'ad_link','rewards','duration','membership_id','status'
    ];

    public function membership(){

        return $this->belongsTo('App\Membership');

    }
    public function videos(){

        return $this->hasMany('App\Video');

    }

}
