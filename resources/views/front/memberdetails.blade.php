@extends('front.app')
@section('title'){{$member->name}} - {{$front->title}}@endsection
@section('og_title'){{$member->name}} - {{$front->title}}@endsection
@section('description'){{$member->name}}@endsection
@section('og_description'){{$member->name}} @endsection
@section('keyword'){{$member->name}}, {{$front->keywords}}@endsection
@section('og_image'){{asset('assets/img/members/')}}/{{$member->image}}@endsection


@section('content')
<div id="wrapper">
        <header>
		@include('front.mainmenu')
		@include('front.mobilemenu')
        </header>
		
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>Faculty details</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Faculty details</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="lecturers-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="lecturers-contact-info">
                            <img src="{{asset('assets/img/members/')}}/{{$member->image}}" class="img-responsive" alt="team">
                            <h2>{{$member->name}}</h2>
                            <h3>{{$member->position}}</h3>
                            <ul class="lecturers-social2">
                                <li><a href="Tel:{{$member->phone}}"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                    <li><a href="mailto:{{$member->email}}"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="{{$member->linkedin_url}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="{{$member->fb_url}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            </ul>
                            <ul class="lecturers-contact">
                                <li><i class="fa fa-phone" aria-hidden="true"></i>{{$member->phone}}</li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i>{{$member->email}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
					@if(!$member->content == null)
                        <h3 class="title-default-left title-bar-big-left-close">About</h3>
                        <p>{!!$member->content!!}</p>
					@endif
                        <div class="leave-comments">
                            <h3 class="title-default-left title-bar-big-left-close">Contact</h3>
                            <div class="row">
                                <div class="contact-form">
								<div id="success_msg" class="alert alert-success" role="alert">Your message has been send successfully.</div>
								<div id="error_msg" class="alert alert-danger" role="alert"></div>
                                    <form id="contact" method="post" >
									{{ csrf_field() }}
                                        <fieldset>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="Name" class="form-control">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Email" class="form-control">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea placeholder="Message" name="message" class="textarea form-control" id="form-message" rows="8" cols="20"></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group margin-bottom-none">
                                                    <button type="submit" class="view-all-accent-btn">Send</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
</div>
@endsection
@section('script')
<script>
$("#success_msg").hide();
$("#error_msg").hide();
$('#contact').on('submit',function(event){
$("#preloader").show();

       $.ajax({
        url: "{{ route('facultymembers.contact', $member->id) }}",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$("#preloader").hide();
						$("#success_msg").show();
						$("#error_msg").hide();
						$('#contact')[0].reset();
					},
					error: function (xhr) {
						$("#preloader").hide();
						$("#success_msg").hide();
						$("#error_msg").empty();
						$.each(xhr.responseJSON.errors, function(key,value) {
							$("#error_msg").append(value+"<br>");
							});	
						$("#error_msg").show();
						}
		});


return false;
});
</script>
@endsection