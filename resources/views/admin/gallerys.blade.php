@extends('admin.app')
@section('title') Photo gallery @endsection

@section('content')
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add" >Add folder</button>
				<br>
				</br>
				</section>				
				<div class="widget-header">
					<i class="icon-picture"></i>
					<h3>Photo gallery</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Name</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							@if(sizeof($gallerys) == 0)
							<td style="text-align: center;" colspan="4"> No gallery yet </td>
							@endif
							 @foreach($gallerys as $key => $gallery)
					          <tr id="raw{{$gallery->id}}">
					            <td>{{$key+1}}</td>
					            <td>{{$gallery->name}}</td>
					            <td>
								<a class="btn btn-info btn-sm" href="{{ route('admin.photo', $gallery->id) }}">Photos</a>
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$gallery->id}}" >Edit</a>
								<a class="btn btn-danger btn-sm" id="remove" msgid="{{$gallery->id}}">Remove</a>
					          </tr>
					         @endforeach
					        </tbody>
					      </table>
						  {{ $gallerys->links('pagination.simple') }}
					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
@endsection
@section('modal')
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add folder</h5>

      </div>
      <div class="modal-body">
        <form id="addfolder" method="post">
			{{ csrf_field() }}
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify">
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
@foreach($gallerys as $gallery)
<div class="modal fade" id="edit{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit folder</h5>

      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.gallery.edit') }}">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{$gallery->id}}">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" value="{{$gallery->name}}" name="name">
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="@if($gallery->image == null){{asset('assets/img/gallary.png')}}@else{{asset('assets/img/gallery/')}}/{{$gallery->image}}@endif">
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
@endsection
@section('script')
<script src="{{asset('assets/admin/js/plugins/msgbox/jquery.msgbox.min.js')}}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.min.js')}}"></script>
<script>
@if(count($gallerys) < 5)
$('.footer').attr('style','margin-top: 230px');
@endif

$("a#remove").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to permanently delete this folder?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.gallery.remove') }}",
       {
         id: msgid,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'folder removed.'
			, position: 'top-right'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});


$('#addfolder').on('submit',function(event){
       
	  
       $.ajax({
        url: "{{ route('admin.gallery.add') }}",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'Gallery added. Reload the page to see the result.'
							, position: 'top-right'
							, lifetime: 999999999
							});
						$('#cancel-btn').click();
						$('#addnewnews')[0].reset();
					},
					error: function (xhr) {
						$('#cancel-btn').click();
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