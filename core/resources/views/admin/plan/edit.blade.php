@extends('layouts.admin')

@section('title', 'Edit Invest Plan')

@section('styles')


@endsection


@section('content')

    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Invest Plan Section -
                        <small class="category">Edit Invest Plan</small>
                    </h4>
                    <form action="{{route('adminInvest.update',['id'=>$plan->id])}}" method="post" enctype="multipart/form-data">

                        {{csrf_field()}}

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
                                    <label  class="control-label" for="name">Invest Plan Name</label>
                                    <input id="name" name="name" type="text" value="{{$plan->name}}" class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group label-floating">
                                    <label  class="control-label" for="style_id">Payout period</label>
                                    <select class="selectpicker" id="style_id" name="style_id" data-style="btn btn-warning btn-round" title="Select Category" data-size="7">
                                        @foreach($styles as $style)
                                            <option value="{{$style->id}}"
                                                    @if($plan->style->id == $style->id)
                                                    selected
                                                    @endif
                                            > {{$style->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="minimum">Minimum Invest (in {{config('app.currency_code')}})</label>
                                    <input id="minimum" name="minimum" type="number" value="{{$plan->minimum +0}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="maximum">Maximum Invest (in {{config('app.currency_code')}})</label>
                                    <input id="maximum" name="maximum" type="number" value="{{$plan->maximum +0}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="percentage">Invest Interest Return (in Percentage)</label>
                                    <input id="percentage" name="percentage" type="text" value="{{$plan->percentage}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="repeat">Total Repeat (Interest Return Frequency)</label>
                                    <input id="repeat" name="repeat" type="number" value="{{$plan->repeat}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="start_duration">Invest Start Delay (in Hour)</label>
                                    <input id="start_duration" name="start_duration" type="number" value="{{$plan->start_duration}}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label  class="control-label" for="status">Select Plan Status</label>
                                <div class="form-group label-floating">
                                    <select class="selectpicker" id="status" name="status" data-style="btn btn-warning btn-round" title="Select Category" data-size="7">
                                        <option value="0"
                                                @if($plan->status == 0)
                                                selected
                                                @endif
                                        >Not Active</option>

                                        <option value="1"
                                                @if($plan->status == 1)
                                                selected
                                                @endif
                                        >Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label  class="control-label" for="availability_reinvestment">Reinvestment</label>
                                <div class="form-group label-floating">
                                    <select class="selectpicker" id="availability_reinvestment" name="availability_reinvestment" data-style="btn btn-warning btn-round" title="Select reinvestment availability" data-size="7">
                                        <option value="0"
                                                @if($plan->availability_reinvestment == 0)
                                                selected
                                                @endif
                                        >Not available</option>

                                        <option value="1"
                                                @if($plan->availability_reinvestment == 1)
                                                selected
                                                @endif
                                        >Available</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br> <br>

                        <a href="{{route('adminInvest')}}" class="btn btn-rose">Cancel Edit</a>

                        <button type="submit" class="btn btn-success pull-right">Update Plan</button>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

@endsection