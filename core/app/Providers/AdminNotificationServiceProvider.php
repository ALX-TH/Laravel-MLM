<?php

namespace App\Providers;

use App\Withdraw;
use App\Deposit;
use App\Kyc;
use App\Kyc2;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AdminNotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('deposit_notify', Deposit::whereStatus(0)->get());
        View::share('withdraw_notify', Withdraw::whereStatus(0)->get());
        View::share('kyc_notify', Kyc::whereStatus(0)->get());
        View::share('kyc2_notify', Kyc2::whereStatus(0)->get());
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
