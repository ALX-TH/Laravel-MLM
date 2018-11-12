@extends('layouts.admin')

@section('title', 'All Email From Outside')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">All Email From Outside</h4>
                <div class="card-content">
                    <br>

                    @if(count($inboxes) > 0)

                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Subject</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">View</th>
                                    <th class="text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($inboxes as $inbox)
                                    @php $id++;@endphp

                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$inbox->name}}</td>
                                        <td class="text-center">{{$inbox->email}}</td>
                                        <td class="text-center">{{$inbox->subject}}</td>
                                        <td class="text-center">{{$inbox->created_at->diffForHumans()}}</td>
                                        <td class="text-center">

                                            <a href="{{route('adminEmail.show', $inbox->id)}}" class="btn btn-info" type="button">

                                                Show Me

                                            </a>


                                        </td>

                                        <td class="text-center">

                                            @if($inbox->status == 1)

                                                <button class="btn btn-success">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                        </span>
                                                    Already View
                                                </button>


                                            @else

                                                <button class="btn btn-warning">
                                        <span class="btn-label">
                                            <i class="material-icons">warning</i>
                                        </span>
                                                    Not Viewed Yet
                                                </button>



                                            @endif



                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>

                            </table>
                        </div>

                    @else

                        <h1 class="text-center">No Emails Yet</h1>

                    @endif

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$inboxes->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection