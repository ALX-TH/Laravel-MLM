<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{

    protected $fillable = [
        'name', 'compound',
    ];

    public function plans(){

        return $this->hasMany('App\Plan');

    }
}
