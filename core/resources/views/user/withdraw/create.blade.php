@extends('layouts.dashboard')
@section('title', 'Balance Withdraw to your Pocket')
@section('content')


    <div class="row">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Balance Withdraw Section -
                        <small class="category">Cash Out balance to your Pocket using our supported gateway.</small>
                    </h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="nav nav-pills nav-pills-icons nav-pills-primary nav-stacked" role="tablist">

                                <li class="active">
                                    <a href="#withdraw" role="tab" data-toggle="tab">
                                        <i class="material-icons">redeem</i>Withdraw
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content">

                                <div class="tab-pane active" id="withdraw">


                                    <div class="alert alert-info">
                                        <span class="text-center">Reed before deposit your balance. You need to know gateway fee:</span><br>
                                        @php $id=0;@endphp
                                        @foreach($gateways as $gateway)
                                            @php $id++;@endphp
                                                <span>{{$id}}. <b>@if($gateway->name){{$gateway->name}}@endif @if($gateway->local_name){{$gateway->local_name}}@endif</b> will be charge you <b>{{config('app.currency_symbol')}} {{$gateway->fixed}}</b> fixed + <b>{{$gateway->percent}}%</b> in every Withdraw.</span>
                                        @endforeach
                                    </div>

                                    <form action="{{route('userWithdraw.post')}}" method="post">
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
                                            <br>
                                        @endif

                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="form-group label-floating">
                                                    <select class="selectpicker" name="gateway" data-style="btn btn-warning btn-round" title="Select Withdraw Gateway" data-size="{{ $gateways->count() +1 }}">

                                                        @if($gate->status == 1)
                                                            <option value="1000">{{$gate->name}}</option>
                                                        @endif

                                                        @foreach($gateways as $gateway)
                                                                <option value="{{$gateway->id}}">{{$gateway->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">

                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="form-group label-floating">
                                                    <label  class="control-label" for="account">Your Account</label>
                                                    <input id="account" name="account" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <br>
                                        <div class="row">

                                            <div class="col-md-6 col-md-offset-3">

                                                <div class="form-group label-floating">
                                                    <label  class="control-label" for="amount">Withdraw Amount</label>
                                                    <input id="amount" name="amount" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <br>
                                        <br>
                                        <a href="{{route('userWithdraws')}}" class="btn btn-rose">Cancel Withdraw</a>

                                        <button type="submit" class="btn btn-success pull-right">Withdraw Now</button>
                                        <div class="clearfix"></div>
                                    </form>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="row">

            <div class="col-md-3">
                <div class="card card-content">
                    <div class="card-content">
                        <div class="alert alert-primary">
                            <h4 class="card-title text-center"><span>Withdraw Balance</span></h4>
                        </div>

                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green">
                                <i class="material-icons">done_all</i>
                            </div>
                            <div class="card-content">
                                <p class="category">{{config('app.currency_code')}}</p>
                                <h3 class="card-title">{{config('app.currency_symbol')}} {{$user->profile->main_balance +0}}</h3>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>

@endsection