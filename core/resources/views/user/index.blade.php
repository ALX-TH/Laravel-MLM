@extends('layouts.dashboard')
@section('title', 'My Account Dashboard')
@section('content')

   <div class="row">
       @if(count($identity) == 0 or count($address) == 0)
       <div class="col-md-12">
           <div class="card-content">
               <div class="alert alert-info alert-with-icon" data-notify="container">
                   <i class="material-icons" data-notify="icon">notifications</i>
                   <span data-notify="message">

                                Hi {{Auth::user()->name}}, <br><br>
                                Thanks for using our service. Our System Detect That your identity has not been verified yet. Please note you can't withdraw your earning money without identity verify. Also our some cool features has been disabled for you. So, verify your identity as soon as possible.<br>
                                <br>
                                If you want to verify your identity now then that will be your good decision. For verify your identity click the <b>"Edit Profile"</b> button below. Then update profile with your real information and save. Now click <b>"Submit Verification"</b> Button in right side and do as our system say.<br><br>

                                <a href="{{route('userProfile')}}" type="button" rel="tooltip" class="btn btn-warning btn-sm">
                                    Edit Profile
                                </a>


                   </span>
               </div>
           </div>
       </div>
       @elseif(count($identity) == 1 and count($address) == 1)

       @endif
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="purple">
                    <i class="material-icons">monetization_on</i>
                </div>
                <div class="card-content">
                    <p class="category">{{config('app.currency_code')}}</p>
                    <h5 class="card-title">{{config('app.currency_symbol')}} {{$user->profile->main_balance + 0}}</h5>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">account_circle</i>
                        <a href="#">Account Balance</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="card-content">
                    <p class="category">{{config('app.currency_code')}}</p>
                    <h5 class="card-title">{{config('app.currency_symbol')}} {{$user->profile->referral_balance + 0}}</h5>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-rose">compare_arrows</i> Referral Balance
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">done_all</i>
                </div>
                <div class="card-content">
                    <p class="category">{{config('app.currency_code')}}</p>
                    <h5 class="card-title">{{config('app.currency_symbol')}} {{$user->profile->deposit_balance + 0}}</h5>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-success">eject</i> Deposited Balance
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="material-icons">https</i>
                </div>
                <div class="card-content">
                    <p class="category">{{config('app.currency_code')}}</p>
                    <h5 class="card-title">{{config('app.currency_symbol')}} {{$withdraw + 0}}</h5>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-info">hourglass_empty</i>Total Withdraw
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="purple" data-header-animation="true">
                    <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">Referral Stats</h4>
                    <p class="category">Your Direct Referral Chart</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> Updated 1 Second Ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="green" data-header-animation="true">
                    <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">Referral Earning States</h4>
                    <p class="category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today Referral Clicks.</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> Updated 1 Second Ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header" data-background-color="blue" data-header-animation="true">
                    <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                            <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                            <i class="material-icons">edit</i>
                        </button>
                    </div>
                    <h4 class="card-title">Your Earning States</h4>
                    <p class="category">Your Total Earning Chart</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> Updated 1 Second Ago
                    </div>
                </div>
            </div>
        </div>
    </div>

   @if($posts)

    <h3>Latest Promotion Offer and Event News</h3>
    <br>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-image" data-header-animation="true">
                    <a href="">
                        <img class="img" src="{{$post->featured}}">
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                    </div>
                    <h4 class="card-title">
                        <a href="{{route('viewPost', ['slug'=>$post->slug])}}"> {{$post->title}}</a>
                    </h4>
                    <div class="card-description">

                        {!! Markdown::convertToHtml(str_limit($post->content,'250')) !!}

                    </div>
                </div>
                <div class="card-footer">
                    <div class="price">
                        <a href="{{route('viewPost', ['slug'=>$post->slug])}}" type="button" rel="tooltip" class="btn btn-primary btn-sm">
                            <i class="material-icons">edit</i>
                            Read More
                        </a>
                    </div>
                    <div class="stats pull-right">
                        <p class="category"> by <b>Admin</b></p>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>

    @endif


@endsection