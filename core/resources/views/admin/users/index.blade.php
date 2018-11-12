@extends('layouts.admin')

@section('title', 'All Member Profile')

@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">All Members</h4>


                <div class="card-content">

                    <br>


                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Main</th>
                                <th class="text-center">Referral</th>
                                <th class="text-center">Deposit</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">View</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($users)

                                @php $id=0;@endphp

                                @foreach($users as $user)

                                    @php $id++;@endphp

                            <tr>
                                <td class="text-center">{{ $id }}</td>
                                <td width="10%" >
                                    <img src="{{asset($user->profile->avatar)}}" class="img-circle" alt="User Photo"  >
                                </td>
                                <td class="text-center">{{$user->name}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$user->profile->main_balance + 0}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$user->profile->referral_balance +0}}</td>
                                <td class="text-center">{{config('app.currency_symbol')}} {{$user->profile->deposit_balance +0}}</td>
                                <td class="text-center">
                                    @if($user->active == 0)
                                    Not Active
                                    @else
                                    Active
                                    @endif
                                </td>
                                <td class="td-actions text-center">
                                        <a href="{{route('admin.user.edit', $user->id)}}" type="button" rel="tooltip" class="btn btn-success">Show</a>
                                </td>
                                <td class="td-actions text-center">
                                    <a href="{{route('admin.user.edit', $user->id)}}" type="button" rel="tooltip" class="btn btn-rose">Edit</a>
                                </td>
                                <td class="td-actions text-center">
                                    <a href="{{route('admin.user.delete', $user->id)}}" type="button" rel="tooltip" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                                    @endforeach

                                @endif

                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-5">

                            {{$users->appends(['s'=>$s])->render()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <div class="card card-content">
                    <div class="card-content">
                        <form action="{{route('admin.users.index')}}" method="get">
                            <div class="form-group label-floating">
                                <label for="s" class="control-label">Search</label>
                                <input type="text" id="s" name="s" value="{{isset($s) ? $s : ''}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
