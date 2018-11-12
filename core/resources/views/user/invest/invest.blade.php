@extends('layouts.dashboard')
@section('title', 'My Investments History')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">payment</i>
                </div>
                <br>
                <h4 class="card-title">My Investments History</h4>
                <div class="card-content">
                    <br>
                    @if(count($investments) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Reference Id</th>
                                    <th class="text-center">Invest Type</th>
                                    <th class="text-center">Interest Rate</th>
                                    <th class="text-center">Interest System</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Start Time</th>
                                    <th class="text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($investments as $investment)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$investment->reference_id}}</td>
                                        <td class="text-center">{{$investment->plan->style->name}}</td>
                                        <td class="text-center">{{$investment->plan->percentage +0}}%</td>
                                        <td class="text-center">{{$investment->plan->style->compound}} Hours Later {{$investment->plan->repeat}} Times</td>
                                        <td class="text-center">{{config('app.currency_symbol')}} {{$investment->amount + 0 }}</td>
                                        <td class="text-center">{{$investment->start_time->diffForHumans()}}</td>
                                        <td >
                                            @if($investment->status == 0)

                                                <button class="btn btn-warning">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                                   Not Started Yet
                                                </button>


                                            @elseif($investment->status == 1)

                                                <button class="btn btn-primary">
                                        <span class="btn-label">
                                            <i class="material-icons">warning</i>
                                        </span>
                                                    Running
                                                </button>
                                            @else
                                                <button class="btn btn-success">
                                        <span class="btn-label">
                                            <i class="material-icons">warning</i>
                                        </span>
                                                    Completed
                                                </button>

                                            @endif



                                        </td>
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

                            {{$investments->render()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection