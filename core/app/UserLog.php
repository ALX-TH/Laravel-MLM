<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{

    protected $fillable = [
        'user_id', 'reference', 'for','from','details','amount',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
