@extends('admin.app')
@section('title') {{$member1}}  @endsection

@section('content')
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add" >Add {{$member1}}</button>
				<br>
				</br>
				</section>				
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>{{$member1}}</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Name</th>
					            <th>Position</th>
					            <th>Phone</th>
								<th>Email</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							@if(sizeof($members) == 0)
							<td style="text-align: center;" colspan="5"> No members yet </td>
							@endif
							 @foreach($members as $key=>$member)
					          <tr id="raw{{$member->id}}">
					            <td>{{$key+1}}</td>
					            <td>{{$member->name}}</td>
					            <td>{{$member->position}}</td>
					            <td>{{$member->phone}}</td>
					            <td>{{$member->email}}</td>
					            <td width="20%">
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$member->id}}" >Edit</a>
								<a class="btn btn-danger btn-sm" id="remove" memberid="{{$member->id}}">Remove</a>
								</td>
					          </tr>
					         @endforeach
					        </tbody>
					      </table>
						  {{ $members->links('pagination.simple') }}
					  </div> 
					
				</div>
			
			</div>
</div>
@endsection
@section('modal')
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add {{$member1}}</h5>

      </div>
      <div class="modal-body">
        <form id="addmember" method="post">
			{{ csrf_field() }}
		 <input type="hidden" name="type" value="{{$type}}">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Position:</label>
            <input type="text" class="form-control" name="position">
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify">
           </div>
		   @if($type == "faculty_members")
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Content:</label>
            <textarea class="form-control" id="editor" name="content"> </textarea>
          </div>
		  @endif
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" name="phone">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" name="email">
          </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Facebook url:</label>
            <input type="text" class="form-control" name="fb_url">
          </div>
		  @if($type == "faculty_members")
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Password:</label>
            <input type="text" class="form-control" name="password">
          </div>
		 @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
	   </form>
    </div>
  </div>
</div>
@foreach($members as $member)
<div class="modal fade" id="edit{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Faculty Members</h5>

      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="{{ route('admin.facultymembers.update') }}" method="post">
			{{ csrf_field() }}
		 <input type="hidden" name="id" value="{{$member->id}}">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" value="{{$member->name}}" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Position:</label>
            <input type="text" class="form-control" value="{{$member->position}}" name="position">
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="@if($member->image == null){{asset('assets/img/no-image.png')}}@else{{asset('assets/img/members/')}}/{{$member->image}}@endif">
           </div>
		   @if($type == "faculty_members")
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Content:</label>
            <textarea class="form-control" id="editor" name="content">{{$member->content}}</textarea>
          </div>
		  @endif
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" value="{{$member->phone}}" name="phone">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" value="{{$member->email}}" name="email">
          </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Facebook url:</label>
            <input type="text" class="form-control" value="{{$member->fb_url}}" name="fb_url">
          </div>
		  @if($type == "faculty_members")
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Password:</label>
            <input type="text" class="form-control" placeholder="Leave blank if no change needed" name="password">
          </div>
		  @endif
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
<script src="{{ asset('assets/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
@if(count($members) < 5)
$('.footer').attr('style','margin-top: 230px');
@endif

$("a#remove").click(function(){

    var memberid = $(this).attr("memberid");
 	$.msgbox("Are you sure that you want to permanently delete this member?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.facultymembers.remove') }}",
       {
         id: memberid,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Member removed.'
			, position: 'top-right'
		});
		$('#raw'+memberid).remove();
       }
    );
		  }
		});	
});

$('#addmember').on('submit',function(event){
       
	   for (instance in CKEDITOR.instances) {
		   CKEDITOR.instances[instance].updateElement();
		  }
	   
       $.ajax({
        url: "{{ route('admin.facultymembers.add') }}",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'Member added. Reload the page to see the result.'
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
$("textarea").each(function(){
CKEDITOR.replace(this, {
      height: 200
    });
});
</script>
@endsection