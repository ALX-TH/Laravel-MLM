@extends('layouts.dashboard')
@section('title', 'Write a review to us')
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>

                <div class="card-content">
                    <h4 class="card-title">User Testimonial Section -
                        <small class="category">Write a review to us</small>
                    </h4>
                    <br>

                    @if(count($review) == 0)

                    <form action="{{route('userReview.post')}}" method="post">
                        {{ csrf_field() }}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert-with-icon" data-notify="container">
                                <i class="material-icons" data-notify="icon">notifications</i>
                                <span data-notify="message">

                                    @foreach($errors->all() as $error)
                                        <li><strong> {{$error}} </strong></li>
                                    @endforeach

                            </span>
                            </div>
                        @endif


                        <div class="row">

                            <div class="col-md-10">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="title">Subject</label>
                                    <input id="title" name="title" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="comment">Your Comment</label>
                                    <textarea name="comment" class="form-control" id="comment" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <br> <br>
                        <a href="{{route('userDashboard')}}" class="btn btn-rose">Cancel Create</a>
                        <button type="submit" class="btn btn-success pull-right">Submit Review</button>
                        <div class="clearfix"></div>
                    </form>
                    @else

                    <h4 class="text-center text-success"> You are already submitted review</h4>

                    @endif

                </div>
            </div>
        </div>

    </div>


@endsection