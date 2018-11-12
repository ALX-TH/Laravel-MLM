<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    //
    protected $fillable = [
        'user_id', 'subject', 'message','ticket','status',
    ];


    public function user(){

        return $this->belongsTo('App\User');

    }

    public function discussions(){

        return $this->hasMany('App\Discussion');

    }


}
