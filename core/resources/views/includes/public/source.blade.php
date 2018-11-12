
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h2 class="title">Earn money by calling your friends!</h2>
            <h5 class="description">You can benefit from our affiliate program with  2% payout for all yours referrals deposits. Earn your money online by inviting your friends to Trusted Paid Ads!</h5>
            <div class="section-space"></div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-5 col-md-offset-1">
            <div class="card card-background" style="background-image: url('{{asset('img/card-project2.jpg')}}')">
                <a href="#">

                </a>
                <div class="card-content">
                    <label class="label label-rose">Referrals</label>
                    <a href="#">
                        <h3 class="card-title">Best Affiliate</h3>
                    </a>
                    <p class="card-description">
                        We are successful because of our Customers and Affiliate partners. We don't forget this, and we want to say thank you by providing the best rate Payback Program with the highest payouts!
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="info info-horizontal">
                <div class="icon icon-info">
                    <i class="material-icons">account_balance_wallet</i>
                </div>
                <div class="description">
                    <h4 class="info-title">Rewarding Affiliate Program</h4>
                    <p class="description">
                        Our affiliate program is so well paying, it would be a big loss not to use it! In fact, we pay not just one, but 2 LEVELs deep! With our Affiliate program you can build a long term stable & passive income on the Internet.
                    </p>
                </div>
            </div>

            <div class="info info-horizontal">
                <div class="icon icon-primary">
                    <i class="material-icons">card_giftcard</i>
                </div>
                <div class="description">
                    <h4 class="info-title">Payback Program</h4>
                    <p class="description">
                        Everyone who joins this program will get paid every day, 7 days a week! It's free to use and earn money with TrustedPaidAds.
                    </p>
                </div>
            </div>

            <div class="info info-horizontal">
                <div class="icon icon-success">
                    <i class="material-icons">build</i>
                </div>
                <div class="description">
                    <h4 class="info-title">Promotion Tools</h4>
                    <p class="description">
                        Receive Your own free rotators, You can even build a down line and earn money from their purchases!
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>

<hr>
@if($settings->latest_deposit == 1)
<div class="container">
        <!--                nav tabs	             -->
        <div id="nav-tabs">

            <div class="row">
                <div class="col-md-6">

                    <!-- Tabs with icons on Card -->
                    <div class="card card-nav-tabs">
                        <div class="header header-primary">
                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="pull-center nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#deposit" data-toggle="tab">
                                                <i class="material-icons">face</i>
                                                Latest Deposits
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content text-center">
                                <div class="tab-pane active" id="deposit">

                                    @if(count($deposits) > 0)
                                        <div class="table-responsive">

                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">SN</th>
                                                    <th class="text-center">Gateway</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Amount</th>
                                                    <th class="text-center">Time</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $id=0;@endphp
                                                @foreach($deposits as $deposit)
                                                    @php $id++;@endphp
                                                    <tr>
                                                        <td class="text-center">{{ $id }}</td>
                                                        <td class="text-center">{{$deposit->gateway_name}}</td>
                                                        <td class="text-center">{{$deposit->user->name}}</td>
                                                        <td class="text-center">{{config('app.currency_symbol')}} {{$deposit->amount}}</td>
                                                        <td class="text-center">{{$deposit->created_at->diffForHumans()}}</td>

                                                        <td class="actions text-center">
                                                            @if($deposit->status == 1)
                                                                <button class="btn btn-success btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                                                    Ok
                                                                </button>
                                                            @else

                                                                <button class="btn btn-warning btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">warning</i>
                                        </span>
                                                                    Pending
                                                                </button>



                                                            @endif






                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    @else

                                        <h1 class="text-center">No Deposit Request</h1>
                                    @endif



                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Tabs with icons on Card -->

                </div>

                <div class="col-md-6">

                    <!-- Tabs with icons on Card -->
                    <div class="card card-nav-tabs">
                        <div class="header header-rose">
                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="pull-center nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#deposit" data-toggle="tab">
                                                <i class="material-icons">face</i>
                                                Latest Withdraws
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content text-center">
                                <div class="tab-pane active" id="deposit">

                                    @if(count($withdraws) > 0)
                                        <div class="table-responsive">

                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">SN</th>
                                                    <th class="text-center">Gateway</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Amount</th>
                                                    <th class="text-center">Time</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $id=0;@endphp
                                                @foreach($withdraws as $withdraw)
                                                    @php $id++;@endphp
                                                    <tr>
                                                        <td class="text-center">{{ $id }}</td>
                                                        <td class="text-center">{{$withdraw->gateway_name}}</td>
                                                        <td class="text-center">{{$withdraw->user->name}}</td>
                                                        <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->amount}}</td>
                                                        <td class="text-center">{{$withdraw->updated_at->diffForHumans()}}</td>

                                                        <td class="actions text-center">
                                                            @if($withdraw->status == 1)
                                                                <button class="btn btn-success btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                                                    Ok
                                                                </button>
                                                            @else

                                                                <button class="btn btn-warning btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">warning</i>
                                        </span>
                                                                    Pending
                                                                </button>



                                                            @endif






                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    @else

                                        <h1 class="text-center">No Withdraw Request</h1>
                                    @endif



                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Tabs with icons on Card -->

                </div>

            </div>
        </div>
</div>
<hr>
@endif
<div class="container">
<div class="row">

    <div class="col-md-5 col-md-offset-1">
        <div class="info info-horizontal">
            <div class="icon icon-rose">
                <i class="material-icons">credit_card</i>
            </div>
            <div class="description">
                <h4 class="info-title">Withdraw</h4>
                <p class="description">
                    Please note: Every withdrawals will process within 24-72 depending how much you will withdraw.
                </p>
            </div>
        </div>

        <div class="info info-horizontal">
            <div class="icon icon-success">
                <i class="material-icons">send</i>
            </div>
            <div class="description">
                <h4 class="info-title">Withdraw Rules</h4>
                <p class="description">
                    Any Members can withdraw their profit amount any time after being $5.00 . But can not withdraw their seed money after 30 days.
                </p>
            </div>
        </div>

        <div class="info info-horizontal">
            <div class="icon icon-info">
                <i class="material-icons">business</i>
            </div>
            <div class="description">
                <h4 class="info-title">Emergency Withdraw</h4>
                <p class="description">
                    We know, How much money can be important! Need Emergency Withdraw? You can withdraw your money anytime. But in that case you have pay 20% fee of your investment. Because your money is seeding.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card card-background" style="background-image: url('{{asset('img/card-project5.jpg')}}')">
            <a href="#">
            </a>
            <div class="card-content">
                <label class="label label-rose">Benefits</label>
                <a href="#">
                    <h2 class="card-title">Members Benefits</h2>
                </a>
                <p class="card-description">
                    Earn Money with Trusted Paid Ads Revenue Sharing Program! Upto 10% of Your Invest.
                </p>
            </div>
        </div>
    </div>
</div>
</div>