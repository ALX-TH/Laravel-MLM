<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{$advert->ptc->title}} - View Advertisement | {{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    {{--     Fonts and icons     --}}
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- CSS Files --}}
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/material-kit.min3f71.css?v=1.1.1')}}" rel="stylesheet" />
    <link href="{{asset('css/material-kit.css')}}" rel="stylesheet"/>
    <style>
        #myProgress {
            width: 100%;
            background-color: #ddd;
            margin-top: 10px;
        }

        #myBar {
            width: 10%;
            height: 30px;
            background-color: #00bcd4;
            text-align: center;
            line-height: 30px;
            color: white;
        }
    </style>
</head>


<body>

<nav class="navbar navbar-primary">
    <div class="container">
        <div class="navbar-header">
        </div>
        <div class="container">
             <div class="col-md-4">
                 <div id="myProgress">
                       <div id="myBar">0%</div>
                 </div>
             </div>
              <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                      <a type="button" id="confirm" class="btn btn-danger" disabled>
                          Viewing Ads
                      </a>
                  </li>
              </ul>
        </div>

    </div>
</nav>

<script>
    function move() {
        var elem = document.getElementById("myBar");
        var width = 0;
        var id = setInterval(frame,{{$advert->ptc->duration *10}});
        function frame() {
            if (width >= 100) {

                var confirmButton = document.getElementById("confirm");
                confirmButton.className = "btn btn-success";
                confirmButton.innerHTML = "Confirm Earn";
                confirmButton.removeAttribute('disabled');
                confirmButton.setAttribute('href','{{route('userCashLink.confirm',['id'=>$advert->id])}}');
                clearInterval(id);

            } else {
                width++;
                elem.style.width = width + '%';
                elem.innerHTML = width * 1  + '%';
            }
        }
    }
    window.onload = move;
</script>
    <iframe src="{{$advert->ptc->ad_link}}" style="border: 0; position:absolute; top: 14%; left:0; right:0; bottom:0; width:100%; height:100%"></iframe>

</body>
{{--   Core JS Files   --}}
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}"></script>

{{--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   --}}
<script src="{{asset('js/nouislider.min.js')}}" type="text/javascript"></script>

{{--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   --}}
<script src="{{asset('js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>

{{--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   --}}
<script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>

{{--    Plugin for 3D images animation effect, full documentation here: https://github.com/drewwilson/atvImg    --}}
<script src="{{asset('js/atv-img-animation.js')}}" type="text/javascript"></script>

{{--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    --}}
<script src="{{asset('js/material-kit.min3f71.js?v=1.1.1')}}" type="text/javascript"></script>
<script src="{{asset('js/material-kit.js')}}" type="text/javascript"></script>
</html>