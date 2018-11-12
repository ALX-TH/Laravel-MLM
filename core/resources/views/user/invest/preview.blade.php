@extends('layouts.dashboard')
@section('title', 'Investment Order Confirmation')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h2 class="title">Investment Order Confirmation</h2>
                        <h5 class="description">Before Placed Your Investment Please Review Info Below. By The Way Thanks for trust Us. Your Money is Always Safe With Us. We Won't be Disappointed.</h5>
                    </div>
                </div>


                <div class="card-content">
                    <br>


                            <div class="col-md-6 col-md-offset-3">
                                <div class="card card-pricing card-raised">
                                    <div class="card-content">
                                        <h6 class="category">Investment Summery</h6>
                                        <div class="icon icon-rose">
                                            <i class="material-icons">highlight</i>
                                        </div>
                                        <h5 class="card-title text-primary">
                                            <span class="pull-left text-info">Your Balance:<b> {{config('app.currency_symbol')}} {{Auth::user()->profile->deposit_balance + 0}}</b></span>
                                        </h5><br>
                                        <h5 class="card-title text-primary">
                                            <span class="pull-left text-info">Invest Amount:<b> {{config('app.currency_symbol')}} {{$invest->amount}}</b></span>
                                        </h5><br>
                                        <h5 class="card-title text-primary">
                                            <span class="pull-left text-info">Net Profit:<b> {{config('app.currency_symbol')}} {{$invest->profit}}</b></span>
                                        </h5><br>
                                        <h5 class="card-title text-primary">
                                            <span class="pull-left text-info">Total Return:<b> {{config('app.currency_symbol')}} {{$invest->total}}</b></span>
                                        </h5>
                                        <br><br>

                                        <button class="btn btn-raised btn-round btn-info" data-toggle="modal" data-target="#investModal{{$invest->id}}">
                                            Confirm Invest
                                        </button>
                                    </div>
                                </div>
                            </div>
                    <!-- small modal -->
                    <div class="modal fade" id="investModal{{$invest->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-small ">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h5>Before Order Is Placed Accept Our Terms And Conditions</h5>
                                </div>
                                <form action="{{route('userInvestment.confirm')}}" method="post">
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

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="tos" value="1" > I agree to the
                                                <a href="{{route('viewPage', 'terms-and-conditions')}}">terms and conditions</a>.
                                            </label>
                                        </div>

                                        <input type="hidden" name="plan_id" value="{{$invest->id}}">
                                        <input type="hidden" name="amount" value="{{$invest->amount}}">

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


                </div>
            </div>
        </div>
    </div>




@endsection