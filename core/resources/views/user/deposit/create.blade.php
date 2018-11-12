@extends('layouts.dashboard')
@section('title', 'Cash in balance to your account')
@section('content')


    <div class="row">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Balance Deposit Section -
                        <small class="category">Cash in balance to your account using instant deposit and local deposit.</small>
                    </h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="nav nav-pills nav-pills-icons nav-pills-primary nav-stacked" role="tablist">

                                <li class="active">
                                    <a href="#instant" role="tab" data-toggle="tab">
                                        <i class="material-icons">fingerprint</i>Instant Deposit
                                    </a>
                                </li>
                                <li>
                                    <a href="#local" role="tab" data-toggle="tab">
                                        <i class="material-icons">redeem</i>Local Deposit
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">
                                <div class="tab-pane active" id="instant">


                                    <div class="alert alert-info">
                                        <span class="text-center">Reed before deposit your balance. You need to know gateway fee:</span><br>
                                        @foreach($gateways as $gateway)
                                            <span>{{$gateway->id}}. <b>{{$gateway->name}}</b> will be charge you <b>{{config('app.currency_symbol')}} {{$gateway->fixed}}</b> fixed + <b>{{$gateway->percent}}%</b> in every deposit.</span>
                                        @endforeach
                                    </div>

                                    <form action="{{route('userDeposit.post')}}" method="post">
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
                                                    <select class="selectpicker" name="gateway" data-style="btn btn-warning btn-round" title="Select Deposit Gateway" data-size="7">

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

                                                    <label  class="control-label" for="amount">Deposit Amount</label>
                                                    <input id="amount" name="amount" type="text" class="form-control">

                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <a href="{{route('userDeposits')}}" class="btn btn-rose">Cancel Deposit</a>

                                        <button type="submit" class="btn btn-success pull-right">Deposit Now</button>
                                        <div class="clearfix"></div>
                                    </form>


                                </div>
                                <div class="tab-pane" id="local">


                                    <div class="alert alert-info">
                                        <span class="text-center">Reed before deposit your balance. You need to know gateway fee:</span><br>
                                        @php $id=0;@endphp
                                        @foreach($local_gateways as $local)
                                            @php $id++;@endphp
                                            <span>{{$id}}. <b>{{$local->name}}</b> will be charge you <b>{{config('app.currency_symbol')}} {{$local->fixed}}</b> fixed + <b>{{$local->percent}}%</b> in every deposit.</span>
                                        @endforeach
                                    </div>

                                    <form action="{{route('userPaymentPreview')}}" method="post">
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
                                                    <select class="selectpicker" name="gateway" data-style="btn btn-warning btn-round" title="Select Deposit Gateway" data-size="7">

                                                        @foreach($local_gateways as $local)
                                                            <option value="{{$local->id}}">{{$local->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">

                                            <div class="col-md-6 col-md-offset-3">

                                                <div class="form-group label-floating">

                                                    <label  class="control-label" for="amount">Deposit Amount</label>
                                                    <input id="amount" name="amount" type="text" class="form-control">

                                                </div>
                                            </div>
                                        </div>


                                        <br>
                                        <br>
                                        <a href="{{route('userDeposits')}}" class="btn btn-rose">Cancel Deposit</a>

                                        <button type="submit" class="btn btn-success pull-right">Deposit Now</button>
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
                            <h4 class="card-title text-center"><span>Deposit Balance</span></h4>
                        </div>

                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green">
                                <i class="material-icons">done_all</i>
                            </div>
                            <div class="card-content">
                                <p class="category">{{config('app.currency_code')}}</p>
                                <h3 class="card-title">{{config('app.currency_symbol')}} {{$user->profile->deposit_balance + 0}}</h3>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>



@endsection