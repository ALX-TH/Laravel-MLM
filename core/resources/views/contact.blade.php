@extends('layouts.public')

@section('title', 'Contact Us')

@section('content')
    <body>
            <nav class="navbar navbar-info navbar-transparent navbar-fixed-top navbar-color-on-scroll">
                @include('includes.public.navbar')
            </nav>

            <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('{{asset('img/bg2.jpg')}}');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="title">About & Contact With US</h1>
                            <h4>Our service consists of allowing advertisers to reach thousands of potential customers by displaying their advertisement(s) on our site and users to earn money by viewing those advertisements.</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main main-raised">
                <div class="container">
                    <div class="section text-center">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h2 class="title">Let's talk About Us</h2>
                                <h5 class="description">CronLab PTC is an online rewards website for those looking to earn extra money from all over the world. Founded in 2007, as a paid-to-click website, CronLab PTC has since changed its business model and has become an industry leader in providing an easy way for its members to earn extra money from multiple sources. CronLab PTC has paid out more than $26 million to its members and continues to grow.</h5>
                            </div>
                        </div>

                        <div class="features">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="info">
                                        <div class="icon icon-info">
                                            <i class="material-icons">pin_drop</i>
                                        </div>
                                        <h4 class="info-title">About System</h4>
                                        <p>We have created a platform that will help people gain funds to support their cause whether it’s to support a women’s shelter, pay for unexpected medical bills, get funds for a special project or the many other worthy causes in this world.</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="info">
                                        <div class="icon icon-success">
                                            <i class="material-icons">verified_user</i>
                                        </div>
                                        <h4 class="info-title">Verified Company</h4>
                                        <p>Cronlab PTC got stronger and developed gaining public fame. And in 2017, the Board of Directors decided to create an International Corporation all over the world via the Internet! Never before has the investment process been so simple and profitable!</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="info">
                                        <div class="icon icon-danger">
                                            <i class="material-icons">business_center</i>
                                        </div>
                                        <h4 class="info-title">Legal Information</h4>
                                        <p>Cronlab PTC Limited is the official registered company in the United Kingdom. With its help, you can anytime check whether the company is legitimate. Company No.: #10896754</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                @if(count($faqs) > 0)

                <div class="container">
                    <div class="section text-center">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h3 class="title">Before Create Ticket or Contact Us See Frequently Ask Questions (F.A.Q) below</h3>
                                    </div>
                        </div>

                        <div class="features">
                            <div class="row">

                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                    @foreach($faqs as $faq)
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading{{$faq->id}}">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                                                <h4 class="panel-title">
                                                    {{$faq->title}}
                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                </h4>
                                            </a>
                                        </div>
                                        <div id="collapse{{$faq->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$faq->id}}">
                                            <div class="panel-body">
                                                {!! Markdown::convertToHtml($faq->content) !!}
                                            </div>
                                        </div>
                                    </div>

                                        @endforeach

                                </div>


                            </div>
                        </div>
                    </div>

                </div>
@endif





            <div class="cd-section" id="contactus">
            <div class="contactus-1 section-image" style="background-image: url('{{asset('img/city.jpg')}}')">

                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <h2 class="title">Get in Touch</h2>
                            <h5 class="description">Our support team will always be working 24/7 to provide you the best support possible. They will try to answer your queries as soon as they can and will always be there to help you out in your journey with us.</h5>
                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="material-icons">pin_drop</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Find us at the office</h4>
                                    <p> Bld Mihail Kogalniceanu, nr. 8,<br>
                                        7652 Bucharest,<br>
                                        Romania
                                    </p>
                                </div>
                            </div>
                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="material-icons">phone</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Give us a ring</h4>
                                    <p> Michael Jordan<br>
                                        +40 762 321 762<br>
                                        Mon - Fri, 8:00-22:00
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-5 col-md-offset-2">
                            <div class="card card-contact">

                                @auth

                                    <form action="{{route('userSupport.post')}}" role="form" id="contact-form"  method="POST">

                                        {{csrf_field()}}

                                        <div class="header header-raised header-primary text-center">
                                            <h4 class="card-title">Contact Us</h4>

                                        </div>
                                        <div class="card-content">
                                            @if(count($errors) > 0)
                                                <div class="alert alert-danger alert-with-icon" data-notify="container">
                                                    <i class="material-icons" data-notify="icon">notifications</i>
                                                    <span data-notify="message">
                                                        @foreach($errors->all() as $error)
                                                            <li><strong> {{$error}} </strong></li>
                                                        @endforeach
                                                    </span>
                                                </div>
                                                <br>
                                            @endif
                                            <p class="category text-center text-info">
                                                Dear user, You see the box below? This message box supported HTML Tag & Markdown Content. For more details click : <br><br>
                                                <a href="https://summernote.org/" target="_blank">HTML Editor</a>  <br>
                                                <a href="https://dillinger.io/" target="_blank">Markdown Editor</a>  <br>

                                            </p>
                                            <br>
                                            <div class="form-group label-floating">
                                                <label for="subject" class="control-label">Subject</label>
                                                <input type="text" id="subject" name="subject" class="form-control">
                                            </div>
                                            <br>

                                            <br>
                                            <div class="form-group label-floating">
                                                <label for="message" class="control-label">Your message</label>
                                                <textarea name="body" class="form-control" id="message" rows="20"></textarea>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary pull-right">Send Message</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>


                                @endauth

                                @guest
                                        <form action="{{route('GuestEmail')}}" role="form" id="contact-form"  method="POST">

                                            {{csrf_field()}}

                                            <div class="header header-raised header-primary text-center">
                                                <h4 class="card-title">Contact Us</h4>

                                            </div>
                                            <div class="card-content">

                                                @if (session()->has('message'))
                                                    <div class="alert alert-{!! session()->get('type')  !!}">
                                                        <span class="text-center">{!! session()->get('title')  !!}</span>
                                                        <br>
                                                        <span>{!! session()->get('message')  !!}</span>
                                                    </div>
                                                @endif



                                                @if(count($errors) > 0)
                                                    <div class="alert alert-danger alert-with-icon" data-notify="container">
                                                        <i class="material-icons" data-notify="icon">notifications</i>
                                                        <span data-notify="message">
                                                        @foreach($errors->all() as $error)
                                                                <li><strong> {{$error}} </strong></li>
                                                            @endforeach
                                                    </span>
                                                    </div>
                                                    <br>
                                                @endif
                                                <p class="category text-center text-info">
                                                    Dear user, You see the box below? This message box supported HTML Tag & Markdown Content. For more details click : <br><br>
                                                    <a href="https://summernote.org/" target="_blank">HTML Editor</a>  <br>
                                                    <a href="https://dillinger.io/" target="_blank">Markdown Editor</a>  <br>

                                                </p>
                                                <br>
                                                    <div class="form-group label-floating">
                                                        <label for="subject" class="control-label">Subject</label>
                                                        <input type="text" id="subject" name="subject" class="form-control">
                                                    </div>
                                                <br>
                                                    <div class="form-group label-floating">
                                                        <label for="name" class="control-label">Your Full Name</label>
                                                        <input type="text" id="name" name="name" class="form-control">
                                                    </div>
                                                <br>
                                                    <br>
                                                    <div class="form-group label-floating">
                                                        <label for="email" class="control-label">Your Email Address</label>
                                                        <input type="email" id="email" name="email" class="form-control">
                                                    </div>
                                                    <br>
                                                <div class="form-group label-floating">
                                                    <label for="message" class="control-label">Your message</label>
                                                    <textarea name="body" class="form-control" id="message" rows="20"></textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary pull-right">Send Message</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                @endguest


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
    <footer class="footer">


        @include('includes.public.footer')


    </footer>

            @if($settings->live_chat == 1)

                @include('includes.chat')
            @endif

    </body>

@endsection