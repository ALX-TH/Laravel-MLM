<?php

namespace App\Http\Controllers;

use App\Interest;
use App\InterestLog;
use App\Invest;
use App\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserInterestController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');


    }

    public function index(){

        $invests = Plan::whereStatus(1)->get();

        return view('user.invest.index',compact('invests'));
    }
    public function investHistory(){

        $user = Auth::user();
        $investments = Invest::whereUser_id($user->id)->latest()->paginate(20);

        return view('user.invest.invest',compact('investments'));
    }
    public function interestHistory(){

        $user = Auth::user();
        $logs = InterestLog::whereUser_id($user->id)->latest()->paginate(20);

        return view('user.invest.log',compact('logs'));
    }



    public function submit(Request $request){

        $this->validate($request, [

            'amount'=> 'required||numeric',
            'plan_id' => 'required|numeric',

        ]);

        $plan = Plan::find($request->plan_id);

        $minimum = $plan->minimum;

        $maximum = $plan->maximum;

        $amount = $request->amount;

        $profile = Auth::user()->profile;

        if ($amount < $minimum){

            session()->flash('message', "Your Investment Amount is too low for Invest. You need at least $".$minimum." for Invest in this plan. So Deposit Money First or Try to Income by Refer.");
            Session::flash('type', 'error');
            Session::flash('title', 'Insufficient Balance');

            return redirect()->route('userInvestments');
        }
        elseif ($amount > $maximum){


            session()->flash('message', "Your Investment Amount is too high for Invest. You can invest $".$maximum." for Invest in this plan. So Decrease your Money First or Invest another plan.");
            Session::flash('type', 'error');
            Session::flash('title', 'Amount High');

            return redirect()->route('userInvestments');

        }
        elseif ($amount > $profile->deposit_balance ){

            session()->flash('message', "You want to invest $".$amount.". But You have only $".$profile->deposit_balance." in your deposit balance. So Deposit money first or try transfer your all money to deposit balance using fund transfer.");
            Session::flash('type', 'error');
            Session::flash('title', 'Insufficient Funds');

            return redirect()->route('userInvestments');

        }
        else{

            $percentage =  $plan->percentage;

            $profit = (($percentage / 100) * $amount);

            $invest = (object) array(
                "profit"=>$profit,
                "amount"=>$amount,
                "total"=>$profit + $amount,
                "id" => $request->plan_id,
            );


            return view('user.invest.preview',compact('invest'));



        }



    }
    public function confirm(Request $request){

        $this->validate($request, [

            'plan_id'=> 'required|numeric',
            'amount' => 'required|numeric',
            'tos' => 'required|accepted',

        ]);

        $plan = Plan::find($request->plan_id);

        $user = Auth::user();

        $user->profile->deposit_balance = $user->profile->deposit_balance - $request->amount;

        $user->profile->save();

        $delay = $plan->start_duration;

        $today = Carbon::now();

        $investment = new Invest();
        $investment->user_id = $user->id;
        $investment->plan_id = $request->plan_id;
        $investment->reference_id = str_random(12);
        $investment->amount = $request->amount;
        $investment->start_time = $today->addHours($delay);
        $investment->status = 0;

        $investment->save();

        $interest = new Interest();
        $interest->invest_id = $investment->id;
        $interest->user_id = $user->id;
        $interest->reference_id = str_random(12);
        $interest->start_time = $today->addHours($delay);
        $interest->total_repeat = 0;
        $interest->status = 0;

        $interest->save();


        session()->flash('message', 'You Have Successfully Invest $'.$request->amount.' Now set back and Relax you will get notify by once you get interests.');
        Session::flash('type', 'success');
        Session::flash('title', 'Invest Successful');

        return redirect()->route('userInvest.history');
    }

}
