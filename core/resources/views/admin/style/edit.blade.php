@extends('layouts.admin')

@section('title', 'Edit  Invest Interest Return Style')

@section('content')


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Edit Invest Interest Return Style -
                        <small class="category">Edit Style</small>
                    </h4>

                    <form action="{{route('adminStyle.update',['id'=>$style->id])}}" method="post">
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

                            <div class="col-md-6">

                                <div class="form-group label-floating">
                                    <label  class="control-label" for="name">Style Name</label>
                                    <input id="name" name="name" type="text" value="{{$style->name}}" class="form-control">
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <div class="form-group label-floating">

                                        <label  class="control-label" for="compound">Time (In Hours)</label>
                                        <input id="compound" name="compound" type="number"value="{{$style->compound}}" class="form-control">

                                    </div>

                                </div>

                            </div>
                        </div>

                        <br><br><br>
                        <a href="{{route('adminStyle')}}" class="btn btn-rose">Cancel Edit</a>
                        <button type="submit" class="btn btn-success pull-right">Update Style</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
