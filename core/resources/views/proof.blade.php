@extends('layouts.public')

@section('title', 'All Latest Withdrawals Request')

@section('content')


    <body class="section-white">
    <div class="cd-section" id="headers">
        <div class="header-1">
            <nav class="navbar navbar-info navbar-transparent navbar-fixed-top navbar-color-on-scroll">
                @include('includes.public.navbar')
            </nav>
            <div class="page-header header-filter" style="background-image: url('{{asset('img/bg12.jpg')}}');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="title">Get Paid to Surf</h1>
                            <h4>Are you ready to start making money online with little effort? We are an ideal get-paid-to website that you can trust. We have been around for a while and we actually pay! Don't waste your time with scam sites, join CronLab PTC today and start earning real cash now!</h4>
                            <br />

                            @if (Auth::check())

                                <a href="#" target="_blank" class="btn btn-success btn-lg">
                                    <i class="fa fa-ticket"></i> View Ads Now
                                </a>

                            @else


                                <a href="{{url('/register')}}" target="_self" class="btn btn-primary btn-lg">
                                    <i class="fa fa-ticket"></i> Join Now
                                </a>


                            @endif

                        </div>

                        @if(env('BLOG_YOUTUBE_EMBED_CODE'))

                            <div class="col-md-5 col-md-offset-1">
                                <div class="iframe-container">
                                    <iframe src="https://www.youtube.com/embed/{{env('BLOG_YOUTUBE_EMBED_CODE')}}?modestbranding=1&amp;autohide=1&amp;showinfo=0" frameborder="0" allowfullscreen height="250"></iframe>
                                </div>
                            </div>

                        @else


                        @endif


                    </div>
                </div>
            </div>

        </div>

        <!--     *********    END HEADER 3      *********      -->
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section section-text">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-rose">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="pull-center nav nav-tabs" data-tabs="tabs">
                                            <li class="active">
                                                <a href="#deposit" data-toggle="tab">
                                                    <i class="material-icons">face</i>
                                                    Latest Withdraws
                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="deposit">

                                        @if(count($withdraws) > 0)
                                            <div class="table-responsive">

                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">SN</th>
                                                        <th class="text-center">Gateway</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Amount</th>
                                                        <th class="text-center">Time</th>
                                                        <th class="text-center">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $id=0;@endphp
                                                    @foreach($withdraws as $withdraw)
                                                        @php $id++;@endphp
                                                        <tr>
                                                            <td class="text-center">{{ $id }}</td>
                                                            <td class="text-center">{{$withdraw->gateway_name}}</td>
                                                            <td class="text-center">{{$withdraw->user->name}}</td>
                                                            <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->amount}}</td>
                                                            <td class="text-center">{{$withdraw->updated_at->diffForHumans()}}</td>

                                                            <td class="actions text-center">
                                                                @if($withdraw->status == 1)
                                                                    <button class="btn btn-success btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                                                        Ok
                                                                    </button>
                                                                @else

                                                                    <button class="btn btn-warning btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">warning</i>
                                        </span>
                                                                        Pending
                                                                    </button>



                                                                @endif






                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>

                                        @else

                                            <h1 class="text-center">No Withdraw Request</h1>
                                        @endif



                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>
                </div>
            </div>



        </div>
    </div>


    <footer class="footer">


        @include('includes.public.footer')


    </footer>

    </body>

@endsection