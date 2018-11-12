@extends('layouts.dashboard')
@section('title', 'My Investments Interest History')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">payment</i>
                </div>
                <br>
                <h4 class="card-title">My Investments Interest History</h4>
                <div class="card-content">
                    <br>
                    @if(count($logs) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Reference Id</th>
                                    <th class="text-center">Invest Type</th>
                                    <th class="text-center">Interest Rate</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Process Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($logs as $log)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$log->reference_id}}</td>
                                        <td class="text-center">{{$log->invest->plan->style->name}}</td>
                                        <td class="text-center">{{$log->invest->plan->percentage +0}}%</td>
                                         <td class="text-center">{{config('app.currency_symbol')}} {{$log->amount + 0 }}</td>
                                        <td class="text-center">{{$log->created_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    @else

                        <h1 class="text-center">No Don't Have any Investment Yet</h1>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$logs->render()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection