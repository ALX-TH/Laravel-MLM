@extends('layouts.admin')

@section('title', 'All User Withdraw Request')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Withdraw Request</h4>
                <div class="card-content">
                    <br>

                    @if(count($withdraws) > 0)

                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Gateway</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Need to Send</th>
                                    <th class="text-center">Account</th>
                                    <th class="text-center">Requested</th>
                                    <th class="text-center">Set As</th>
                                    <th class="text-center">Set As</th>
                                    <th class="text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($withdraws as $withdraw)
                                    @php $id++;@endphp

                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$withdraw->gateway_name}}</td>
                                        <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->amount}}</td>
                                        <td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->net_amount}}</td>
                                        <td class="text-center">{{$withdraw->account}}</td>
                                        <td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
                                        <td class="text-center td-actions">

                                            @if($withdraw->status == 0)

                                                <a href="{{route('admin.withdraw.update', $withdraw->id)}}" type="button" class="btn btn-success">
                                                    <i class="material-icons">edit</i> Complete
                                                </a>
                                            @endif

                                        </td>

                                        <td class="text-center td-actions">

                                            @if($withdraw->status == 0)
                                                <a href="{{route('admin.withdraw.fraud', $withdraw->id)}}" type="button" class="btn btn-warning">
                                                    <i class="material-icons">edit</i> Refund
                                                </a>
                                            @endif

                                        </td>

                                        <td class="text-center td-actions">

                                            @if($withdraw->status == 1)
                                                <button class="btn btn-success btn-sm">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>Completed
                                                </button>

                                            @else

                                                <button class="btn btn-primary btn-sm">
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

@endsection