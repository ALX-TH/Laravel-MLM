@extends('layouts.admin')

@section('title', 'View All User Testimonials')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">All User Testimonials</h4>
                <div class="card-content">
                    <br>

                    @if(count($reviews) > 0)

                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">User Email</th>
                                <th class="text-center">Subject</th>
                                <th>Comment</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php $id=0;@endphp
                                @foreach($reviews as $review)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{$id}}</td>
                                        <td class="text-center">{{$review->user->email}}</td>
                                        <td class="text-center">{{str_limit($review->title)}}</td>
                                        <td>{!! Markdown::convertToHtml($review->comment) !!}</td>
                                        <td class="text-center">

                                            @if($review->status == 1)

                                                <span class="btn btn-success" type="button">Published</span>

                                            @else

                                                <span class="btn btn-warning" type="button">Not Published</span>

                                            @endif


                                        </td>

                                        <td class="text-center">

                                            @if($review->status == 1)


                                                <a href="{{route('adminReview.reject',$review->id)}}" type="button" class="btn btn-danger">Un-Publish</a>


                                            @else

                                                <a href="{{route('adminReview.accept',$review->id)}}" type="button" class="btn btn-success">Publish</a>

                                            @endif

                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>

                    </div>
                    @else

                        <h1 class="text-center">No User Testimonials</h1>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$reviews->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
