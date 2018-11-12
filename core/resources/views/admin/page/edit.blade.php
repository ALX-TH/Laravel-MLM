@extends('layouts.admin')

@section('title')
    @if( empty($page->id) )
        Create new page
    @else
        Edit page {{ $page->name }}
    @endif
    | Панель управления
@endsection


@section('styles')

@endsection


@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Edit page -
                        <small class="category">{{$page->name}}</small>
                    </h4>

                    <form action="{{route('adminPage.update',['id'=>$page->id])}}" method="post">
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
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="name">Page Title</label>
                                    <input id="name" name="name" type="text" value="{{$page->name}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="name_h1">Page name H1</label>
                                    <input id="name_h1" name="name_h1" type="text" value="{{$page->name_h1}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="meta_title">Page meta title</label>
                                    <input id="meta_title" name="meta_title" type="text" value="{{$page->meta_title}}" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="meta_description">Page meta description</label>
                                    <input id="meta_description" name="meta_description" type="text" value="{{$page->meta_description}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="meta_keywords">Page meta keywords</label>
                                    <input id="meta_keywords" name="meta_keywords" type="text" value="{{$page->meta_keywords}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="slug">Page URL</label>
                                    <input id="slug" name="slug" type="text" value="{{$page->slug}}" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="body">Page Visibility</label>
                                    <select class="selectpicker" name="status" data-style="btn btn-warning btn-round" title="Select Page Visibility" data-size="7">
                                            <option value="1" @if($page->status == 1) selected @endif >Published</option>
                                            <option value="0" @if($page->status == 0) selected @endif >Un - Published</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="body">Can page be removed ?</label>
                                    <select class="selectpicker" name="is_deletable" data-style="btn btn-warning btn-round" title="Select if page can be deleted" data-size="2">
                                        <option value="1" @if($page->is_deletable == 1) selected @endif >Yes</option>
                                        <option value="0" @if($page->is_deletable == 0) selected @endif >No</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <br>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="control-label" for="body">Post Content</label>
                                    <textarea class="form-control" name="body" id="body" rows="10">{{$page->content}}</textarea>
                                </div>
                            </div>
                        </div>

                        <a href="{{route('adminPages')}}" class="btn btn-rose">Cancel Edit</a>

                        <button type="submit" class="btn btn-success pull-right">Save Changes</button>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

@endsection

