<!--     *********     HEADER 3      *********      -->
<div class="carousel-inner">
    <div class="item active">
        <div class="page-header header-filter" style="background-image: url('{{asset('img/dg1.jpg')}}');">

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-left">
                        <h1 class="title">Wellcome to {{config('app.name')}}</h1>
                        <h4>Now This Time Paid Way a global investment company based in the United Kingdom. Registration number of our company - 10874403 </h4>
                        <br />

                        <div class="buttons">

                            @if(Auth::guest())

                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                                Register Now
                            </a>

                            @else

                                <a href="" class="btn btn-info btn-lg">
                                   View Ads Now
                                </a>

                            @endif


                            <a href="#" class="btn btn-just-icon btn-white btn-simple btn-lg">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-just-icon btn-white btn-simple btn-lg">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#" class="btn btn-just-icon btn-white btn-simple btn-lg">
                                <i class="fa fa-get-pocket"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="item">
        <div class="page-header header-filter" style="background-image: url('{{asset('img/dg2.jpg')}}');">

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-left">
                        <h1 class="title">High Income with Low Investment Risk</h1>
                        <h4>A simple and affordable way to increase your wealth by investing a small sum of money. Profit is calculated on weekdays and reinvested to increase your principal deposit and the overall profit. Profits and principal deposit are paid out at the end of the investment period.</h4>
                        <br />
                        <h6>Connect with us on:</h6>
                        <div class="buttons">
                            <a href="#" class="btn btn-just-icon btn-white btn-simple btn-lg">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-just-icon btn-white btn-simple btn-lg">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#" class="btn btn-just-icon btn-white btn-simple btn-lg">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a href="#" class="btn btn-just-icon btn-white btn-simple btn-lg">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="item">
        <div class="page-header header-filter" style="background-image: url('{{asset('img/dg3.jpg')}}');">

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-left">
                        <h1 class="title">Up To 10 Level Referral Comission</h1>
                        <h4>You can also receive additional income on our website using our lucrative referral program. For every user signed up under your referral link, you will receive 5% of whatever they deposit.</h4>
                        <br />

                        <div class="buttons">
                            <a href="#" class="btn btn-white btn-simple btn-lg">
                                <i class="material-icons">share</i> Share Offer
                            </a>

                            @if(Auth::guest())
                            <a href="{{ route('login') }}" class="btn btn-warning btn-lg">
                                <i class="material-icons">account_box</i> Login Now
                            </a>
                            @else
                                <a href="" class="btn btn-rose btn-lg">
                                    <i class="material-icons">account_box</i> My Referrals
                                </a>
                            @endif

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>