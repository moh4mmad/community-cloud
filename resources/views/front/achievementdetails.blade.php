@extends('front.app')
@section('title'){{$details->title}} - {{$front->title}}@endsection
@section('og_title'){{$details->title}} - {{$front->title}}@endsection
@section('description'){{ str_limit(strip_tags($details->content), 150) }}@endsection
@section('og_description'){{ str_limit(strip_tags($details->content), 150) }} @endsection
@section('keyword')achievement, {{$front->keywords}}@endsection
@section('og_image')@if($details->image == null) {{asset('assets/img/no-image.png')}} @else{{asset('assets/img/achievements/')}}/{{$details->image}}@endif @endsection


@section('content')
<div id="wrapper">
        <header>
		@include('front.mainmenu')
		@include('front.mobilemenu')
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>Achievement details</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li><a href="{{ route('achievements') }}">Achievements</a> -</li>
                        <li>Achievement details</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="research-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row research-details-inner">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <img src="{{asset('assets/img/achievements/')}}/{{$details->image}}" class="img-responsive" alt="research">
                                <h2 class="title-default-left-bold title-bar-high"><a href="#">{{$details->title}}</a></h2>
                                <p>{!!$details->content!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
						<div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search achievement</h3>
                                    <div class="sidebar-find-course">
                                        <form id="checkout-form">
                                            <div class="form-group course-name">
                                                <input id="first-name" placeholder="Type Here . . .." class="form-control" type="text" />
                                            </div>
                                            <div class="form-group">
                                                <button class="sidebar-search-btn-full disabled" type="submit" value="Login">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
						<div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Latest achievement</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
										@foreach($achievements as $achievement)
										@php
										$date = \Carbon\Carbon::parse($achievement->created_at, 'UTC');
										@endphp
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="{{ route('achievements.details', $achievement->id) }}"><img src="{{asset('assets/img/achievements/')}}/{{$achievement->image}}" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4>{{ $date->format('d') }} {{ $date->format('M') }}, {{ $date->format('Y') }}</h4>
                                                    <p>{{$achievement->title}}</p>
                                                </div>
                                            </li>
											@endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
	
	</div>
@endsection	