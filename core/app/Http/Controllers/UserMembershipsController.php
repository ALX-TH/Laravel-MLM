<?php

namespace App\Http\Controllers;

use App\Membership;
use App\Referral;
use App\Settings;
use App\UserLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserMembershipsController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');


    }

    public function index(){



        $user = Auth::user();

        $memberships = Membership::all();

        return view('user.upgrade.index',compact('memberships','user'));
    }

    public function upgrade($id){

        $user = Auth::user();

        $membership = Membership::find($id);

        $balance = $user->profile->deposit_balance;

        if ($membership->price > $balance){

            session()->flash('message', "You don't have sufficient balance. Please deposit money first or earn money");
            Session::flash('type', 'error');
            Session::flash('title', 'Insufficient Balance');

            return redirect()->back();
        }

        $user->profile->deposit_balance = $user->profile->deposit_balance - $membership->price;

        $user->profile->save();

        $user->membership_id = $membership->id;

        $user->membership_started = Carbon::today();

        $today = Carbon::today();

        $user->membership_expired = $today->addDays($membership->duration);

        $user->save();

        $upliner = Referral::whereUser_id($user->id)->count();

        if ($upliner == 1){

            $settings = Settings::first();

            $referral = Referral::whereUser_id($user->id)->first();

            $upliner = $referral->reflink->user->profile;

            $percentage = $settings->referral_upgrade;

            $commission = (($percentage / 100) * $membership->price);

            $upliner->referral_balance = $upliner->referral_balance + $commission;

            $upliner->save();

            $log = UserLog::create([

                'user_id' => $referral->reflink->user->id,
                'reference' => str_random(12),
                'for' => 'Referral',
                'from' => $user->name,
                'details'=>'You Have Been Received Referral Bonus for Membership Upgrade',
                'amount'=>$commission,

            ]);

        }

        session()->flash('message', 'You have Successfully Upgraded to '.$membership->name.' Membership Plan.');
        Session::flash('type', 'success');
        Session::flash('title', 'Upgraded Successful');

        return redirect()->back();

    }

}
