<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = [
        'style_id', 'name','minimum','maximum','percentage','repeat','status', 'availability_reinvestment', 'start_duration',
    ];

    public function invests(){

        return $this->hasMany('App\Invest');

    }

    public function style(){

        return $this->belongsTo('App\Style');

    }
}
