@extends('layouts.admin')

@section('title', 'Website Admin Dashboard Controller')

@section('content')

    <div class="row">

        @if(
        count($deposit_notify) > 0 or
        count($withdraw_notify) > 0 or
         count($kyc_notify) > 0 or
        count($kyc2_notify) > 0)

        <div class="col-md-12">

                <div class="card-content">
                    <div class="alert alert-success alert-with-icon" data-notify="container">
                        <i class="material-icons" data-notify="icon">notifications</i>
                        <span class="text-center" data-notify="message">Welcome {{Auth::user()->name}} !! You have received some request from your website user.</span>
                        <br>
                        @if(count($deposit_notify) > 0)
                            <span data-notify="message">The System has <b>{{count($deposit_notify)}} </b>Local Deposit Request from your valuable website user.</span>
                        @endif
                        @if(count($withdraw_notify) > 0)
                            <span data-notify="message">The System has <b>{{count($withdraw_notify)}} </b>Withdraw Request from your valuable website user.</span>
                        @endif
                        @if(count($kyc_notify) > 0)
                            <span data-notify="message">The System has <b>{{count($kyc_notify)}} </b>Identity Verify Request from your valuable website user.</span>
                        @endif
                        @if(count($kyc2_notify) > 0)
                            <span data-notify="message">The System has <b>{{count($kyc2_notify)}} </b>Proof of Address Verify Request from your valuable website user.</span>
                        @endif
                    </div>
                </div>

        </div>
            @else
            <div class="col-md-12">

                    <div class="card-content">
                        <div class="alert alert-info alert-with-icon" data-notify="container">
                            <i class="material-icons" data-notify="icon">notifications</i>

                                <span data-notify="message">Cheers {{Auth::user()->name}} !!, <br>There is no Pending task or issue.</span>
                        </div>
                    </div>

            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">language</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Global Sales by Top Locations</h4>
    <div class="row">
        <div class="col-md-5">
            <div class="table-responsive table-sales">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/US.png')}}">
                            </div>
                        </td>
                        <td>USA</td>
                        <td class="text-right">
                            2.920
                        </td>
                        <td class="text-right">
                            53.23%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/DE.png')}}">
                            </div>
                        </td>
                        <td>Germany</td>
                        <td class="text-right">
                            1.300
                        </td>
                        <td class="text-right">
                            20.43%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/AU.png')}}">
                            </div>
                        </td>
                        <td>Australia</td>
                        <td class="text-right">
                            760
                        </td>
                        <td class="text-right">
                            10.35%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/GB.png')}}">
                            </div>
                        </td>
                        <td>United Kingdom</td>
                        <td class="text-right">
                            690
                        </td>
                        <td class="text-right">
                            7.87%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/RO.png')}}">
                            </div>
                        </td>
                        <td>Romania</td>
                        <td class="text-right">
                            600
                        </td>
                        <td class="text-right">
                            5.94%
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="flag">
                                <img src="{{asset('img/flags/BR.png')}}">
                            </div>
                        </td>
                        <td>Brasil</td>
                        <td class="text-right">
                            550
                        </td>
                        <td class="text-right">
                            4.34%
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-1">
            <div id="worldMap" class="map"></div>
        </div>
    </div>

                </div>
            </div>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="card-content">
                            <p class="category">{{config('app.currency_code')}}</p>
                            <h4 class="card-title">{{config('app.currency_symbol')}} {{$earn + 0}}</h4>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">account_circle</i>
                                <a href="#">Total Earn</a>
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

                            <h4 class="card-title">{{config('app.currency_symbol')}} {{$invest + 0}}</h4>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">compare_arrows</i> Total Invest
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

                            <h4 class="card-title">{{config('app.currency_symbol')}} {{$deposit + 0}}</h4>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">eject</i> Total Deposit
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
                            <h4 class="card-title">{{config('app.currency_symbol')}} {{$pending + 0}}</h4>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">hourglass_empty</i> Total Pending Withdraw
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
                        <div class="card-header" data-background-color="rose" data-header-animation="true">
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
                            <h4 class="card-title">Website Views</h4>
                            <p class="category">Last Campaign Performance</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> campaign sent 2 days ago
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
                            <h4 class="card-title">Daily Sales</h4>
                            <p class="category">
                                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> updated 4 minutes ago
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
                            <h4 class="card-title">Completed Tasks</h4>
                            <p class="category">Last Campaign Performance</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> campaign sent 2 days ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
