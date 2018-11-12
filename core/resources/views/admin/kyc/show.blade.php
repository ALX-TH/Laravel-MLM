@extends('layouts.admin')

@section('title', 'Show User Verify Form Data')

@section('content')


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Show Member Profile -
                        <small class="category">With User Verify Form Data</small>
                    </h4>

                    <form>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset($verify->user->profile->avatar)}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group label-floating">

                                    <label  class="control-label" for="name">Full Name</label>
                                    <input id="name" name="name" type="text" value="{{$verify->user->name}}" disabled class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="email">Email Address</label>
                                    <input id="email" name="email" value="{{$verify->user->email}}" type="text" disabled class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group label-floating">
                                    <label  class="control-label" for="occupation">Occupation</label>
                                    <input id="occupation" name="occupation" type="text" value="{{$verify->user->profile->occupation}}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="mobile">Mobile Number</label>
                                    <input id="mobile" name="mobile" type="text" value="{{$verify->user->profile->mobile}}" disabled class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="address">Address Line 1</label>
                                    <input id="address" name="address" value="{{$verify->user->profile->address}}"  type="text" disabled class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="address2">Address Line 2</label>
                                    <input id="address2" name="address2" value="{{$verify->user->profile->address2}}" type="text" disabled class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="city">City</label>
                                    <input id="city" name="city" type="text" value="{{$verify->user->profile->city}}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="state">State</label>
                                    <input id="state" name="state" type="text" value="{{$verify->user->profile->state}}" disabled class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="postcode">Postal Code</label>
                                    <input id="postcode" name="postcode" type="text" value="{{$verify->user->profile->postcode}}" disabled class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="country">Member Country</label>
                                    <input id="country" name="country" type="text" value="{{$verify->user->profile->country}}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="facebookurl">Facebook Profile Url</label>
                                    <input id="facebookurl" name="facebook" type="text" value="{{$verify->user->profile->facebook}}" disabled class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label  class="control-label" for="about">About</label>
                                        <input id="about" name="about" type="text" value="{{$verify->user->profile->about}}" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('adminKycReject',['id'=>$verify->id])}}" class="btn btn-danger">Reject Request</a>
                        <a href="{{route('adminKycAccept',['id'=>$verify->id])}}" class="btn btn-success pull-right">Accept Request</a>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="card card-content">
                    <div class="card-content">
                        <div class="alert alert-primary">
                            <h4 class="card-title text-center"><span>Identity Data</span></h4>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="country">Document Type</label>
                                <input type="text" value="{{$verify->name}}" disabled class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="country">Document Number</label>
                                <input type="text" value="{{$verify->number}}" disabled class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="country">Date of Birth</label>
                                <input type="text" value="{{$verify->dob}}" disabled class="form-control">
                            </div>
                        </div>
                        <br>
                        <h5 class="text-center text-info"> Front Page Photo</h5>

                        <br>


                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="fileinput fileinput-new text-center">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{$verify->front}}" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h5 class="text-center text-info"> Back Page Photo</h5>

                        <br>


                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="fileinput fileinput-new text-center">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{$verify->back}}" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>

@endsection