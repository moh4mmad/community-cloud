@extends('front.app')
@section('title'){{$details->title}} - {{$front->title}}@endsection
@section('og_title'){{$details->title}} - {{$front->title}}@endsection
@section('description'){{ str_limit(strip_tags($details->content), 150) }}@endsection
@section('og_description'){{ str_limit(strip_tags($details->content), 150) }} @endsection
@section('keyword'){{$details->type}}, news, {{$front->keywords}}@endsection
@section('og_image')@if($details->image == null) {{asset('assets/img/no-image.png')}} @else {{asset('assets/img/news/')}}/{{$details->image}} @endif @endsection


@section('content')
<div id="wrapper">
        <header>
		@include('front.mainmenu')
		@include('front.mobilemenu')
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>News details</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li><a href="{{ route('news') }}">News</a> -</li>
                        <li>News details</li>
                    </ul>
                </div>
            </div>
        </div>
		

@php
$date = \Carbon\Carbon::parse($details->date, 'UTC');
@endphp
        <div class="news-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row news-details-page-inner">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="news-img-holder">
                                    <img src="@if($details->image == null) {{asset('assets/img/no-image.png')}} @else {{asset('assets/img/news/')}}/{{$details->image}} @endif" class="img-responsive" alt="research">
                                    <ul class="news-date1">
                                        <li>{{ $date->format('d') }} {{ $date->format('M') }}</li>
                                        <li>{{ $date->format('Y') }}</li>
                                    </ul>
                                </div>
                                <h2 class="title-default-left-bold-lowhight"><a>{{$details->title}}</a></h2>
                                <ul class="title-bar-high news-comments">
                                    <li><a><i class="fa fa-user" aria-hidden="true"></i><span>By</span> {{$details->created_by}}</a></li>
                                    <li><a><i class="fa fa-tags" aria-hidden="true"></i>{{$details->type}}</a></li>
                                </ul>
                                <p>{!!$details->content!!}</p>
                                <ul class="news-social">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search news</h3>
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
                                    <h3 class="sidebar-title">News</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
										@foreach($news as $news1)
										@php
										$date = \Carbon\Carbon::parse($news1->created_at, 'UTC');
										@endphp
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="{{ route('news.details', $news1->id) }}"><img src="@if($news1->image == null) {{asset('assets/img/no-image.png')}} @else {{asset('assets/img/news/')}}/{{$news1->image}} @endif" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4>{{ $date->format('d') }} {{ $date->format('M') }}, {{ $date->format('Y') }}</h4>
                                                    <p>{{$news1->title}}</p>
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