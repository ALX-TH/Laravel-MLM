<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected  $fillable =[
        'user_id',
        'ppv_id',
        'date',
        'status'
    ];

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function ppv(){

        return $this->belongsTo('App\Ppv');

    }
}
