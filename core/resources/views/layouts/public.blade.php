<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title') | {{config('app.name')}} {{ now()->year }}</title>
    @hasSection('description')<meta name="description" content="@yield('description')"/>@endif
    @hasSection('keywords')<meta name="keywords" content="@yield('keywords')"/>@endif
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css" />
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/material-kit.min3f71.css?v=1.1.1')}}" rel="stylesheet" />
    <link href="{{asset('css/application.css')}}" rel="stylesheet" />
    {{-- <link href="{{asset('css/material-kit.css')}}" rel="stylesheet"/> --}}
</head>

@yield('content')

<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}"></script>
<script src="{{asset('js/nouislider.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script src="{{asset('js/atv-img-animation.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material-kit.min3f71.js?v=1.1.1')}}" type="text/javascript"></script>
{{-- <script src="{{asset('js/material-kit.js')}}" type="text/javascript"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
{{-- Paralax library <script src="//cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script> --}}
<script>hljs.initHighlightingOnLoad();</script>

</html>
