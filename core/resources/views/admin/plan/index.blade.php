@extends('layouts.admin')


@section('title', 'View All Invest Plan')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">
                    All Invest Plan
                    <a href="{{route('adminInvest.create')}}" type="button" class="btn btn-info btn-sm btn-round">
                        <i class="material-icons">add</i>
                    </a>
                </h4>
                <div class="card-content">
                    <br>

                    @if(count($plans) > 0)

                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Minimum</th>
                                    <th class="text-center">Maximum</th>
                                    <th class="text-center">Interest</th>
                                    <th class="text-center">Interest System</th>
                                    <th class="text-center">Start Time</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Reinvestment</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php $id=0;@endphp
                                @foreach($plans as $plan)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$plan->name}}</td>
                                        <td class="text-center">{{$plan->style->name}}</td>
                                        <td class="text-center">{{config('app.currency_symbol')}} {{$plan->minimum + 0}}</td>
                                        <td class="text-center">{{config('app.currency_symbol')}} {{$plan->maximum + 0}}</td>
                                        <td class="text-center">{{$plan->percentage}}%</td>
                                        <td class="text-center">{{$plan->style->compound}} Hours Later {{$plan->repeat}} Times</td>
                                        <td class="text-center">{{$plan->start_duration}} Hours After Invest</td>
                                        <td class="text-center">{{$plan->status == 1 ? 'Active':'Not Active'}}</td>
                                        <td class="text-center">{{$plan->availability_reinvestment == 1 ? 'Enabled':'Disabled'}}</td>
                                        <td class="text-center">
                                            <a href="{{route('adminInvest.edit', $plan->id)}}" type="button" class="btn btn-success">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('adminInvest.delete', $plan->id)}}" type="button" class="btn btn-danger">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>

                        </div>

                    @else

                        <h1 class="text-center">No Invest Plan Found</h1>

                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
