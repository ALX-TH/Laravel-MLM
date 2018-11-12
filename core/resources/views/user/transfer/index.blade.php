@extends('layouts.dashboard')
@section('title', 'Balance Transfer')
@section('content')


    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header card-header-tabs" data-background-color="green">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Balance Transfer</span>

                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#self" data-toggle="tab">
                                        <i class="material-icons">bug_report</i> Self
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                @if($settings->transfer == 1)
                                <li class="">
                                    <a href="#other" data-toggle="tab">
                                        <i class="material-icons">code</i> Other
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                    @endif

                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <br>


                <div class="card-content">
                    <h4 class="card-title">Balance Transfer Section -
                        <small class="category">Transfer Your Balance to Other Member and Account</small>
                    </h4>
                    <br>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="self">

                            <form action="{{route('userFundsTransfer.self')}}" method="post">
                                {{ csrf_field() }}
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger alert-with-icon" data-notify="container">
                                        <i class="material-icons" data-notify="icon">notifications</i>
                                        <span data-notify="message">

                                            @foreach($errors->all() as $error)

                                                        <li><strong> {{$error}} </strong></li>
                                            @endforeach

                                        </span>
                                    </div>
                                @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <select class="selectpicker" name="account" data-style="btn btn-info btn-round" title="Select Status" data-size="7">
                                            <option value="1" > Deposit Balance</option>
                                            <option value="2" > Earning Balance</option>
                                            <option value="3" selected> Referral Balance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label  class="control-label" for="amount">Exchange Amount</label>
                                        <input id="amount" name="amount" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <select class="selectpicker" name="transfer" data-style="btn btn-info btn-round" title="Select Status" data-size="7">
                                            <option value="1" selected >Deposit Balance</option>
                                            <option value="2" >Earning Balance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                                <a href="{{route('userDashboard')}}" class="btn btn-rose">Cancel Exchange</a>

                                <button type="submit" class="btn btn-success pull-right">Exchange Now</button>
                                <div class="clearfix"></div>
                            </form>


                        </div>
                        @if($settings->transfer == 1)
                        <div class="tab-pane" id="other">

                            <form action="{{route('userFundsTransfer.others')}}" method="post">
                                {{ csrf_field() }}
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger alert-with-icon" data-notify="container">
                                        <i class="material-icons" data-notify="icon">notifications</i>
                                        <span data-notify="message">

                                            @foreach($errors->all() as $error)

                                                <li><strong> {{$error}} </strong></li>
                                            @endforeach

                                        </span>
                                    </div>
                                @endif

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group label-floating">
                                        <select class="selectpicker" name="account" data-style="btn btn-info btn-round" title="Select Status" data-size="7">
                                            <option value="1" selected >Main Balance</option>
                                            <option value="2" >Deposit Balance</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label  class="control-label" for="email">Receiver Email Address</label>
                                        <input id="email" name="email" type="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label  class="control-label" for="amount">Sending Amount</label>
                                        <input id="amount" name="amount" type="number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                                <a href="{{route('userDashboard')}}" class="btn btn-rose">Cancel Transfer</a>

                                <button type="submit" class="btn btn-success pull-right">Transfer Now</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>





            <div class="clearfix"></div>


        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card card-content">
                    <div class="card-content">
                        <div class="alert alert-primary">
                            <h4 class="card-title text-center"><span>Your Current Balance Info</span></h4>
                        </div>

                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green">
                                <i class="material-icons">done_all</i>
                            </div>
                            <div class="card-content">
                                <p class="category">{{config('app.currency_code')}}</p>
                                <h3 class="card-title">{{config('app.currency_symbol')}} {{Auth::user()->profile->main_balance + 0}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-success">eject</i> Account Balance
                                </div>
                            </div>
                        </div>


                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">done_all</i>
                            </div>
                            <div class="card-content">
                                <p class="category">{{config('app.currency_code')}}</p>
                                <h3 class="card-title">{{config('app.currency_symbol')}} {{Auth::user()->profile->referral_balance + 0}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-success">eject</i> Referral Balance
                                </div>
                            </div>
                        </div>
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="blue">
                                <i class="material-icons">done_all</i>
                            </div>
                            <div class="card-content">
                                <p class="category">{{config('app.currency_code')}}</p>
                                <h3 class="card-title">{{config('app.currency_symbol')}} {{Auth::user()->profile->deposit_balance + 0}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-success">eject</i> Deposit Balance
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div>


@endsection