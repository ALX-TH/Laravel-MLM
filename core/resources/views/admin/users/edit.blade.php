@extends('layouts.admin')

@section('title', 'Edit Member Profile')

@section('content')


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Edit Member Profile -
                        <small class="category">Complete Member profile</small>
                    </h4>

                    <form action="{{route('admin.user.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
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
                                    <select class="selectpicker" name="admin" data-style="btn btn-warning btn-round" title="Single Select" data-size="7">
                                        <option value="0"
                                                @if($user->admin == 0)
                                                selected
                                                @endif
                                        >Not Admin</option>
                                        <option value="1"
                                                @if($user->admin == 1)
                                                selected
                                                @endif

                                        >Already Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="active" data-style="btn btn-warning btn-round" title="Single Select" data-size="7">
                                        <option value="0"
                                                @if($user->active == 0)
                                                selected
                                                @endif
                                        >Not Active</option>
                                        <option value="1"
                                                @if($user->active == 1)
                                                selected
                                                @endif

                                        > Already Active</option>
                                    </select>
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
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="main_balance">Main Balance</label>
                                    <input id="main_balance" name="main_balance" value="{{$user->profile->main_balance}}" type="number" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="deposit_balance">Deposit Balance</label>
                                    <input id="deposit_balance" name="deposit_balance" value="{{$user->profile->deposit_balance}}"  type="number" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="referral_balance">Referral Balance</label>
                                    <input id="referral_balance" name="referral_balance" value="{{$user->profile->referral_balance}}"  type="number" class="form-control">

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
                    <a href="{{route('admin.users.index')}}" class="btn btn-rose">Cancel Edit</a>
                        <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
