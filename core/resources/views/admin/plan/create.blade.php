@extends('layouts.admin')

@section('title', 'Create Invest Plan')

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
                        <small class="category">Create Invest Plan</small>
                    </h4>
                    <form action="{{route('adminInvest.post')}}" method="post" enctype="multipart/form-data">

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
                                    <input id="name" name="name" type="text" class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group label-floating">

                                    <select class="selectpicker" name="style_id" data-style="btn btn-warning btn-round" title="Select Style" data-size="7">
                                        @foreach($styles as $style)
                                            <option value="{{$style->id}}"> {{$style->name}} </option>
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
                                    <input id="minimum" name="minimum" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="maximum">Maximum Invest (in {{config('app.currency_code')}})</label>
                                    <input id="maximum" name="maximum" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="percentage">Invest Interest Return (in Percentage)</label>
                                    <input id="percentage" name="percentage" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="repeat">Total Repeat (Interest Return Frequency)</label>
                                    <input id="repeat" name="repeat" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="start_duration">Invest Start Delay (in Hour)</label>
                                    <input id="start_duration" name="start_duration" type="number" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="status" data-style="btn btn-warning btn-round" title="Select Plan Status" data-size="7">
                                        <option value="0">Not Active</option>
                                        <option value="1" >Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br> <br>

                        <a href="{{route('adminInvest')}}" class="btn btn-rose">Cancel Create</a>

                        <button type="submit" class="btn btn-success pull-right">Create Plan</button>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

@endsection