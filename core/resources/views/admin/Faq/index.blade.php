@extends('layouts.admin')

@section('title', 'All Website FAQ')


@section('content')

    <div class="row">

        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">All Website FAQ</h4>
                <div class="card-content">
                    <br>


                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Question</th>
                                <th class="text-center">Solution</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($faqs)
                                @php $id=0;@endphp
                                @foreach($faqs as $faq)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{$id}}</td>
                                        <td class="text-center">{{$faq->title}}</td>
                                        <td class="text-center">{!! Markdown::convertToHtml(str_limit($faq->content,'100')) !!}</td>
                                        <td class="td-actions text-center">
                                            <a href="{{route('adminFAQEdit', $faq->id)}}" type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>
                                        <td class="td-actions text-center">
                                            <a href="{{route('adminFAQDestroy', $faq->id)}}" type="button" rel="tooltip" class="btn btn-danger">
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
                <h4 class="card-title">Create Frequently Ask Question</h4>
                <div class="card-content">
                    <br>

                    <form class="m-form" action="{{route('adminFAQStore')}}" method="post">

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

                                        <label  class="control-label" for="title">F.A.Q Title Question</label>
                                        <input id="title" name="title" type="text" class="form-control">

                                    </div>

                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <div class="form-group label-floating">

                                        <label  class="control-label" for="content">F.A.Q Question Solution</label>
                                        <textarea class="form-control" name="body" id="content" rows="10"></textarea>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-success pull-right">Create F.A.Q</button>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection