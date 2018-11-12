@extends('layouts.dashboard')
@section('title', 'Pick the best plan for you')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h2 class="title">Pick the best plan for you</h2>
                        <h5 class="description">Bigger package has Bigger Earning System and Premium Support on each package.</h5>
                    </div>
                </div>


                <div class="card-content">
                    <br>
                    @if($memberships)
                        @foreach($memberships as $membership)

                            <div class="col-md-3">
                                <div class="card card-pricing card-raised">
                                    <div class="card-content">
                                        <h6 class="category">{{$membership->name}}</h6>
                                        <div class="icon icon-info">
                                            <i class="material-icons">highlight</i>
                                        </div>
                                        <h3 class="card-title">

                                            @if($membership->price == 0)

                                                Free

                                            @else
                                                {{config('app.currency_symbol')}} {{$membership->price + 0}}
                                            @endif


                                        </h3>
                                        <p class="card-description">
                                            {!! $membership->details !!}
                                        </p>

                                        @if($membership->id == $user->membership_id)

                                            <span class="btn btn-warning">Already Upgraded</span>

                                        @else
                                            <a href="{{route('userMembership.upgrade', $membership->id)}}" type="button" rel="tooltip" class="btn btn-primary">
                                                Upgraded Now
                                            </a>

                                        @endif


                                    </div>
                                </div>
                            </div>



                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>




@endsection