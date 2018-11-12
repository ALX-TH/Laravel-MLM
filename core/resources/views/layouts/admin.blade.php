<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{config('app.dev_name')}} - @yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    {{-- Bootstrap core CSS     --}}
    {{--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />--}}
    {{--  Material Dashboard CSS    --}}
    {{-- <link href="{{asset('css/material-dashboard.css')}}" rel="stylesheet" /> --}}

    <link href="{{asset('frontend/release/admin/css/material-dashboard.min.css')}}" rel="stylesheet" />

    {{--  CSS for Demo Purpose, don't include it in your project     --}}
    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />
    {{--     Fonts and icons     --}}
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('styles')
</head>

<body class="">
<div class="wrapper">

    @include('includes.sidebar')

    <div class="main-panel">
        <nav class="navbar navbar-info  navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/user/dashboard') }}"> Go To User Dashboard </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
                                        {{ Auth::user()->name }}
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="material-icons">power_settings_new</i>
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <footer class="footer">
            @include('includes.dfooter')
        </footer>

    </div>

</div>

</body>

{{--   Core JS Files   --}}
<script src="{{asset('js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
{{-- Forms Validations Plugin --}}
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
{{--  Plugin for Date Time Picker and Full Calendar Plugin--}}
<script src="{{asset('js/moment.min.js')}}"></script>
{{--  Charts Plugin --}}
<script src="{{asset('js/chartist.min.js')}}"></script>
{{--  Plugin for the Wizard --}}
<script src="{{asset('js/jquery.bootstrap-wizard.js')}}"></script>
{{--  Notifications Plugin    --}}
<script src="{{asset('js/bootstrap-notify.js')}}"></script>
{{--   Sharrre Library    --}}
<script src="{{asset('js/jquery.sharrre.js')}}"></script>
{{-- DateTimePicker Plugin --}}
<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
{{-- Vector Map plugin --}}
<script src="{{asset('js/jquery-jvectormap.js')}}"></script>
{{-- Sliders Plugin --}}
<script src="{{asset('js/nouislider.min.js')}}"></script>
{{-- Select Plugin --}}
<script src="{{asset('js/jquery.select-bootstrap.js')}}"></script>
{{--  DataTables.net Plugin    --}}
<script src="{{asset('js/jquery.datatables.js')}}"></script>
{{-- Sweet Alert 2 plugin --}}
<script src="{{asset('js/sweetalert2.js')}}"></script>

<script>
    @if (session()->has('message'))
    swal({
        title: "{!! session()->get('title')  !!}",
        text: "{!! session()->get('message')  !!}",
        type: "{!! session()->get('type')  !!}",
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        confirmButtonText: "OK"
    });
    @endif
</script>

{{--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput --}}
<script src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
{{--  Full Calendar Plugin  --}}
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
{{-- TagsInput Plugin --}}
<script src="{{asset('js/jquery.tagsinput.js')}}"></script>
{{-- Material Dashboard javascript methods --}}
<script src="{{asset('js/material-dashboard.js')}}"></script>
{{-- Material Dashboard DEMO methods, don't include it in your project! --}}
{{--<script src="{{asset('js/demo.js')}}"></script>--}}
<script src="{{asset('frontend/release/admin/js/material-dashboard.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        demo.initDashboardPageCharts();
        demo.initVectorMap();
    });

</script>
@yield('scripts')
</html>