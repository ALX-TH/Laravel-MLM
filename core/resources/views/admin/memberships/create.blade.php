@extends('layouts.admin')

@section('title', 'Create New Membership')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Membership Section -
                        <small class="category">Create New Membership</small>
                    </h4>
                    <form action="{{route('admin.membership.store')}}" method="post">

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
                                <label  class="control-label" for="name">Membership Name</label>
                                <input id="name" name="name" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="duration">Membership Duration</label>
                                <input id="duration" name="duration" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="price">Membership Price</label>
                                    <input id="price" name="price" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="ad_limit">Daily User Ad Limit</label>
                                    <input id="ad_limit" name="ad_limit" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="details">Membership Details</label>
                                <textarea class="form-control" name="details" id="details" rows="10"></textarea>

                            </div>
                        </div>
                    </div>

                    <br>


                    <a href="{{route('admin.memberships.index')}}" class="btn btn-rose">Cancel Membership</a>

                        <button type="submit" class="btn btn-success pull-right">Create Membership</button>

                    <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection