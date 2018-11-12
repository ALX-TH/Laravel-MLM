@extends('layouts.dashboard')
@section('title', 'View All Available Video Ads')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">important_devices</i>
                </div>
                <br>
                <h4 class="card-title">All Available Video Ads</h4>
                <div class="card-content">
                    <br>

                    @if(count($videos) > 0)
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Ad Title</th>
                                    <th>Ad Rewards</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                @php $id=0;@endphp
                                @foreach($videos as $video)
                                    @php $id++;@endphp

                                    <tr>
                                        <td>{{ $id }}</td>
                                        <td>{{ $video->ppv->title }}</td>
                                        <td>{{config('app.currency_symbol')}} {{ $video->ppv->rewards +0 }}</td>
                                        <td>
                                            @if($video->status == 0)
                                                <span class="btn btn-danger"><i class="material-icons">edit</i> Not Show</span>
                                            @else
                                                <span class="btn btn-primary"><i class="material-icons">edit</i> Viewed</span>
                                            @endif
                                        </td>

                                        <td >
                                            @if($video->status == 0)
                                                <a href="{{route('userCashVideo.show', $video->id)}}" type="button" rel="tooltip" class="btn btn-info">
                                                    <i class="material-icons">edit</i>
                                                    View Ads
                                                </a>
                                            @else
                                                <span class="btn btn-primary"><i class="material-icons">edit</i> Viewed</span>
                                            @endif
                                        </td>



                                    </tr>

                                @endforeach


                                </tbody>

                            </table>



                        </div>
                    @else

                        <h1 class="text-center">No Advertisement Right Now</h1>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$videos->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection