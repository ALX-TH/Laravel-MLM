<?php

namespace App;

use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin','active','membership_id','membership_started','membership_expired','token','d_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function profile(){

        return $this->hasOne('App\Profile');


    }

    public function testimonial(){

        return $this->hasOne('App\Testimonial');


    }
    public function membership(){

        return $this->belongsTo('App\Membership');


    }
    public function deposits(){

        return $this->hasMany('App\Deposit');


    }

    public function supports(){

        return $this->hasMany('App\Support');


    }
    public function discussions(){

        return $this->hasMany('App\Discussion');


    }

    public function withdraws(){

        return $this->hasMany('App\Withdraw');


    }
    public function invests(){

        return $this->hasMany('App\Invest');


    }

    public function reflink(){

        return $this->hasOne('App\Reflink');

    }
    public function kycs(){

        return $this->hasMany('App\Kyc');


    }
    public function interests(){

        return $this->hasMany('App\Interest');

    }
    public function interestlogs(){

        return $this->hasMany('App\InterestLog');

    }
    public function kyc2s(){

        return $this->hasMany('App\Kyc2');


    }
    public function userlogs(){

        return $this->hasMany('App\UserLog');


    }
    public function verified(){

        return $this->active === 1;

    }

    public function sendVerificationEmail()
    {
        return $this->notify(new VerifyEmail($this));

    }
    public function scopeSearch($query, $s)
    {
        return $query->where('email', 'like', '%'.$s.'%')
            ->orWhere('name', 'like', '%'.$s.'%');
    }

}
