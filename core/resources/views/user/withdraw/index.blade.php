@extends('layouts.dashboard')
@section('title', 'My Withdraw History')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">payment</i>
                </div>
                <br>
                <h4 class="card-title">My Withdraw History</h4>
                <div class="card-content">
                    <br>
                    @if(count($withdraws) > 0)
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center">Transaction Id</th>
                                <th class="text-center">Gateway Name</th>
                                <th class="text-center">Account</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Charge</th>
                                <th class="text-center">Funded Amount</th>
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
                                <td class="text-center">{{$withdraw->transaction_id}}</td>
                                <td class="text-center">{{$withdraw->gateway_name}}</td>
                                <td class="text-center">{{$withdraw->account}}</td>
                                <td class="text-center">$ {{$withdraw->amount +0}}</td>
                                <td class="text-center">$ {{$withdraw->charge+0}}</td>
                                <td class="text-center">$ {{$withdraw->net_amount+0}}</td>
                                @if($withdraw->status == 1)
                                    <td class="text-center">{{$withdraw->updated_at->diffForHumans()}}</td>
                                @else
                                    <td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
                                @endif
                                <td >

                                    @if($withdraw->status == 1)

                                        <button class="btn btn-success">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                            Completed
                                        </button>


                                    @else

                                        <button class="btn btn-warning">
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
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$withdraws->render()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    @if(config('app.chat'))

        @include('includes.chat')

    @else

    @endif

@endsection