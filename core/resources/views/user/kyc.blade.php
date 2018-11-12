@extends('layouts.dashboard')
@section('title', 'Pick the best plan for you')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="row">
                    <div class="text-center">
                        <h5 class="title text-danger">Read this before submit</h5>
                    </div>
                </div>

                <div class="card-content">
                    <br>
                    <h4>The following documents are accepted for verification of identity:</h4>
                    <ul>
                        <li>International passport</li>
                        <li>National ID card</li>
                        <li>Driver license</li>
                    </ul>
                    <br>
                    <h4>The following documents are not accepted for verification of identity:</h4>
                    <ul>
                        <li>Voter's card</li>
                        <li>Residence permit (only as addition to other documents)</li>
                        <li>Health insurance card</li>
                        <li>Professional ID cards</li>
                        <li>Student ID cards</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="row">
                    <div class="text-center">
                        <h5 class="title text-danger">Read this before submit</h5>
                    </div>
                </div>

                <div class="card-content">
                    <br>

                    <h4> For address verification are accepted the following documents:</h4>
                    <ul>
                        <li>Utility bills (water bill, electricity bill, gas bill, etc.)</li>
                        <li>Bank statement</li>
                        <li>Mobile phone bill</li>
                        <li>Cable bill</li>
                        <li>Credit card statement, etc.</li>
                    </ul>
                    <h5>Utility bill / bank statement or any other bill provided for verification has to match the following criteria:</h5>
                    <ul>
                        <li>It has to be a copy of paper (not online) bill</li>
                        <li>Bill has to be in the name of the user</li>
                        <li>Bill has to contain user address</li>
                        <li>Bill has to contain date (for the last 2 months).</li>

                    </ul>


                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="title text-center">Fill the form with your real information</h3>
            <br />
            <div class="nav-center">
                <ul class="nav nav-pills nav-pills-info nav-pills-icons" role="tablist">
                    @if($result1)

                    @else
                    <li class="active">
                        <a href="#identity" role="tab" data-toggle="tab">
                            <i class="material-icons">gavel</i> Identity Verify
                        </a>
                    </li>
                    @endif

                    @if($result2)


                    @else
                    <li>
                        <a href="#paddress" role="tab" data-toggle="tab">
                            <i class="material-icons">location_on</i> Proof of Address
                        </a>
                    </li>

                    @endif
                </ul>
            </div>
            <div class="tab-content">
                @if($result1)

                @else
                <div class="tab-pane active" id="identity">
                    <div class="card">
                        <div class="card-content">
                            <form action="{{route('userKyc.submit')}}" method="post" enctype="multipart/form-data">
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
                                <div class="alert alert-info">
                                    <span>If you select Passport as Document Type then you don't have to upload second page</span>
                                </div>
                                <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group label-floating">
                                                <select class="selectpicker" name="name" data-style="btn btn-warning btn-round" title="Select Document Type" data-size="7">
                                                    <option value="National ID Card">National ID Card</option>
                                                    <option value="International Passport">International Passport</option>
                                                    <option value="Driver License">Driver License</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group label-floating">
                                            <label  class="control-label" for="number">Passport/NID/Driver License Number</label>
                                            <input id="number" name="number" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label  class="control-label" for="dob">Date of Birth</label>
                                            <input id="dob" name="dob" type="date" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select Front Page</span>
                                                        <span class="fileinput-exists">Change Front Page</span>
                                                        <input type="file" name="front" />
                                                    </span>
                                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select Back Page</span>
                                                        <span class="fileinput-exists">Change Back Page</span>
                                                        <input type="file" name="back" />
                                                    </span>
                                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><br>


                                <a href="{{route('userDashboard')}}" class="btn btn-rose">Cancel Verify</a>
                                <button type="submit" class="btn btn-success pull-right">Submit Verification</button>
                                <div class="clearfix"></div>
                            </form>




                        </div>
                    </div>
                </div>
                @endif

                @if($result2)


                @else
                        <div class="tab-pane" id="paddress">
                    <div class="card">
                        <div class="card-content">

                            <form action="{{route('userKyc2.submit')}}" method="post" enctype="multipart/form-data">
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
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group label-floating">
                                            <select class="selectpicker" name="name" data-style="btn btn-warning btn-round" title="Select Document Type" data-size="7">
                                                <option value="Bank Statement">Bank Statement</option>
                                                <option value="Utility Bills">Utility Bills</option>
                                                <option value="Credit Card Statement">Credit Card Statement</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select Back Page</span>
                                                        <span class="fileinput-exists">Change Back Page</span>
                                                        <input type="file" name="photo" />
                                                    </span>
                                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><br>


                                <a href="{{route('userDashboard')}}" class="btn btn-rose">Cancel Verify</a>
                                <button type="submit" class="btn btn-success pull-right">Submit Verification</button>
                                <div class="clearfix"></div>
                            </form>



                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>


@endsection