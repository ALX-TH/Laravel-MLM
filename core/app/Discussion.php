<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //

    protected $fillable = [
        'user_id', 'support_id', 'message','type',
    ];

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function support(){

        return $this->belongsTo('App\Support');

    }


}
