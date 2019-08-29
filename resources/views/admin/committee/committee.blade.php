@extends('admin.app')
@section('title') Committee @endsection

@section('content')
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add" >Add Committee</button>
				<br>
				</br>
				</section>				
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Committee</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Name</th>
					            <th>Session</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							@if(sizeof($committees) == 0)
							<td style="text-align: center;" colspan="4"> No committee yet </td>
							@endif
							 @foreach($committees as $key=>$committee)
					          <tr id="raw{{$committee->id}}">
					            <td>{{$key+1}}</td>
					            <td>{{$committee->name}}</td>
					            <td>{{$committee->session}}</td>
					            <td>
								<a class="btn btn-info btn-sm" href="{{ route('admin.committee.members', $committee->id) }}">Members</a>
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$committee->id}}" >Edit</a>
								<a class="btn btn-danger btn-sm" id="remove" msgid="{{$committee->id}}">Remove</a>
								@if($committee->status == 0)
									<a class="btn btn-success btn-sm" href="{{ route('admin.committee.status',[$committee->id, 1]) }}" >Active</a>
								@else
									<a class="btn btn-info btn-sm" href="{{ route('admin.committee.status', [$committee->id, 0]) }}">Deactive</a>
								@endif
								</td>
					          </tr>
					         @endforeach
					        </tbody>
					      </table>
						  {{ $committees->links('pagination.simple') }}
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
        <h5 class="modal-title" id="exampleModalLabel">Add committee</h5>

      </div>
      <div class="modal-body">
        <form id="addnewcommittee" method="post">
			{{ csrf_field() }}
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Session:</label>
            <input type="text" class="form-control" name="session">
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
@foreach($committees as $committee)
<div class="modal fade" id="edit{{$committee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit committee</h5>

      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.committee.edit') }}">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{$committee->id}}">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" value="{{$committee->name}}" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Session:</label>
            <input type="text" class="form-control" value="{{$committee->session}}" name="session">
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="@if($committee->image == null){{asset('assets/img/committe.jpg')}}@else{{asset('assets/img/committee/')}}/{{$committee->image}}@endif">
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
@if(count($committees) < 5)
$('.footer').attr('style','margin-top: 230px');
@endif

$("a#remove").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to permanently delete this committee?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.committee.remove') }}",
       {
         id: msgid,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Achievement removed.'
			, position: 'top-right'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});


$('#addnewcommittee').on('submit',function(event){
       
	  
       $.ajax({
        url: "{{ route('admin.committee.add') }}",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'Committee Published. Reload the page to see the result.'
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