<?php

namespace App\Listeners;

use App\Events\UserReferred;
use App\Referral;
use App\Reflink;
use App\Settings;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RewardUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserReferred  $event
     * @return void
     */
    public function handle(UserReferred $event)
    {
        //
        $referral = Reflink::find($event->referralId);
        if (!is_null($referral)) {
            Referral::create(['reflink_id' => $referral->id, 'user_id' => $event->user->id]);


            $bonus= Settings::first();
            $prewards= $bonus->link_share;
            $urewards= $bonus->referral_signup;

            // User who was sharing link
            $provider = $referral->user->profile;
            $provider->referral_balance = $provider->referral_balance + $prewards;
            $provider->save();

            // User who used the link
            $user = $event->user->profile;
            $user->referral_balance = $user->referral_balance + $urewards;
            $user->save();

        }
    }
}
