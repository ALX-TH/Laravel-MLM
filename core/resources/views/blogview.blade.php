@extends('layouts.public')

@section('title', $post->title)

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
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section section-text">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <article>
                            <h2 class="title">{{$post->title}}</h2>
                            <span class="content-publish-time"><i class="fa fa-clock-o"></i> Last Update {{$post->updated_at->diffForHumans()}}</span></p>
                            <div class="card card-profile card-atv">
                                <div class="card-image">
                                    <a href="{{$post->featured}}">
                                        <div class="atvImg">
                                            <img class="img" src="{{$post->featured}}" />
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <h5 class="description" itemprop="articleBody">{!! $post->content !!}</h5>
                        </article>

                    </div>
                </div>
            </div>
            <div class="section section-blog-info">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="blog-tags">
                                    Category:
                                    <span class="label label-primary">{{$post->category->name}}</span>
                                </div>
                            </div>

                        </div>

                        <hr />

                        <div class="card card-profile card-plain">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="card-avatar">
                                        <a href="#">
                                            <img class="img" src="{{$user->profile->avatar}}">
                                        </a>
                                        <div class="ripple-container"></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="card-title">{{$user->name}}</h4>
                                    <p class="description">{{$user->profile->about}}</p>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary pull-right btn-round">

                                        @if($user->admin == 1)
                                            Admin
                                            @else
                                            Vip User
                                        @endif

                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="section section-comments">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="media-area">
                            <h3 class="title text-center">Comments</h3>

                            @if($settings->disqus)
                                @include('includes.disqus')
                            @else

                                <h1> In order to get comment. Please configure setting first.</h1>


                            @endif



                        </div>

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