@extends('layouts.admin')

@section('title', 'Edit Post Category')

@section('content')


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Edit Post Category -
                        <small class="category">Edit Post/News/Event/Promotion Category</small>
                    </h4>

                    <form action="{{route('adminFAQUpdate',['id'=>$faq->id])}}" method="post">
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
                        <br><br>


                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group label-floating">
                                    <label  class="control-label" for="title">F.A.Q Title Question</label>
                                    <input id="title" name="title" type="text" value="{{$faq->title}}" class="form-control">
                                </div>
                            </div>

                        </div>

                        <br><br>
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group label-floating">

                                    <label  class="control-label" for="content">F.A.Q Question Solution</label>
                                    <textarea class="form-control" name="body" id="content" rows="20">{{$faq->content}}</textarea>
                                </div>
                            </div>

                        </div>
                        <br>
                        <a href="{{route('adminFAQ')}}" class="btn btn-rose">Cancel Edit</a>
                        <button type="submit" class="btn btn-success pull-right">Update FAQ</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
