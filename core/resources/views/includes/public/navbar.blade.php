
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{config('app.url')}}"><i class="material-icons">home</i> {{config('app.name')}}</a>
        </div>

        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">

                @if (Auth::guest())
                    <li><a href="{{ url('/blog') }}"> <i class="material-icons">question_answer</i> Latest News</a></li>
                    <li><a href="{{ url('/contact-us') }}"> <i class="material-icons">contact_mail</i> Contact Us</a></li>
                    <li><a href="{{ route('login') }}"> <i class="material-icons">fingerprint</i> Login</a></li>
                    <li><a href="{{ route('register') }}"><i class="material-icons">subscriptions</i> Register</a></li>
                @else
                    <li>
                        <a href="{{ url('/blog') }}">
                            <i class="material-icons">question_answer</i>
                            Latest News
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
                                    <a href="{{ route('userProfile') }}"> <i class="material-icons">explicit</i> Edit Profile </a>
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
