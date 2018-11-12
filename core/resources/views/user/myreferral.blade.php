@extends('layouts.dashboard')
@section('title', 'My Referral & Link')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">My Referral</h4>
                <div class="card-content">
                    <br>
                    <div class="table-responsive">
                        <br>

                            <code class="text-center">
                                {{ $link }}
                            </code>
                        @if(count($referrals) > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Membership</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Join Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $id=0;@endphp
                                @foreach($referrals as $referral)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center" width="10%" >
                                            <img src="{{$referral->user->profile->avatar}}" class="img-circle" alt="No Photo"  >
                                        </td>
                                        <td class="text-center">{{$referral->user->name}}</td>
                                        <td class="text-center">{{$referral->user->membership->name}}</td>
                                        <td class="text-center">

                                            @if($referral->user->active == 0)
                                                Not Active
                                            @else
                                                Active
                                            @endif

                                        </td>
                                        <td class="text-center">{{$referral->user->created_at->diffForHumans()}}</td>
                                    </tr>

                                @endforeach


                            </tbody>
                        </table>

                            @else
                            <h1> There is no Refer You have made.</h1>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection