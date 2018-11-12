@extends('layouts.dashboard')
@section('title', 'My Earning History')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">payment</i>
                </div>
                <br>
                <h4 class="card-title">My Earning History</h4>
                <div class="card-content">
                    <br>
                    @if(count($earns) > 0)
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Transaction Id</th>
                                    <th class="text-center">Source</th>
                                    <th class="text-center">From</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Details</th>
                                    <th class="text-center">Add Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($earns as $log)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$log->reference}}</td>
                                        <td class="text-center">{{$log->for}}</td>
                                        <td class="text-center">{{$log->from}}</td>
                                        <td class="text-center">{{config('app.currency_symbol')}} {{$log->amount + 0}}</td>
                                        <td class="text-center">{{$log->details}}</td>
                                        <td class="text-center">{{$log->created_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    @else

                        <h1 class="text-center">No Earning History</h1>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$earns->render()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection