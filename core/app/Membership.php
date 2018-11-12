<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    //

    protected $fillable = [
        'name', 'details', 'ad_limit','price','duration',
    ];
    public function users(){


        return $this->hasMany('App\User');


    }
    public function ptcs(){


        return $this->hasMany('App\Ptc');


    }
    public function ppvs(){


        return $this->hasMany('App\Ppv');


    }

}
