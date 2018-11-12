<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    protected $fillable = [
        'site_name', 'site_title', 'company_name', 'contact_email', 'contact_number','app_contact','address',
        'ptc', 'ppv', 'payment_proof', 'latest_deposit','minimum_deposit','minimum_withdraw','transfer',
        'self_transfer','other_transfer','live_chat','chat_code','signup_bonus','link_share','referral_signup',
        'referral_deposit','referral_advert','referral_upgrade','membership_upgrade','invest',
    ];

}
