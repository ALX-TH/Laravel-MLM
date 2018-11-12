<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kyc2 extends Model
{
    //
    protected $fillable = [

        'name', 'user_id', 'photo','status',

    ];

    public function user(){

        return $this->belongsTo('App\User');

    }
    public function getPhotoAttribute($photo){

        return asset($photo);

    }
}
