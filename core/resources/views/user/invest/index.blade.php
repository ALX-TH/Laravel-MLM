@extends('layouts.dashboard')
@section('title', 'Pick the best invest plan for you')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h2 class="title">Pick the best invest plan for you</h2>
                        <h5 class="description">Higher Plan, Higher Invest, Higher Interest at No Risk and Premium Support on each package. You can also withdraw your money emergency before end of the investment periods.</h5>
                    </div>
                </div>


                <div class="card-content">
                    <br>
                    @if($invests)
                        @foreach($invests as $invest)

                            <div class="col-md-4">
                                <div class="card card-pricing card-raised">
                                    <div class="card-content">
                                        <h6 class="category">{{$invest->name}}</h6>
                                        <div class="icon icon-info">
                                            <i class="material-icons">highlight</i>
                                        </div>
                                        <h5 class="card-title text-warning">
                                               <b> {{config('app.currency_symbol')}} {{$invest->minimum + 0}} - {{config('app.currency_symbol')}} {{$invest->maximum + 0}}</b>
                                        </h5>
                                        <br>
                                        <p class="card-description">
                                            This Plan have following Benefits. You will get Return <span class="text-success"> <b> {{$invest->percentage + 0}}% </b></span> money on every investment. This is <span class="text-success"> <b> {{$invest->style->name}}</b></span> Plan.
                                            It's means when you invest under this plan you will get interest<span class="text-success"> <b> {{$invest->repeat}} </b></span> times in total investment periods. You will get interests calculated

                                            @if($invest->start_duration == 0)

                                                <span class="text-success"> <b>instantly</b></span>

                                            @else
                                                                <span class="text-success"> <b> {{$invest->start_duration}} </b></span> hours later for fraud check.
                                            @endif


                                           after invest placed.

                                        </p>
                                        <button class="btn btn-raised btn-round btn-info" data-toggle="modal" data-target="#investModal{{$invest->id}}">
                                            Invest Now
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- small modal -->
                            <div class="modal fade" id="investModal{{$invest->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-small ">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5>Enter Invest Amount  Below</h5>
                                        </div>
                                        <form action="{{route('userInvestment.submit')}}" method="post">
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

                                            <div class="modal-body">
                                                    <div class="form-group label-floating">
                                                        <label  class="control-label" for="amount">Investment Amount</label>
                                                        <input id="amount" name="amount" type="number" class="form-control">
                                                    </div>

                                                <input type="hidden" name="plan_id" value="{{$invest->id}}">

                                            </div>

                                        <div class="modal-footer text-center">
                                            <button type="button" class="btn btn-simple" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-success btn-sm">Preview Invest</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--    end small modal -->

                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>




@endsection