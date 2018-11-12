<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptc extends Model
{
    //
    protected $fillable = [
        'title', 'details', 'ad_link','rewards','duration','membership_id','status'
    ];

    public function membership(){

        return $this->belongsTo('App\Membership');

    }
    public function adverts(){

        return $this->hasMany('App\Advert');

    }

}
