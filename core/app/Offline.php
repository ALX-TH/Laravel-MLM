<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offline extends Model
{
    protected $table = 'offlines';

    protected $fillable = [
        'name',
        'image',
        'account',
        'fixed',
        'percent',
        'val1',
        'val2',
        'ex_percent',
        'status',
        'details',
    ];

    /**
     * @param $image
     * @return string
     */
    public function getFeaturedAttribute($image){
        return asset($image);
    }

}
