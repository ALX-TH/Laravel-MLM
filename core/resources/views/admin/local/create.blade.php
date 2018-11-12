@extends('layouts.admin')

@section('title', 'Create Payment Gateway')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Gateway Section -
                        <small class="category">Create Gateway</small>
                    </h4>

                    <form action="{{route('admin.local.store')}}" method="post" enctype="multipart/form-data">

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

                                    <label  class="control-label" for="name">Gateway Name</label>
                                    <input id="name" name="name" type="text" class="form-control">

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select Gateway Logo</span>
                                                        <span class="fileinput-exists">Change Gateway Logo</span>
                                                      <input type="file" name="image" />
                                                    </span>
                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="status" data-style="btn btn-warning btn-round" title="Select Status" data-size="7">
                                        <option value="0">Not Active</option>
                                        <option value="1" selected>Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">

                                    <label  class="control-label" for="account">Gateway Account Name</label>
                                    <input id="account" name="account" type="text" class="form-control">

                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">

                                    <label  class="control-label" for="fixed">Gateway Fixed Fee</label>
                                    <input id="fixed" name="fixed" type="text" class="form-control">

                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="percent">Gateway Percentage Fee</label>
                                    <input id="percent" name="percent" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label  class="control-label" for="ex_percent">Exchange Percentage Fee</label>
                                    <input id="ex_percent" name="ex_percent" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <p class="category text-center text-info">
                            Dear user, You see the box below? This message box supported HTML Tag Content. For more details click : <br><br>
                            <a href="https://summernote.org/" target="_blank">HTML Editor</a>  <br>

                        </p>
                        <br>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group label-floating">

                                    <label  class="control-label" for="details">Gateway Details</label>
                                    <textarea class="form-control" name="details" id="details" rows="10"></textarea>

                                </div>
                            </div>
                        </div>


                        <a href="{{route('admin.gateways.local')}}" class="btn btn-rose">Cancel Create</a>
                        <button type="submit" class="btn btn-success pull-right">Create Gateway</button>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        jQuery(function($) {
        $("#text").summernote();
        });
    </script>

@endsection