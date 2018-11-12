<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //

    protected $fillable = [
        'title', 'user_id', 'comment','status',
    ];

    public function user(){

        return $this->belongsTo('App\User');


    }

}
