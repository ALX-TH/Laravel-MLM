@extends('layouts.public')
@section('title', 'Latest Promotion Offer, Event & News')
@section('content')

    <body class="section-white">
    <div class="cd-section" id="headers">
        <div class="header-2">
            <nav class="navbar navbar-info navbar-transparent navbar-fixed-top navbar-color-on-scroll">
                @include('includes.public.navbar')
            </nav>
            <div class="page-header header-filter" style="background-image: url('{{asset('img/office2.jpg')}}');">
                <div class="container">
                    <div class="row">


                        @if (Auth::check())

                            <div class="col-md-8 col-md-offset-2 text-center">
                                <h1 class="title"> Write A Testimonials For us!</h1>
                                <h4>Are You Working With US? Are You Love This Site? If You do Then Please Write a Testimonials For US. It will help others user to trust our website. Your Testimonials Shows Auto in our Homepage.</h4>
                            </div>
                            <div class="col-md-10 col-md-offset-1">
                                <div class="col-md-6 col-md-offset-5">
                                    <a href="{{ url('user/testimonial/create') }}" class="btn btn-primary btn-lg">
                                       Write A Review
                                    </a>
                                </div>
                            </div>

                        @else


                            <div class="col-md-8 col-md-offset-2 text-center">
                                <h1 class="title"> You should work with us!</h1>
                                <h4>We have many years experience with operating and participating in successful get-paid-to programs; as such, we have a reputation to keep and will go out of our way to keep members happy! That means reliable payments, quick support and excellent website reliability and uptime.</h4>
                            </div>

                            <div class="col-md-10 col-md-offset-1">
                                <div class="col-md-6 col-md-offset-5">
                                    <a href="{{ route('register') }}" class="btn btn-info btn-lg">
                                        Register Now
                                    </a>
                                </div>
                            </div>

                        @endif


                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="cd-section" id="blogs">

        <div class="blogs-1" id="blogs-1">

            <div class="container">
                <div class="row">

                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="title">Latest News and Promotion </h2>

                        <br />

                        @if($posts)
                            @foreach($posts as $post)

                        <div class="card card-plain card-blog">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card-image">
                                        <img class="img img-raised" src="{{$post->featured ? $post->featured : 'No Photo'}}" />
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <h6 class="category text-primary">{{$post->category ? $post->category->name : 'Uncategorized'}}</h6>

                                    <h3 class="card-title">
                                        <a href="{{route('viewPost', $post->slug)}}">{{$post->title}}</a>
                                    </h3>
                                    <p class="author text-info">
                                        by <b>{{$user->name}}</b>, {{$post->created_at->diffForHumans()}}
                                    </p>
                                    <p class="card-description">{!!str_limit($post->content, 500)!!}</p>

                                    <a href="{{route('viewPost', $post->slug)}}" type="button" rel="tooltip" class="btn btn-rose">
                                        <i class="material-icons">edit</i>
                                        Read More
                                    </a>

                                </div>
                            </div>
                        </div>

                            @endforeach

                        @endif


                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-5">

                                {{$posts->render()}}

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!--     *********    END BLOGS 1      *********      -->
    </div>


    <footer class="footer">


        @include('includes.public.footer')


    </footer>

    @if(config('app.chat'))

        @include('includes.chat')

    @else


    @endif

    </body>

@endsection