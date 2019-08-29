@extends('front.app')
@section('title')Committee - {{$front->title}}@endsection
@section('og_title')Committee - {{$front->title}}@endsection
@section('description'){{$front->title}} - Committee @endsection
@section('og_description'){{$front->title}} - Committee @endsection
@section('keyword')Committee, {{$front->keywords}}@endsection
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
                    <h1>Committees</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Committees</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="courses-page-area2">
            <div class="container" id="inner-isotope">
			   <div class="row featuredContainer">
			   @if(sizeof($committee) == 0)
					<div class="alert alert-danger" role="alert">No data available!</div>
				@endif
			@foreach($committee as $committe)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                                <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                    <img style="position: relative;width: 360px;height: 160px;" class="img-responsive" src="@if($committe->image == null) {{asset('assets/img/committe.jpg')}} @else {{asset('assets/img/committee/')}}/{{$committe->image}} @endif" alt="courses">
                                    <a href="{{ route('committee.members', $committe->id) }}"><i class="fa fa-link" aria-hidden="true"></i></a>
                                </div>
                                <div class="courses-content-wrapper">
                                    <h3 style="font-size: 18px;" class="item-title"><a href="{{ route('committee.members', $committe->id) }}">{{$committe->name}}</a></h3>
                                    <p class="item-content"><b>{{$committe->session}}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ $committee->render() }}
                            </div>
            </div>
		</div>
        </div>
	 
</div>
@endsection	