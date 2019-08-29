@extends('admin.app')
@section('title') Sliders @endsection

@section('content')
<div class="col-md-12">      		
      		<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add" >Add slider</button>
				<br>
				</br>
				</section>	
      		<div class="widget stacked ">
      			
      			<div class="widget-header">
      				<i class="icon-list-alt"></i>
      				<h3>Sliders</h3>
  				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>Image</th>
								<th>Title</th>
								<th>Description</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							@if(sizeof($sliders) == 0)
							<td style="text-align: center;" colspan="3"> No slider yet </td>
							@endif
							 @foreach($sliders as $key => $slider)
					          <tr id="raw{{$slider->id}}">
					            <td><ul style="margin-bottom: 0;text-align: left; " class="gallery-container">
								<li style="position: unset; margin: 0 0px;margin-bottom: 0em;border: 0;padding: 0px; ">
								<a href="{{asset('assets/img/slider/')}}/{{$slider->image}}" class="ui-lightbox">
									<img style="max-width: 50%;" src="{{asset('assets/img/slider/')}}/{{$slider->image}}" alt="">
								</a></li></ul></td>
								<td>{{ $slider->title }}</td>
					            <td>{{ str_limit(strip_tags($slider->description), 80) }}</td>
					            <td width="20%">
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$slider->id}}">Edit</a>
								<a class="btn btn-danger btn-sm" id="remove" msgid="{{$slider->id}}">Remove</a>
								@if($slider->status == 1)
								<a class="btn btn-danger btn-sm" id="deactivate" msgid="{{$slider->id}}">Deactivate</a>
							@else
								<a class="btn btn-success btn-sm" id="activate" msgid="{{$slider->id}}">Activate</a>
							@endif
								</td>
					          </tr>
					         @endforeach
					        </tbody>
					      </table>
						  {{ $sliders->links('pagination.simple') }}
					  </div> 
					
				</div> 
				
				
			</div> <!-- /widget -->
@endsection
@section('modal')
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add slider</h5>

      </div>
      <div class="modal-body">
        <form id="addslider" method="post">
			{{ csrf_field() }}
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify">
           </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" name="title">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" name="description">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
	   </form>
    </div>
  </div>
</div>

@foreach($sliders as $slider)

<div class="modal fade" id="edit{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit slider</h5>

      </div>
      <div class="modal-body">
        <form action="{{ route('admin.sliders.edit') }}" method="post">
			{{ csrf_field() }}
		   <input type="hidden" name="id" value="{{$slider->id}}">
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="{{asset('assets/img/slider/')}}/{{$slider->image}}">
           </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" value="{{$slider->title}}" name="title">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" value="{{$slider->description}}" name="description">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
	   </form>
    </div>
  </div>
</div>
@endforeach
@endsection
@section('css')
<link href="{{asset('assets/admin/js/plugins/msgbox/jquery.msgbox.css')}}" rel="stylesheet">
<link href="{{ asset('assets/vendor/dropify/css/dropify.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css')}}" rel="stylesheet">
@endsection
@section('script')
<script src="{{asset('assets/admin/js/plugins/msgbox/jquery.msgbox.min.js')}}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/lightbox/jquery.lightbox.min.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/hoverIntent/jquery.hoverIntent.minified.js')}}"></script>
<script src="{{asset('assets/admin/js/demo/gallery.js')}}"></script>
<script>
@if(count($sliders) < 5)
$('.footer').attr('style','margin-top: 230px');
@endif

$("a#remove").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to permanently delete this slider?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.sliders.remove') }}",
       {
         id: msgid,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'slider removed.'
			, position: 'top-right'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});

$("a#deactivate").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to deactivate this slider?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.sliders.status') }}",
       {
         id: msgid,
		 status: 0,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'slider deactivated.'
			, position: 'top-right'
		});
       }
    );
		  }
		});	
});

$("a#activate").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to activate this slider?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.sliders.status') }}",
       {
         id: msgid,
		 status: 1,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'slider activated.'
			, position: 'top-right'
		});
       }
    );
		  }
		});	
});


$('#addslider').on('submit',function(event){
       
	  
       $.ajax({
        url: "{{ route('admin.sliders.add') }}",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'slider added. Reload the page to see the result.'
							, position: 'top-right'
							, lifetime: 999999999
							});
					},
					error: function (xhr) {
						$.each(xhr.responseJSON.errors, function(key,value) {
							$.msgGrowl ({
								type: 'error'
								, title: 'Error'
								, text: value
								, position: 'top-right'
								});
							});	
						}
		});


return false;
});

	

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