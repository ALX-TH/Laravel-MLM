
@extends('layouts.app')
@section('title', 'Sign Up For Earn Cash')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">

                    <div class="header header-info text-center">
                        <h4 class="card-title">Sign Up For Full Features</h4>
                        <div class="social-line">
                            <a href="{{route('social.auth', ['provider'=>'facebook'])}}" class="btn btn-just-icon btn-simple">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="" class="btn btn-just-icon btn-simple">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="" class="btn btn-just-icon btn-simple">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                    <p class="description text-center">Or Be Classical</p>
                    <div class="row">
                        <div class="card-content">

                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">

                            {{ csrf_field() }}

                            <div class="card-content">
                                <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
											<span class="input-group-addon">
												<i class="material-icons">face</i>
											</span>
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="name">Full Name</label><input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>

                                <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
											<span class="input-group-addon">
												<i class="material-icons">email</i>
											</span>
                                    <div class="form-group label-floating">
                                    <label class="control-label" for="email">Email Address</label><input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>

                                <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
											<span class="input-group-addon">
												<i class="material-icons">lock_outline</i>
											</span>
                                    <div class="form-group label-floating">
                                    <label class="control-label" for="password">Password</label><input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">lock_outline</i>
											</span>
                                    <div class="form-group label-floating">
                                    <label class="control-label" for="password-confirm">Password Confirm</label><input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <!-- If you want to add a checkbox to this form, uncomment this code -->

                                {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                {{--<input type="checkbox" name="optionsCheckboxes" checked>--}}
                                {{--I agree to the <a href="#something">terms and conditions</a>.--}}
                                {{--</label>--}}
                                {{--</div>--}}
                            </div>
                            <div class="input-group col-md-3 col-md-offset-2">

                                {!! Recaptcha::render() !!}

                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-info">
                                    <i class="material-icons">input</i> Register Now
                                </button>

                                <a class="btn btn-warning" href="{{ route('login') }}">
                                    <i class="material-icons">warning</i> Already Account? Login Here
                                </a>
                            </div>
                        </form>
                    </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
