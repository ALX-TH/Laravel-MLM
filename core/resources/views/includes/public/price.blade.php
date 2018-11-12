@if (count($plans))

    {{-- Invests heading title --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2 class="title">Choose your desire Plan to invest</h2>
                <h5 class="description">Our all Payouts are fully Automatic , Here no withdrawal required, our system automatically sent the profit direct to your account through which you was Invested Here.</h5>
                <div class="section-space"></div>
            </div>
        </div>

        <div class="row">
        @forelse($plans as $plan)

                <div class="col-md-4">
                    <div class="card card-pricing card-raised">
                        <div class="card-content content-info">
                            <h6 class="category text-info">{{ $plan->name }}</h6>
                            <h1 class="card-title">
                                <small>{{config('app.currency_symbol')}} </small>

                                @foreach(explode('.', $plan->minimum) as $minimum)
                                    <span>
                                    @if ($loop->first)
                                            {{ $minimum }}
                                            {{--
                                            @else
                                                Вывод копеек в минимальной цене вклада
                                                <small>{{ $minimum }}</small>
                                             --}}
                                        @endif

                                    </span>
                                @endforeach

                                @if($plan->maximum)
                                        -
                                    @foreach(explode('.', $plan->maximum) as $maximum)
                                            <span>
                                                @if ($loop->first)
                                                        {{ $maximum }}
                                                    {{--
                                                    @else
                                                        Вывод копеек в максимальной цене вклада
                                                        <small>{{ $maximum }}</small>
                                                    --}}
                                                @endif
                                            </span>
                                    @endforeach
                                @else
                                @endif

                            </h1>

                            <ul>
                                <li><b>{{ $plan->percentage }}%</b> Money Return</li>
                                <li>{{ $plan->style->name }} withdraw</li>
                                <li>Deposit Included In Payment</li>
                                <li>Reinvestment Available</li>
                                <li>Profit Accrual 7 Days Week</li>
                            </ul>
                            @if(Auth::guest())
                                <a href="{{route('register')}}" class="btn btn-white btn-round">
                                    Get Started
                                </a>
                            @else
                                <a href="{{ route('userInvestments', []) }}" class="btn btn-white btn-round">
                                    Get Started
                                </a>
                            @endif
                        </div>
                    </div>
                </div>


        @empty
        @endforelse
        </div>

    </div>
@else
    {{-- Plans list empty --}}
@endif