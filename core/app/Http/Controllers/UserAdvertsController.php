<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Ppv;
use App\Ptc;
use App\Referral;
use App\ReferralRelationship;
use App\Settings;
use App\UserLog;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAdvertsController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');

    }


    public function cashLinks()
    {

        $user = Auth::user();
        $settings = Settings::first();

        $ad_limit = $user->membership->ad_limit;

        $membership = $user->membership->id;

        $ad = Advert::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->count();

        if ($ad == 0)
        {
            $ptcse = Ptc::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->count();

            if ($ptcse == 0){

                session()->flash('message', 'Sorry To Say You That Currently there is no Cash Links for you. Please wait or upgrade your membership, ');
                Session::flash('type', 'error');
                Session::flash('title', 'Error');

                return redirect()->route('userMemberships');

            }
            else {

                $ptcs = Ptc::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->get();

                foreach ($ptcs as $ptc)
                {
                    $info =([

                        'user_id'=> $user->id,
                        'date'=> date('Y-m-d'),
                        'ptc_id'=> $ptc->id,

                    ]);

                    Advert::create($info);
                }

                $adverts = Advert::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(10);

                return view('user.viewads.index',compact('adverts','settings'));

            }

        }else{

            $adverts = Advert::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(10);
            return view('user.viewads.index',compact('adverts','settings'));
        }

    }

    public function cashLinkConfirm($id)
    {
        $user = Auth::user();

        $advert= Advert::findOrFail($id);
        $advert->status = 1;
        $advert->save();

        $rewards = $advert->ptc->rewards;

        $profile = $user->profile;

        $profile->main_balance = $profile->main_balance + $rewards;

        $profile->save();

        $log = UserLog::create([

            'user_id' => $user->id,
            'reference' => str_random(12),
            'for' => 'Cash Links',
            'from' => 'Self',
            'details'=>'You Have Been Received Rewards for Cash Links View',
            'amount'=>$rewards,

        ]);


        $upliner = Referral::whereUser_id($user->id)->count();

        if ($upliner == 1){

            $settings = Settings::first();

            $referral = Referral::whereUser_id($user->id)->first();

            $upliner = $referral->reflink->user->profile;

            $percentage = $settings->referral_advert;

            $commission = (($percentage / 100) * $rewards);

            $upliner->referral_balance = $upliner->referral_balance + $commission;

            $upliner->save();


            $log = UserLog::create([

                'user_id' => $referral->reflink->user->id,
                'reference' => str_random(12),
                'for' => 'Referral',
                'from' => $user->name,
                'details'=>'You Have Been Received Referral Bonus for Cash Links View',
                'amount'=>$commission,

            ]);


        }




        session()->flash('message', 'This Ads Has Been Successfully Viewed.');
        Session::flash('type', 'success');
        Session::flash('title', 'Earn Successful');


        return redirect()->route('userCash.links');


    }
    public function cashLinkShow($id)
    {

        $advert= Advert::findOrFail($id);
        return view('user.viewads.showads', compact('advert'));

    }

    public function cashVideoConfirm($id)
    {
        $user = Auth::user();

        $video= Video::findOrFail($id);
        $video->status = 1;
        $video->save();

        $rewards = $video->ppv->rewards;

        $profile = $user->profile;

        $profile->main_balance = $profile->main_balance + $rewards;

        $profile->save();

        $log = UserLog::create([

            'user_id' => $user->id,
            'reference' => str_random(12),
            'for' => 'Cash Video',
            'from' => 'Self',
            'details'=>'You Have Been Received Rewards for Cash Videos View',
            'amount'=>$rewards,

        ]);

        $upliner = Referral::whereUser_id($user->id)->count();

        if ($upliner == 1){

            $settings = Settings::first();

            $referral = Referral::whereUser_id($user->id)->first();

            $upliner = $referral->reflink->user->profile;

            $percentage = $settings->referral_advert;

            $commission = (($percentage / 100) * $rewards);

            $upliner->referral_balance = $upliner->referral_balance + $commission;

            $upliner->save();


            $log = UserLog::create([

                'user_id' => $referral->reflink->user->id,
                'reference' => str_random(12),
                'for' => 'Referral',
                'from' => $user->name,
                'details'=>'You Have Been Received Referral Bonus for Cash Videos View',
                'amount'=>$commission,

            ]);

        }


        session()->flash('message', 'The Video Ads Has Been Successfully Viewed.');
        Session::flash('type', 'success');
        Session::flash('title', 'Earn Successful');

        return redirect()->route('userCash.videos');


    }





    public function cashVideoShow($id)
    {

        $video= Video::findOrFail($id);
        return view('user.viewads.vshow', compact('video'));

    }


    public function cashVideos()
    {

        $user = Auth::user();
        $settings = Settings::first();

        $ad_limit = $user->membership->ad_limit;

        $membership = $user->membership->id;

        $ad = Video::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->count();

        if ($ad == 0)
        {
            $ppvse = Ppv::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->count();

            if ($ppvse == 0){

                session()->flash('message', 'Sorry To Say You That Currently there is no Cash Videos for you. Please wait or upgrade your membership, ');
                Session::flash('type', 'error');
                Session::flash('title', 'Error');

                return redirect()->route('userMemberships');

            }
            else {

                $ppvs = Ppv::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->get();

                foreach ($ppvs as $ppv)
                {
                    $info =([

                        'user_id'=> $user->id,
                        'date'=> date('Y-m-d'),
                        'ppv_id'=> $ppv->id,

                    ]);

                    Video::create($info);
                }

                $videos = Video::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(20);

                return view('user.viewads.vindex',compact('videos','settings'));

            }

        }else{

            $videos = Video::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(20);
            return view('user.viewads.vindex',compact('videos','settings'));
        }



    }
}
