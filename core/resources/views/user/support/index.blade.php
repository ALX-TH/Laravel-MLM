@extends('layouts.dashboard')

@section('title', 'Your All Support Request')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Your All Support Request</h4>
                <div class="card-content">
                    <br>
                    <br>
                    @if(count($supports) > 0)
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Ticket Number</th>
                                    <th class="text-center">Subject</th>
                                    <th class="text-center">View</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($supports as $support)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center"><code>{{$support->ticket}}</code></td>
                                        <td class="text-center">{{$support->subject}}</td>
                                        <td class="text-center">

                                            <a href="{{route('userSupport.view', $support->ticket)}}" type="button" class="btn btn-info">
                                                <i class="material-icons">search</i> View
                                            </a>


                                        </td>
                                        <td class="text-center">

                                            @if($support->status == 1)
                                                <button class="btn btn-success">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                    Open
                                                </button>

                                            @elseif($support->status == 2)
                                                <button class="btn btn-info">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                    Agent Answered
                                                </button>
                                            @elseif($support->status == 3)
                                                <button class="btn btn-success">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                        </span>
                                                    You Answered
                                                </button>
                                            @elseif($support->status == 0)
                                                <button class="btn btn-danger">
                                                        <span class="btn-label">
                                                            <i class="material-icons">close</i>
                                                        </span>
                                                    Close
                                                </button>

                                            @endif

                                        </td>

                                        <td class="text-center">
                                            @if($support->status > 0)
                                            <a href="{{route('userSupport.close', $support->id)}}" type="button" class="btn btn-danger">
                                                <i class="material-icons">close</i> Close
                                            </a>

                                            @else
                                                <span type="button" class="btn btn-danger" disabled><i class="material-icons">close</i> Close</span>

                                            @endif


                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    @else

                        <h1 class="text-center">No Support Request</h1>
                    @endif

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$supports->render()}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection