@extends('layouts.admin')

@section('title', 'View All Blog Post')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">All Blog Post</h4>
                <div class="card-content">
                    <br>

						@if(count($posts) > 0)
                    <div class="table-responsive">

                        

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">View Post</th>
                                <th class="text-center">Edit Post</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $id=0;@endphp

                                @foreach($posts as $post)

                                    @php $id++;@endphp

                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td width="10%" >
                                            <img src="{{$post->featured}}" class="img-circle" alt="No Photo"  >
                                        </td>

                                        <td>{{str_limit($post->title, 60)}}</td>

                                        <td class="td-actions text-center">
                                            <a href="{{route('viewPost',['slug'=>$post->slug])}}" type="button" rel="tooltip" class="btn btn-info">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>

                                        <td class="td-actions text-center">
                                            <a href="{{route('admin.posts.edit',['id'=>$post->id])}}" type="button" rel="tooltip" class="btn btn-warning">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>

                                        <td class="td-actions text-center">

                                            <a href="" type="button" rel="tooltip" class="btn btn-danger">
                                                <i class="material-icons">close</i>

                                            </a>

                                        </td>

                                    </tr>
                                @endforeach



                            </tbody>
                        </table>

                    </div>

                    @else

                        <h1 class="text-center">No Blog Post Found</h1>

                    @endif

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$posts->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
