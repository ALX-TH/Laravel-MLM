@extends('layouts.admin')


@section('title', 'View All Payment Gateway')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <br>
                <h4 class="card-title">All Local Gateways</h4>
                <div class="card-content">
                    <br>

                    @if(count($gateways) > 0)

                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Photo</th>
                                    <th class="text-center">Account No</th>
                                    <th class="text-center">Fixed Fee</th>
                                    <th class="text-center">Percent Fee</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php $id=0;@endphp
                                @foreach($gateways as $gateway)
                                    @php $id++;@endphp
                                    <tr>
                                        <td class="text-center">{{ $id }}</td>
                                        <td class="text-center">{{$gateway->name}}</td>
                                        <td width="10%" class="text-center">
                                            <img src="{{asset($gateway->image)}}" class="img-circle" alt="No Photo">

                                        </td>
                                        <td class="text-center">{{$gateway->account}}</td>
                                        <td class="text-center">{{config('app.currency_symbol')}} {{$gateway->fixed}}</td>
                                        <td class="text-center">{{$gateway->percent}} %</td>
                                        <td class="text-center">{{$gateway->status == 1 ? 'Active':'Not Active'}}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.local.edit', $gateway->id)}}" type="button" class="btn btn-success">
                                                <i class="material-icons">edit</i>

                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('admin.local.delete', $gateway->id)}}" type="button" class="btn btn-danger">
                                                <i class="material-icons">close</i>

                                            </a>
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>

                        </div>

                    @else

                        <h1 class="text-center">No Local Payment Gateway Found</h1>

                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
