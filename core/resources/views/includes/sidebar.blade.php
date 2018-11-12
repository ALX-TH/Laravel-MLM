@php
    $route = Route::currentRouteName();
@endphp

<div class="sidebar" data-active-color="purple" data-background-color="black" data-image="{{asset('img/sidebar-1.jpg')}}">
    {{--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
--}}
    <div class="logo">
        <a href="{{route('adminIndex')}}" class="simple-text logo-mini">
            Admin Panel
        </a>
    </div>

    <div class="sidebar-wrapper">

        <div class="user">
            <div class="photo">
                <img src="{{asset(Auth::user()->profile->avatar)}}" alt="{{ Auth::user()->name }}">
            </div>

            <div class="user-info">
                <a data-toggle="collapse" href="#UserColl" class="username">
                    <span>
                        {{ Auth::user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>

                <div class="collapse" id="UserColl">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        {{-- Sidebar menu --}}
        <ul class="nav">

            <li class="nav-item @if($route == 'adminIndex') active @endif">
                <a class="nav-link" href="{{route('adminIndex')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#UserMail">
                    <i class="material-icons">markunread_mailbox</i>
                    <p>Email System
                        <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="UserMail">
                    <ul class="nav" >
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminEmail')}}">
                                <span class="sidebar-mini"> IN </span>
                                <span class="sidebar-normal"> Inbox </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminEmail.create')}}">
                                <span class="sidebar-mini"> CM </span>
                                <span class="sidebar-normal"> Compose Email </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a data-toggle="collapse" class="nav-link" href="#UserMember">
                    <i class="material-icons">face</i>
                    <p>Member
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="UserMember">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.users.index')}}">All Member</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.user.create')}}">Create Member</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#BlogArea">
                    <i class="material-icons">announcement</i>
                    <p>News Section
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="BlogArea">
                    <ul class="nav">


                        <li class="nav-item">
                            <a data-toggle="collapse" href="#BlogPosts">
                                <i class="material-icons">surround_sound</i>
                                <p>News
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse" id="BlogPosts">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="{{route('admin.posts.index')}}">All News</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('admin.post.create')}}">Create News</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.category.index')}}">
                                <i class="material-icons">build</i>
                                <p>Categories</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.tags.index')}}">
                                <i class="material-icons">perm_media</i>
                                <p>Tags</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#ptcAds">
                    <i class="material-icons">computer</i>
                    <p>PTC Ads
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="ptcAds">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.ptcs.index')}}">All PTC Ads</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.ptc.create')}}">Create PTC Ads</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#ppvAds">
                    <i class="material-icons">video_library</i>
                    <p>PPV Ads
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="ppvAds">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.ppvs.index')}}">All Video Ads</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.ppv.create')}}">Create Video Ads</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#InvestArea">
                    <i class="material-icons">whatshot</i>
                    <p>Investment Section
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="InvestArea">
                    <ul class="nav">


                        <li class="nav-item">
                            <a data-toggle="collapse" href="#PlanArea">
                                <i class="material-icons">surround_sound</i>
                                <p>Plan
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse" id="PlanArea">

                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="{{route('adminInvest')}}">All Plan</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('adminInvest.create')}}">Create Plan</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('adminStyle')}}">
                                <i class="material-icons">build</i>
                                <p>Style</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>




            <li class="nav-item" >
                <a class="nav-link"  href="{{route('admin.gateways.index')}}">
                    <i class="material-icons">call_split</i>
                    <p>Instant Gateways
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#lGateways">
                    <i class="material-icons">transfer_within_a_station</i>
                    <p>Offline Gateway
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="lGateways">
                    <ul class="nav">

                        <li class="nav-item">
                            <a href="{{route('admin.gateways.local')}}">All Local Gateways</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.local.create')}}">Create Local Gateway</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#membership">
                    <i class="material-icons">settings_input_antenna</i>
                    <p>Membership
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="membership">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.memberships.index')}}">All Membership</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.membership.create')}}">Create Membership</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#DepositArea">
                    <i class="material-icons">payment</i>
                    <p>Deposit Area
                        @if (count($deposit_notify) > 0)
                            <span class="badge badge-primary">{{ count($deposit_notify) }}</span>
                        @endif
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="DepositArea">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.users.deposit')}}">System Deposit</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.deposit.local')}}">Deposit Request</a>
                        </li>

                    </ul>
                </div>
            </li>

            {{-- Implemented badges as notification counter --}}
            <li class="nav-item">
                <a data-toggle="collapse" href="#WithdrawArea">
                    <i class="material-icons">account_balance</i>
                    <p>Withdraw Area
                        @if (count($withdraw_notify) > 0)
                            <span class="badge badge-primary">{{ count($withdraw_notify) }}</span>
                        @endif
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="WithdrawArea">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('admin.users.withdraws')}}">
                                Completed Withdraw
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.withdraws.request')}}">
                                Withdraw Request
                                @if (count($withdraw_notify) > 0)
                                    <span class="badge badge-primary">{{ count($withdraw_notify) }}</span>
                                @endif
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" href="#SupportArea">
                    <i class="material-icons">supervisor_account</i>
                    <p>Support Area
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="SupportArea">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('adminSupports.open')}}">All Open Ticket
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('adminSupports.index')}}">All Close Ticket</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#KycArea">
                    <i class="material-icons">supervisor_account</i>
                    <p>KYC Area
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="KycArea">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="{{route('adminKyc')}}">Identity Verify Request
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('adminKyc2')}}">Address Verify Request</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-toggle="collapse" class="nav-link" href="#SiteTool">
                    <i class="material-icons">settings_input_component</i>
                    <p>Website Toolkit
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="SiteTool">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminReview')}}">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminFAQ')}}">Website F.A.Q</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminPages')}}">Website Page</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('websiteSettings')}}">
                    <i class="material-icons">settings</i>
                    <p>Settings
                    </p>
                </a>
            </li>

        </ul>
        {{-- Sidebar menu --}}

    </div>
</div>