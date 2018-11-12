@extends('layouts.admin')

@section('title', 'Page')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">All Website Page</h4>
                <div class="card-content">
                    <br>

                    @if(count($pages) > 0)
                        <div class="table-responsive">



                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">View Page</th>
                                    <th class="text-center">Edit Post</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php $id=0;@endphp

                                @foreach($pages as $page)

                                    @php $id++;@endphp

                                    <tr>
                                        <td class="text-center">{{ $id }}</td>

                                        <td>{{str_limit($page->name, 60)}}</td>

                                        <td class="td-actions text-center">
                                            <a href="{{route('viewPage',['slug'=>$page->slug])}}" type="button" rel="tooltip" class="btn btn-info">
                                                <i class="material-icons">search</i>
                                            </a>
                                        </td>

                                        <td class="td-actions text-center">
                                            <a href="{{route('adminPage.edit',['id'=>$page->id])}}" type="button" rel="tooltip" class="btn btn-primary">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>

                                        <td class="text-center">

                                            @if($page->status == 1)
                                                <span type="button" class="btn btn-success"> Already Published </span>
                                             @else
                                                <span type="button" class="btn btn-danger"> Not Published </span>
                                             @endif

                                        </td>

                                        <td class="text-center">
                                            @if($page->is_deletable == 0)
                                                <a href="#" type="button" rel="tooltip" class="btn btn-danger">
                                                    Protected
                                                </a>
                                            @else
                                                @if($page->status == 1)
                                                <a href="{{route('adminPage.unPublish',['id'=>$page->id])}}" type="button" rel="tooltip" class="btn btn-warning">
                                                    Un-Publish
                                                </a>
                                                @else
                                                    <a href="{{route('adminPage.Publish',['id'=>$page->id])}}" type="button" rel="tooltip" class="btn btn-rose">
                                                        Publish
                                                    </a>
                                                @endif
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach



                                </tbody>
                            </table>

                        </div>

                    @else

                        <h1 class="text-center">No Website Page Found</h1>

                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection