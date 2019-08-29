@extends('front.app')
@section('title')Photo gallary - {{$front->title}}@endsection
@section('og_title')Photo gallary - {{$front->title}}@endsection
@section('description'){{$front->title}} - Photo gallary @endsection
@section('og_description'){{$front->title}} - Photo gallary @endsection
@section('keyword')photo,gallary, {{$front->keywords}}@endsection
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
                    <h1>Photo gallary</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Photo gallary</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="courses-page-area2">
            <div class="container" id="inner-isotope">
			   <div class="row featuredContainer">
			   @if(sizeof($folders) == 0)
					<div class="alert alert-danger" role="alert">No data available!</div>
				@endif
			@foreach($folders as $folder)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                                <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                    <img style="position: relative;width: 360px;height: 180px;" class="img-responsive" src="@if($folder->image == null) {{asset('assets/img/gallary.png')}} @else {{asset('assets/img/gallery/')}}/{{$folder->image}} @endif" alt="courses">
                                    <a href="{{ route('photogallary.view', $folder->id) }}"><i class="fa fa-link" aria-hidden="true"></i></a>
                                </div>
                                <div class="courses-content-wrapper">
                                    <h3 style="font-size: 15px;" class="item-title"><a href="{{ route('photogallary.view', $folder->id) }}"><b>{{$folder->name}}</b></a></h3>
                                    <p style="color: #002147;font-weight: 500;font-size: 15px;margin-bottom: 10px;" class="item-content">{{$folder->Images->count()}} photos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ $folders->render() }}
                            </div>
            </div>
		</div>
        </div>
	 
</div>
@endsection	