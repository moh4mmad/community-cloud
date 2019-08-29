@extends('front.app')
@section('title')Executive Body - {{$front->title}}@endsection
@section('og_title')Executive Body - {{$front->title}}@endsection
@section('description'){{$front->title}} - Executive Body @endsection
@section('og_description'){{$front->title}} - Executive Body @endsection
@section('keyword')Executive Body, {{$front->keywords}}@endsection
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
                    <h1 @if(isset($committee)) style="font-size: 24px;" @endif>Executive body @if(isset($committee)) for {{ $committee->session }} @endif</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Executive body</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="lecturers-page1-area">
            <div class="container">
                <div class="row">
				@if(sizeof($members) == 0)
					<div class="alert alert-danger" role="alert">No data available!</div>
				@endif
				@foreach($members as $member)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="single-item">
                            <div class="lecturers1-item-wrapper">
                                <div class="lecturers-img-wrapper">
                                    <a href="@if(isset($committee)) {{ route('committee.members.details', $member->id) }} @else {{ route('executivebody.details', $member->id) }} @endif"><img style="position: relative;width: 360px;height: 240px;" class="img-responsive" src="@if($member->image == null) {{asset('assets/img/no-image.png')}} @else {{asset('assets/img/executivebody/')}}/{{$member->image}} @endif" alt=""></a>
                                </div>
                                <div class="lecturers-content-wrapper">
                                    <h3 class="item-title"><a href="@if(isset($committee)) {{ route('committee.members.details', $member->id) }} @else {{ route('executivebody.details', $member->id) }} @endif">{{$member->name}}</a></h3>
                                    <span class="item-designation">{{$member->position}}</span>
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