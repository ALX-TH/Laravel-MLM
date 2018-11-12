<?php

namespace App\Http\Controllers;

use App\Referral;
use App\ReferralLink;
use App\ReferralRelationship;
use App\Reflink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersReferralController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');

    }

    public function index()
    {
        $user = Auth::user();

        $code= $user->reflink->link;

        $link = url('register') . '?ref=' . $code;

        $reflink = Reflink::where('user_id',$user->id)->first();

        $referrals = Referral::where('reflink_id','=',$reflink->id)->get();


        return view('user.myreferral',compact('referrals','link'));
    }

}
