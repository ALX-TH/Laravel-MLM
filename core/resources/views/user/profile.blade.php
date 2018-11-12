@extends('layouts.dashboard')

@section('title', 'Edit Member Profile')

@section('content')


    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">My Profile -
                        <small class="category">Edit Your profile</small>
                    </h4>

                    <form action="{{route('userProfile.update')}}" method="post" enctype="multipart/form-data">
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

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset($user->profile->avatar)}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="avatar" />
                                                    </span>
                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group label-floating">

                                    <label  class="control-label" for="name">Full Name</label>
                                    <input id="name" name="name" type="text" value="{{$user->name}}" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="email">Email Address</label>
                                    <input id="email" name="email" value="{{$user->email}}" type="text" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group label-floating">
                                    <label  class="control-label" for="occupation">Occupation</label>
                                    <input id="occupation" name="occupation" type="text" value="{{$user->profile->occupation}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="mobile">Mobile Number</label>
                                    <input id="mobile" name="mobile" type="text" value="{{$user->profile->mobile}}" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="address">Address Line 1</label>
                                    <input id="address" name="address" value="{{$user->profile->address}}"  type="text" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="address2">Address Line 2</label>
                                    <input id="address2" name="address2" value="{{$user->profile->address2}}" type="text" class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="city">City</label>
                                    <input id="city" name="city" type="text" value="{{$user->profile->city}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="state">State</label>
                                    <input id="state" name="state" type="text" value="{{$user->profile->state}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="postcode">Postal Code</label>
                                    <input id="postcode" name="postcode" type="text" value="{{$user->profile->postcode}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="country">Member Country</label>
                                    <input id="country" name="country" type="text" value="{{$user->profile->country}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="facebookurl">Facebook Profile Url</label>
                                    <input id="facebookurl" name="facebook" type="text" value="{{$user->profile->facebook}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <span class="text-warning"> Leave Blank if you don't want change password</span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="password">New Password</label>
                                    <input id="password" name="password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="password-confirm">Confirm New Password</label>
                                    <input id="password-confirm" name="password_confirmation" type="password" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <span class="text-warning"> Leave Blank if you don't want change password</span>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group label-floating">
                                        <label  class="control-label" for="about">About</label>
                                        <input id="about" name="about" type="text" value="{{$user->profile->about}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <span class="text-danger"> Type your current password to save changes </span>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="current_password">Current Password</label>
                                    <input id="current_password" name="current_password" type="password" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <span class="text-danger"> Type your current password to save changes</span>
                            </div>

                        </div>
                        <br>
                        <a href="{{route('userDashboard')}}" class="btn btn-rose">Cancel Edit</a>
                        <button type="submit" class="btn btn-success pull-right">Update Profile</button>
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
                            <h4 class="card-title text-center"><span>KYC Verify Status</span></h4>
                        </div>
                        <br>
                        @if(count($identity) == 0 and count($address) == 0)
                        <h5 class="card-title"><span class="text-danger">Identity Verify:   </span> <span class="btn btn-info btn-sm">Not Yet Submit</span></h5>
                        <br>
                        <h5 class="card-title"><span class="text-danger">Address Verify:    </span><span class="btn btn-info btn-sm">Not Yet Submit</span></h5>
                        <br>
                        <a href="{{route('userKyc')}}" class="btn btn-success center-block">Submit Verification</a>

                        @else
                            <h5 class="card-title"><span class="text-danger">Identity Verify:   </span>
                                    @if($result1)
                                        @if($result1->status == false)
                                        <span class="btn btn-warning btn-sm">Under Review</span>
                                        @else
                                        <span class="btn btn-success btn-sm">Approved</span>
                                        @endif
                                    @else
                                    <span class="btn btn-info btn-sm">Not Yet Submit</span>
                                    @endif
                            </h5>
                            <br>
                            <h5 class="card-title"><span class="text-danger">Address Verify:    </span>

                                @if($result2)
                                    @if($result2->status == false)
                                        <span class="btn btn-warning btn-sm">Under Review</span>
                                    @else
                                        <span class="btn btn-success btn-sm">Approved</span>
                                    @endif
                                @else
                                    <span class="btn btn-info btn-sm">Not Yet Submit</span>
                                @endif
                            </h5>
                            <br>

                            @if(count($identity) == 0 or count($address) == 0)

                                <a href="{{route('userKyc')}}" class="btn btn-success center-block">Submit Verification</a>

                            @elseif(count($identity) == 1 and count($address) == 1)


                            @endif


                    @endif
                    </div>

                </div>
            </div>


        </div>



    </div>

@endsection
