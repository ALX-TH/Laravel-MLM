<?php

namespace App\Console\Commands;

use App\Interest;
use App\InterestLog;
use App\Invest;
use App\Membership;
use App\Settings;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;

class GiveInvestInterestToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invests:GiveInvestInterestToUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command Give Money Investment Interests To All User';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $settings = Settings::first();
        if ($settings->invest == 1) {
            $interests = Interest::whereStatus(0)->get();
            foreach ($interests as $interest) {
                if ($interest->start_time < Carbon::now()) {
                    $percentage = $interest->invest->plan->percentage;
                    $amount = $interest->invest->amount;
                    $profit = (($percentage / 100) * $amount);
                    $repeat = $interest->invest->plan->repeat;
                    $return= ($profit / $repeat);
                    $interestlog = new InterestLog();
                    $interestlog->user_id = $interest->user_id;
                    $interestlog->invest_id = $interest->invest_id;
                    $interestlog->reference_id = str_random(12);
                    $interestlog->amount = $return;
                    $interestlog->save();
                    $invest = Invest::findOrFail($interest->invest_id);
                    $invest->status = 1;
                    $invest->save();
                    $start = Carbon::now();
                    $hours = $interest->invest->plan->style->compound;
                    $interest->total_repeat = $interest->total_repeat + 1;
                    $interest->made_time = Carbon::now();
                    $interest->start_time = $start->addHours($hours);
                    $user = User::findOrFail($interest->user_id);
                    if ($interest->total_repeat == $repeat) {
                        $interest->status = 1;
                        $invest = Invest::findOrFail($interest->invest_id);
                        $invest->status = 3;
                        $invest->save();
                        $user->profile->main_balance = $user->profile->main_balance + $amount;
                        $user->profile->save();
                    }
                    $interest->save();
                    $user->profile->main_balance = $user->profile->main_balance + $return;
                    $user->profile->save();
                }
            }
        }
        if ($settings->membership_upgrade == 1){
            $users= User::all();
            foreach ($users as $user){
                $today = Carbon::today();
                $expired = $user->membership_expired;
                $datetime1 = new DateTime($today);
                $datetime2 = new DateTime($expired);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');
                if ($days == 0){
                    $membership = Membership::first();
                    $user->membership_id = $membership->id;
                    $user->membership_started = Carbon::today();
                    $user->membership_expired = $today->addDays($membership->duration);
                    $user->save();
                }
            }
        }
    }
}
