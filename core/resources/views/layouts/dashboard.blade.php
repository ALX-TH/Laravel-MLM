<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{config('app.name')}} - @yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('css/material-dashboard.css')}}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('styles')
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-active-color="blue" data-background-color="white" data-image="{{asset('img/sidebar-1.jpg')}}">
        @include('includes.dashboard.sidebar')
    </div>


    <div class="main-panel">
        @include('includes.dashboard.navbar')
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <footer class="footer">
            @include('includes.dashboard.footer')
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
{{--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput --}}
<script src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
{{--  Full Calendar Plugin    --}}
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
{{-- TagsInput Plugin --}}
<script src="{{asset('js/jquery.tagsinput.js')}}"></script>
{{-- Material Dashboard javascript methods --}}
<script src="{{asset('js/material-dashboard.js')}}"></script>
{{-- Material Dashboard DEMO methods, don't include it in your project! --}}
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>

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
<script type="text/javascript">
    $(document).ready(function() {
        demo.initDashboardPageCharts();
        demo.initVectorMap();
    });

</script>
</html>