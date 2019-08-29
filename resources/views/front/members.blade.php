@extends('front.app')
@section('title')Faculty members - {{$front->title}}@endsection
@section('og_title')Faculty members - {{$front->title}}@endsection
@section('description'){{$front->title}} - Faculty members @endsection
@section('og_description'){{$front->title}} - Faculty members @endsection
@section('keyword')Faculty members, {{$front->keywords}}@endsection
@section('og_image'){{$front->og_img}}@endsection


@section('content')
<div id="wrapper">
        <header>
		@include('front.mainmenu')
		@include('front.mobilemenu')
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>Faculty members</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Faculty members</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="lecturers-page2-area">
            <div class="container" id="inner-isotope">
                <div class="row featuredContainer">
				@if(sizeof($members) == 0)
					<div class="alert alert-danger" role="alert">No data available!</div>
				@endif
				@foreach($members as $member)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 diploma cse">
                        <div class="single-item">
                            <div class="lecturers-item-wrapper">
                                <a href="{{ route('facultymembers.details', $member->id) }}"><img style="position: relative;width: 360px;height: 240px;" class="img-responsive" src="{{asset('assets/img/members/')}}/{{$member->image}}" alt=""></a>
                                <div class="lecturers-content-wrapper">
                                    <h3><a href="{{ route('facultymembers.details', $member->id) }}">{{$member->name}}</a></h3>
                                    <span>{{$member->position}}</span>
                                    <ul class="lecturers-social">
                                        <li><a href="Tel:{{$member->phone}}"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                    <li><a href="mailto:{{$member->email}}"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="{{$member->linkedin_url}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="{{$member->fb_url}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
					@endforeach
					   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					    {{ $members->render() }}
					  </div>
                    </div>
                </div>
            </div>
	 
</div>
@endsection	