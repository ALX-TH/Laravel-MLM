

@if(count($testimonials) > 0)

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <h2 class="title">Our Clients Love Us</h2>
            <h5 class="description">You need more information? Check what other persons are saying about our services. They are very happy with their invest.</h5>
        </div>
    </div>

    <div class="row">

        @foreach($testimonials as $testimonial)

        <div class="col-md-4">
            <div class="card card-testimonial">
                <div class="icon">
                    <i class="material-icons">format_quote</i>
                </div>
                <div class="card-content">
                    <h5 class="card-description">
                        {!! Markdown::convertToHtml($testimonial->comment) !!}
                    </h5>
                </div>

                <div class="footer">
                    <h4 class="card-title">{{$testimonial->user->name}}</h4>
                    <h6 class="category">{{$testimonial->user->membership->name}} User</h6>
                    <div class="card-avatar">
                        <a href="#">
                            <img class="img" src="{{$testimonial->user->profile->avatar}}" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

@endforeach

    </div>

</div>

   @endif