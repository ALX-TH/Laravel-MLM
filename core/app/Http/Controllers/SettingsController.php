<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){

        $settings = Settings::first();

        return view('admin.settings.index',compact('settings'));
    }


    public function generalSettings(Request $request, $id){


        $this->validate($request, [

            'site_name'=> 'required',
            'site_title' => 'required',
            'company_name' => 'required',
            'contact_email' => 'required|email',
            'contact_number' => 'required',
            'app_contact' => 'required|email',
            'address' => 'required',
            'disqus' => 'required',
            'chat_code' => 'required',

        ]);


        $settings = Settings::find($id);

        $settings->site_name = $request->site_name;
        $settings->site_title = $request->site_title;
        $settings->company_name = $request->company_name;
        $settings->contact_email = $request->contact_email;
        $settings->contact_number = $request->contact_number;
        $settings->app_contact = $request->app_contact;
        $settings->address = $request->address;
        $settings->disqus = $request->disqus;
        $settings->chat_code = $request->chat_code;
        $settings->save();

        session()->flash('message', 'Website Settings Has been Successfully Changes.');
        Session::flash('type', 'success');
        Session::flash('title', 'Update Successful');

        return redirect()->back();
    }

    public function featuresSettings(Request $request, $id){


        $this->validate($request, [

            'ptc'               => 'required|boolean',
            'ppv'               => 'required|boolean',
            'payment_proof'     => 'required|boolean',
            'latest_deposit'    => 'required|boolean',
            'transfer'          => 'required|boolean',
            'live_chat'         => 'required|boolean',
            'membership_upgrade' => 'required|boolean',
            'invest'            => 'required|boolean',
        ]);


        $settings = Settings::find($id);

        $settings->ptc = $request->ptc;
        $settings->ppv = $request->ppv;
        $settings->payment_proof = $request->payment_proof;
        $settings->transfer = $request->transfer;
        $settings->latest_deposit = $request->latest_deposit;
        $settings->live_chat = $request->live_chat;
        $settings->membership_upgrade = $request->membership_upgrade;
        $settings->invest = $request->invest;
        $settings->save();


        session()->flash('message', 'Website Features Settings Has been Successfully Changes.');
        Session::flash('type', 'success');
        Session::flash('title', 'Update Successful');

        return redirect()->back();
    }

    public function usersSettings(Request $request, $id)
    {
        $this->validate($request, [

            'minimum_deposit'       => 'required|min:0',
            'minimum_withdraw'      => 'required|min:0',
            'self_transfer'         => 'required|min:0',
            'other_transfer'        => 'required|min:0',
            'signup_bonus'          => 'required|min:0',
            'link_share'            => 'required|min:0',
            'referral_signup'       => 'required|min:0',
            'referral_deposit'      => 'required|min:0',
            'referral_advert'       => 'required|min:0',
            'referral_upgrade'      => 'required|min:0',

        ]);


        $settings = Settings::find($id);

        $settings->minimum_deposit = $request->minimum_deposit;
        $settings->minimum_withdraw = $request->minimum_withdraw;
        $settings->self_transfer = $request->self_transfer;
        $settings->other_transfer = $request->other_transfer;
        $settings->signup_bonus = $request->signup_bonus;
        $settings->link_share = $request->link_share;
        $settings->referral_signup = $request->referral_signup;
        $settings->referral_deposit = $request->referral_deposit;
        $settings->referral_advert = $request->referral_advert;
        $settings->referral_upgrade = $request->referral_upgrade;

        $settings->save();

        session()->flash('message', 'Website Users Settings Has been Successfully Changes.');
        Session::flash('type', 'success');
        Session::flash('title', 'Update Successful');

        return redirect()->back();
    }
}
