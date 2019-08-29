@extends('front.app')
@section('title')Resources - {{$front->title}}@endsection
@section('og_title')Resources - {{$front->title}}@endsection
@section('description'){{$front->title}} - Resources @endsection
@section('og_description'){{$front->title}} - Resources @endsection
@section('keyword')Resources, {{$front->keywords}}@endsection
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
                    <h1>Resources</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Resources</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="section-space accent-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <ul class="profile-title">
                            <li class="active"><a href="{{ route('resources') }}" >Resources</a></li>
							<li><a href="{{ route('profile') }}">Profile</a></li>
                            <li><a href="{{ route('logout') }}">Sign out</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="profile-details tab-content">
                                <div class="tab-pane fade active in">
									<h3 class="title-section title-bar-high mb-40">Resources</h3>
									
			@if (session('success'))
		<div class="alert alert-success" role="alert">{{ session('success') }}</div>
		@endif
		
		@if (session('alert'))
		<div class="alert alert-danger" role="alert">{{ session('alert') }}</div>
		@endif

		@if ($errors->any())
			<div class="alert alert-danger" role="alert">
			@foreach ($errors->all() as $error)
			{{ $error }} <br>
		@endforeach
		</div>
		@endif
									<form method="post" action="{{ route('resources.search') }}">
										{{ csrf_field() }}
									<div class="input-group col-xs-4">
									<input type="text" name="search" placeholder="search resource" class="form-control">
									<span class="input-group-btn">
									<button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i></button>
									</span>
									</div>
									</form>
									</br>
									
									<div class="table-responsive">
                                            <table class="table table-bordered table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th>Uploaded By</th>
                                                        <th>Uploaded Date</th>
                                                        <th>Attachment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												@if( sizeof($resources) == 0)
													<td colspan="4" style="text-align: center">No data found</td>
												@endif
												@foreach($resources as $resource)
												@php
												$date = \Carbon\Carbon::parse($resource->created_at, 'UTC');
												@endphp
                                                    <tr>
                                                        <th>{{$resource->description}}</th>
                                                        <td>{{$resource->created_by}}</td>
														<td>{{ $date->format('d-m-Y h:m A') }}</td>
                                                        <td>
                                                            <a href="{{ route('resources.download', $resource->secret) }}" title="download" style="color: #8a0000;" class="btn-view">{{$resource->filename}}</a>
                                                        </td>
                                                    </tr>
													@endforeach
                                                </tbody>
                                            </table>
											{{ $resources->links('pagination.simple') }}
                                        </div>
                                </div>
                             </div>
                    </div>
                </div>
            </div>
        </div>
	 
</div>
@endsection	