@extends('front.app')
@section('title')Upload Resources - {{$front->title}}@endsection
@section('og_title')Upload Resources - {{$front->title}}@endsection
@section('description'){{$front->title}} - Upload Resources @endsection
@section('og_description'){{$front->title}} - Upload Resources @endsection
@section('keyword')Upload, {{$front->keywords}}@endsection
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
                    <h1>Upload Resources</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Upload Resources</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="section-space accent-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <ul class="profile-title">
                            <li><a href="{{ route('teacher.resources') }}" >Resources</a></li>
							<li class="active"><a href="{{ route('teacher.resources.upload') }}" >Upload resource</a></li>
							<li><a href="{{ route('teacher.profile') }}">Profile</a></li>
                            <li><a href="{{ route('teacher.logout') }}">Sign out</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="profile-details tab-content">
                                <div class="tab-pane fade active in">
									<h3 class="title-section title-bar-high mb-40">Upload Resources</h3>
									
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
		                        <div class="personal-info">
									<form class="form-horizontal" enctype="multipart/form-data" action="{{ route('teacher.resources.up') }}" method="post">
									
									{{ csrf_field() }}
									<div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="description" rows="5"></textarea>
                                            </div>
                                        </div>
									
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">File</label>
                                            <div class="col-sm-9 public-profile-content">
                                                <input type="file" name="attachment" id="input-file-now" data-height="150" class="dropify">
                                            
											<div class="file-size">{{ $folder->allowed_file }} allowed, Max size {{ $folder->max_size }} KB</div>
											</div>
                                        </div>
										
										
									
									
                                        <div class="form-group mb-none">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button class="view-all-accent-btn disabled col-sm-9" type="submit">Save</button>
                                            </div>
                                        </div>
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
@section('css')
<link href="{{ asset('assets/vendor/dropify/css/dropify.min.css')}}" rel="stylesheet">
@endsection
@section('script')
<script src="{{ asset('assets/vendor/dropify/js/dropify.min.js')}}"></script>
<script>
$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
</script>
@endsection