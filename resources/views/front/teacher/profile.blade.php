@extends('front.app')
@section('title')Profile - {{$front->title}}@endsection
@section('og_title')Profile - {{$front->title}}@endsection
@section('description'){{$front->title}} - Profile @endsection
@section('og_description'){{$front->title}} - Profile @endsection
@section('keyword')Profile, {{$front->keywords}}@endsection
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
                    <h1>Profile</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Profile</li>
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
							<li><a href="{{ route('teacher.resources.upload') }}" >Upload resource</a></li>
							<li class="active"><a href="{{ route('teacher.profile') }}">Profile</a></li>
                            <li><a href="{{ route('teacher.logout') }}">Sign out</a></li>
                        </ul>
                    </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('teacher.profileup') }}" method="post">
							{{ csrf_field() }}
                            <div class="profile-details tab-content">
                                <div class="tab-pane fade active in">
                                    <h3 class="title-section title-bar-high mb-40">Profile Information</h3>
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
									
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Image</label>
                                            <div class="col-sm-9 public-profile-content">
                                                <input type="file" accept="image/*" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="@if(!$user->image == null){{asset('assets/img/members/')}}/{{$user->image}}@endif">
                                            </div>
                                        </div>
										
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Position</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="position" value="{{ $user->position }}">
                                            </div>
                                        </div>
										
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Facebook url</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="fb_url" value="{{ $user->fb_url }}">
                                            </div>
                                        </div>
										
									<div class="form-group">
                                            <label class="col-sm-3 control-label">About</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="content" id="about" rows="5">{{$user->content}}</textarea>
                                            </div>
                                        </div>
									
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Change Password</label>
                                            <div class="col-sm-9">
                                                <input class="form-control mb-10" type="text" name="password" placeholder="Leave blank if no change needed">
                                            </div>
                                        </div>
                                        <div class="form-group mb-none">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button class="view-all-accent-btn disabled col-sm-9" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </form>
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
<script src="{{ asset('assets/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
ClassicEditor
        .create( document.querySelector( '#about' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection