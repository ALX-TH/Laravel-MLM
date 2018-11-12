@extends('layouts.admin')

@section('title', 'All Blog Tags')


@section('content')

    <div class="row">

        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">All Blog Tag</h4>
                <div class="card-content">
                    <br>


                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($tags)
                                @foreach($tags as $tag)

                                    <tr>
                                        <td class="text-center">{{$tag->id}}</td>
                                        <td>{{$tag->tag}}</td>
                                        <td>{{$tag->created_at->diffForHumans()}}</td>
                                        <td>{{$tag->updated_at->diffForHumans()}}</td>
                                        <td class="td-actions text-right">

                                            <a href="{{route('admin.tag.edit', $tag->id)}}" type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{route('admin.tag.destroy', $tag->id)}}" type="button" rel="tooltip" class="btn btn-danger">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">Create Tags</h4>
                <div class="card-content">
                    <br>

                    <form class="m-form" action="{{route('admin.tag.store')}}" method="post">

                        {{csrf_field()}}
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

                            <div class="col-md-12">

                                <div class="form-group">
                                    <div class="form-group label-floating">

                                        <label  class="control-label" for="tag">Tag name</label>
                                        <input id="tag" name="tag" type="text" class="form-control">

                                    </div>

                                </div>

                            </div>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-success pull-right">Create Tag</button>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
