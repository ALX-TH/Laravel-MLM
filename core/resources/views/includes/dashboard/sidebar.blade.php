{{--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
--}}
<div class="logo">
    <a href="#" class="simple-text">
         Member Panel
    </a>
</div>
<div class="logo logo-mini">
    <a href="#" class="simple-text">
        {{config('app.name')}}
    </a>
</div>
<div class="sidebar-wrapper">
    <div class="user">
        <div class="photo">
            <img src="{{asset(Auth::user()->profile->avatar)}}" />
        </div>
        <div class="info">
            <a data-toggle="collapse" href="#UserColl" class="collapsed">
                {{ Auth::user()->name }}
                <b class="caret"></b>
            </a>
            <div class="collapse" id="UserColl">
                <ul class="nav">
                    <li>
                        <a href="{{route('userProfile')}}">Edit Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <ul class="nav">
        <li class="{{ Request::is('user/dashboard') ? "active" :"" }}">
            <a href="{{route('userDashboard')}}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>

        @if($settings->ptc == 1)

        <li class=" {{ Request::is('user/cash/links') ? "active" :"" }}">
            <a href="{{route('userCash.links')}}">
                <i class="material-icons">work</i>
                <p>View Cash Links
                </p>
            </a>
        </li>

        @endif

        @if($settings->ppv == 1)
            <li class=" {{ Request::is('user/cash/videos') ? "active" :"" }}">
                <a href="{{route('userCash.videos')}}">
                    <i class="material-icons">perm_media</i>
                    <p>View Cash Videos
                    </p>
                </a>
            </li>
        @endif

        @if($settings->invest == 1)
            <li class="{{ Request::is('user/investments') ? "active" :"" }}">
                <a href="{{route('userInvestments')}}">
                    <i class="material-icons">insert_chart</i>
                    <p>Investment Plan
                    </p>
                </a>
            </li>
        @endif

        @if($settings->membership_upgrade == 1)
            <li class="{{ Request::is('user/memberships') ? "active" :"" }}">
                <a href="{{route('userMemberships')}}">
                    <i class="material-icons">card_membership</i>
                    <p>Upgrade Membership
                    </p>
                </a>
            </li>
        @endif

        <li class="{{ Request::is('user/deposit/create') ? "active" :"" }}">
            <a href="{{route('userDeposit.create')}}">
                <i class="material-icons">local_atm</i>
                <p>Deposit Balance
                </p>
            </a>
        </li>

        <li class="{{ Request::is('user/withdraws/create') ? "active" :"" }}">
            <a href="{{route('userWithdraw.create')}}">
                <i class="material-icons">money_off</i>
                <p>Withdraw Balance
                </p>
            </a>
        </li>

        <li class="{{ Request::is('user/referrals') ? "active" :"" }}">
            <a href="{{route('userReferrals')}}">
                <i class="material-icons">supervisor_account</i>
                <p>My Referrals & Link
                </p>
            </a>
        </li>

        <li class="{{ Request::is('user/funds/transfer') ? "active" :"" }}">
            <a href="{{route('userFundsTransfer')}}">
                <i class="material-icons">transfer_within_a_station</i>
                <p>Fund Transfer</p>
            </a>
        </li>

        @if($settings->invest == 1)
            <li class="{{ Request::is('user/investments/history') ? "active" :"" }}">
                <a href="{{route('userInvest.history')}}">
                    <i class="material-icons">shop</i>
                    <p>My Investments
                    </p>
                </a>
            </li>
        @endif

        @if($settings->invest == 1)
        <li class="{{ Request::is('user/interests/history') ? "active" :"" }}">
            <a href="{{route('userInterest.history')}}">
                <i class="material-icons">device_hub</i>
                <p>Interests History
                </p>
            </a>
        </li>
        @endif
        <li class="{{ Request::is('user/deposits') ? "active" :"" }}">
            <a href="{{route('userDeposits')}}">
                <i class="material-icons">attach_money</i>
                <p>Deposit History
                </p>
            </a>
        </li>

        <li class="{{ Request::is('user/withdraws') ? "active" :"" }}">
            <a href="{{route('userWithdraws')}}">
                <i class="material-icons">done_all</i>
                <p>Withdraw History
                </p>
            </a>
        </li>
        <li class="{{ Request::is('user/earning/history') ? "active" :"" }}">
            <a href="{{route('userEarns')}}">
                <i class="material-icons">local_mall</i>
                <p>Earning History
                </p>
            </a>
        </li>
    </ul>
</div>