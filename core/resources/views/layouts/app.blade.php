<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('title') | {{config('app.name')}}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    {{-- Fonts and icons --}}
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    {{-- CSS Files --}}
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/material-kit.min3f71.css?v=1.1.1')}}" rel="stylesheet"/>
    <link href="{{asset('css/material-dashboard.css')}}" rel="stylesheet" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="login-page">

<div class="cd-section" id="headers">
    <div class="header-3">
        <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">{{config('app.name')}}</a>
                </div>

                <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">

                            @if (Auth::guest())
                                <li><a href="{{ url('/blog') }}"> <i class="material-icons">question_answer</i> Blog</a></li>
                                <li><a href="{{ url('/contact-us') }}"> <i class="material-icons">contact_mail</i> Contact Us</a></li>
                                <li><a href="{{ route('login') }}"> <i class="material-icons">fingerprint</i> Login</a></li>
                                <li><a href="{{ route('register') }}"><i class="material-icons">subscriptions</i> Register</a></li>
                            @else
                                <li>
                                    <a href="{{ url('/blog') }}">
                                        <i class="material-icons">question_answer</i>
                                        Blog
                                    </a>
                                </li>

                                <li><a href="{{ url('/contact-us') }}"> <i class="material-icons">contact_mail</i> Contact Us</a></li>
                                <li>
                                    <a href="{{ url('/user/dashboard') }}"> <i class="material-icons">dashboard</i> Dashboard </a>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                            {{ Auth::user()->name }}
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{route('subscriber.runsetup', Auth::user()->id)}}"> <i class="material-icons">recent_actors</i> My Profile </a>
                                            </li>
                                            <li>
                                                <a href="{{route('subscriber.runsetup', Auth::user()->id)}}"> <i class="material-icons">explicit</i> Edit Profile </a>
                                            </li>
                                            <li>
                                                <a href="#"> <i class="material-icons">usb</i> Settings </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="material-icons">https</i>
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                        </ul>

                </div>
            </div>
        </nav>

    </div>

</div>

<div class="page-header header-filter" style="background-image: url('{{asset('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">
        @yield('content')




<footer class="footer">
    @include('includes.public.footer')
</footer>
</div>
</body>

<!--   Core JS Files   -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}"></script>


<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
<script src="{{asset('js/nouislider.min.js')}}" type="text/javascript"></script>

<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
<script src="{{asset('js/moment.min.js')}}"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
<script src="{{asset('js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>

<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
<script src="{{asset('js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
<script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
<script src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
<!--    Plugin for 3D images animation effect, full documentation here: https://github.com/drewwilson/atvImg    -->
<script src="{{asset('js/atv-img-animation.js')}}" type="text/javascript"></script>

<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
<script src="{{asset('js/material-kit.min3f71.js?v=1.1.1')}}" type="text/javascript"></script>

</html>