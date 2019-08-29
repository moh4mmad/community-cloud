@extends('admin.app')
@section('title') Photo gallery @endsection

@section('content')
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add" >Add image</button>
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
					            <th>Image</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							@if(sizeof($photos) == 0)
							<td style="text-align: center;" colspan="3"> No gallery yet </td>
							@endif
							 @foreach($photos as $key => $photo)
					          <tr id="raw{{$photo->id}}">
					            <td>{{$key+1}}</td>
					            <td><ul style="margin-bottom: 0;text-align: left; " class="gallery-container">
								<li style="position: unset; margin: 0 0px;margin-bottom: 0em;border: 0;padding: 0px; ">
								<a href="{{asset('assets/img/gallery/')}}/{{$photo->img_url}}" class="ui-lightbox">
									<img style="max-width: 50%;" src="{{asset('assets/img/gallery/')}}/{{$photo->img_url}}" alt="">
								</a></li></ul></td>
					            <td>
								<a class="btn btn-danger btn-sm" id="remove" msgid="{{$photo->id}}">Remove</a>
								</td>
					          </tr>
					         @endforeach
					        </tbody>
					      </table>
						  {{ $photos->links('pagination.simple') }}
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
        <h5 class="modal-title" id="exampleModalLabel">Add image</h5>

      </div>
      <div class="modal-body">
        <form id="addimage" method="post">
		<input type="hidden" name="folder_id" value="{{ $folder->id }}">
			{{ csrf_field() }}
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
@if(count($photos) < 5)
$('.footer').attr('style','margin-top: 230px');
@endif

$("a#remove").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to permanently delete this photo?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.photo.remove') }}",
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


$('#addimage').on('submit',function(event){
       
	  
       $.ajax({
        url: "{{ route('admin.photo.add') }}",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'Image added. Reload the page to see the result.'
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