@extends('layouts.dashboard')
@section('title', 'Edit Your Profile')
@section('content')


    <div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">perm_identity</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Edit Member Profile -
                    <small class="category">Complete Member profile</small>
                </h4>
                {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['UserDashboardController@update', $user->id],'files'=>true]) !!}


                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <img src="{{Auth::user()->photo ? Auth::user()->photo->file : Auth::user()->photoPlaceholder()}}" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
                                                    </span>
                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {!! Form::label('name', 'Full Name:',['class'=>'control-label']) !!}
                            {!! Form::text('name', null, ['class'=>'form-control'])!!}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            {!! Form::label('email', 'Email Address:',['class'=>'control-label']) !!}
                            {!! Form::email('email', null, ['class'=>'form-control'])!!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            {!! Form::label('address', 'Member Address:', ['class'=>'control-label']) !!}
                            {!! Form::text('address', null, ['class'=>'form-control'])!!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            {!! Form::label('city', 'Member City:', ['class'=>'control-label']) !!}
                            {!! Form::text('city', null, ['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            {!! Form::label('country', 'Member Country:', ['class'=>'control-label']) !!}
                            {!! Form::text('country', null, ['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            {!! Form::label('postal_code', 'Member Postal Code:', ['class'=>'control-label']) !!}
                            {!! Form::text('postal_code', null, ['class'=>'form-control'])!!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group label-floating">
                                {!! Form::label('about_me', 'About Member:', ['class'=>'control-label']) !!}
                                {!! Form::text('about_me', null, ['class'=>'form-control'])!!}
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route('subscriber.index')}}" class="btn btn-rose">Cancel Edit</a>
                {!! Form::submit('Update Profile', ['class'=>'btn btn-success pull-right']) !!}

                <div class="clearfix"></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>

@endsection
