@extends('layouts.dashboard')
@section('title', 'Cash in balance to your account')
@section('content')


        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="card card-content">
                    <div class="card-content">
                        <div class="alert alert-info">
                                <span> You have been select <b>{{$gateway->name}}</b>. Please note that <b>{{$gateway->name}}</b> will be charge you <b>{{config('app.currency_symbol')}} {{$gateway->fixed}}</b> fixed + <b>{{$gateway->percent}}%</b> fee in every deposit.</span>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><span class="text-primary">Current Balance: </span><span class="text-danger"><b>{{config('app.currency_symbol')}} {{$user->profile->deposit_balance +0}}</b></span></h4>
                                <h4><span class="text-primary">Your  Amount: </span><span class="text-danger"><b>{{config('app.currency_symbol')}} {{$deposit->amount +0}}</b></span></h4>
                                <h4><span class="text-primary">Gateway Charge: </span><span class="text-danger"><b>{{config('app.currency_symbol')}} {{$deposit->charge + 0}}</b></span></h4>
                                <h4><span class="text-primary">Amount + Charge: </span><span class="text-danger"><b>{{config('app.currency_symbol')}} {{($deposit-> net_amount + $deposit->charge) + 0}}</b></span></h4>
                            </div>
                            <div class="col-md-6">
                                <br><br>
                                <h3><span class="text-primary">Reference Code: </span><span class="text-danger"><b>{{$deposit->code}}</b></span></h3>

                            </div>
                        </div>
                        <div class="alert alert-primary">
                            <span> You want to deposit your money via <b>{{$gateway->name}}</b>? Read The Instructions Carefully Below And Follow That. It can take lot of time to verify your deposit if you do Mistake.  </span>
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4 class="text-center text-success">Gateway Name: <b>{{$gateway->name}}</b> </h4>
                                <h4 class="text-center text-success">Our Account Number: <b>{{$gateway->account}}</b> </h4>
                                @if($gateway->details)

                                    <div class="text-center">

                                        {!! $gateway->details !!}

                                    </div>

                                @endif
                            </div>
                        </div>
                        <br> <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-info">Step 1: Go to your <b>{{$gateway->name}}</b> Account.</h5>
                                <h5 class="text-info">Step 2: Write This "<b>{{$deposit->code}}</b>" to Reference Option &amp; Send {{config('app.currency_symbol')}} {{$deposit->amount}} to Our <b>{{$gateway->name}}</b> Account That Provided Above.</h5>
                                <h5 class="text-info">Step 3: After Successfully Payment Click "Confirm Deposit" Button for confirm deposit.</h5>
                                    <br>
                                <h5 class="text-center text-danger">Note: Please don't send money without this "<b>{{$deposit->code}}</b>" Reference code . Otherwise we can't verify your payment.
                                    Then it can be long time to process your deposit. <b>And Remember if you didn't send money us then don't click "Confirm Button" below otherwise you can be banned for Spamming</b>. Thanks for working with us</h5>
                            </div>
                        </div>
                        <div class="row">
                            <form action="{{route('userDepConfirm')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="gateway" value="{{$gateway->id}}" />
                                <input type="hidden" name="reference" value="{{$deposit->code}}" />
                                <input type="hidden" name="amount" value="{{$deposit->amount}}" />

                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-4">
                                        <button class="btn btn-success"><i
                                                    class="fa fa-send"></i> Confirm Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>




@endsection