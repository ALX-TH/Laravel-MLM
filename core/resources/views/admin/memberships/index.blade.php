@extends('layouts.admin')

@section('title', 'View All Memberships')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">All Memberships</h4>
                <div class="card-content">
                    <br>

						@if(count($memberships) > 0)
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Details</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Duration</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            
                                @foreach($memberships as $membership)

                                    <tr>
                                        <td class="text-center">{{$membership->id}}</td>
                                        <td class="text-center">{{$membership->name}}</td>
                                        <td class="text-center">{!! str_limit($membership->details,60) !!}</td>
                                        <td class="text-center">

                                            @if($membership->price == 0)

                                                Free

                                            @else
                                                {{config('app.currency_symbol')}} {{$membership->price + 0}}
                                            @endif

                                        </td>
                                        <td class="text-center">{{$membership->duration}} Days</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.membership.edit', $membership->id)}}" type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">edit</i>

                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{route('admin.membership.delete', $membership->id)}}" type="button" rel="tooltip" class="btn btn-danger">
                                                <i class="material-icons">close</i>

                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                          

                            </tbody>
                        </table>




                    </div>
					
					 @else

                        <h1 class="text-center">No Membership Plan</h1>

                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
