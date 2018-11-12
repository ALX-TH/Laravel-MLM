
<div class="col-md-4">

        <div class="card-content">

            @if(count($errors) > 0 )

                <div class="alert alert-danger alert-with-icon" data-notify="container">
                    <i class="material-icons" data-notify="icon">notifications</i>

                        <ul>

                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>

                </div>

                @endif
        </div>

</div>










