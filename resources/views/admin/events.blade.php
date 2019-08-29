@extends('admin.app')
@section('title') Events @endsection

@section('content')
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addevent" >Add new Event</button>
				<br>
				</br>
				</section>				
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Events</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Event</th>
					            <th>Date</th>
								<th>Location</th>
								<th>Reg Deadline</th>
								<th>Type</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							@if(sizeof($events) == 0)
							<td style="text-align: center;" colspan="5"> No events yet </td>
							@endif
							 @foreach($events as $key=>$event)
					          <tr id="raw{{$event->id}}">
					            <td>{{$key+1}}</td>
					            <td>{{$event->title}}</td>
					            <td>{{\Carbon\Carbon::parse($event->date, 'UTC')->format('d-m-y')}}</td>
					            <td>{{$event->location}}</td>
					            <td>{{\Carbon\Carbon::parse($event->deadline, 'UTC')->format('d-m-y h:i A')}}</td>
					            <td>{{$event->type}}</td>
					            <td width="35%">
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#editevent{{$event->id}}" >Edit</a>
								<a class="btn btn-danger btn-sm" id="remove" msgid="{{$event->id}}">Remove</a>
								<a class="btn btn-info btn-sm" href="{{ route('admin.events.pending', $event->id) }}">Pending</a>
								<a class="btn btn-info btn-sm" href="{{ route('admin.events.registered', $event->id) }}">Registered</a>
								<div class="btn-group">
								<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">Export <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('admin.events.exportpdf', $event->id) }}">PDF</a></li>
								<li><a href="{{ route('admin.events.exportxlsx', $event->id) }}">XLSX</a></li>
								</ul>
								</div>
								</td>
					          </tr>
					         @endforeach
					        </tbody>
					      </table>
						  {{ $events->links('pagination.simple') }}
					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
@endsection
@section('modal')
  <div class="modal fade" id="addevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new event</h5>

      </div>
      <div class="modal-body">
        <form id="addnewevent" method="post">
			{{ csrf_field() }}
          <div class="form-group">
            <label for="title-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Content:</label>
            <textarea class="form-control" id="editor" name="content"> </textarea>
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify">
           </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Type:</label>
            <select name="type" id="event_type" class="form-control">
				                <option value="">Select...</option>
				                <option value="individual">Individual</option>
				                <option value="team">Team</option>
				              </select>
          </div>
		   <div id="max_member"></div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Event date:</label>
            <input type="date" class="form-control" name="date">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Location:</label>
            <input type="text" class="form-control" name="location">
          </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Start time:</label>
            <input type="text" class="form-control" name="start_time">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">End time:</label>
            <input type="text" class="form-control" name="end_time">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Registration fee:</label>
            <input type="text" class="form-control" name="reg_fee">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Payment method:</label>
            <input type="text" class="form-control" name="payment_method">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Payment number:</label>
            <input type="text" class="form-control" name="payment_number">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Registration deadline:</label>
            <input type="datetime-local" class="form-control" name="deadline">
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
@foreach($events as $event)
<div class="modal fade" id="editevent{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit event</h5>

      </div>
      <div class="modal-body">
        <form  enctype="multipart/form-data" action="{{ route('admin.events.edit') }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{$event->id}}">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" value="{{$event->title}}" name="title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Content:</label>
            <textarea class="form-control" id="editor" name="content">{{$event->content}}</textarea>
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="@if($event->image == null){{asset('assets/img/no-image.png')}}@else{{asset('assets/img/event/')}}/{{$event->image}}@endif">
           </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Type:</label>
            <select name="type" id="event_type{{$event->id}}" class="form-control">
				                <option value="">Select...</option>
				                <option value="individual" @if($event->type=="individual") selected @endif>Individual</option>
				                <option value="team" @if($event->type=="team") selected @endif>Team</option>
				              </select>
          </div>
		   <div id="max_member{{$event->id}}">
		   @if($event->type=="team")
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Team max member:</label>
            <input type="text" class="form-control" value="{{$event->max_member}}" name="max_member">
           </div>
		   @endif
		   </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Event date:</label>
            <input type="date" class="form-control" value="{{\Carbon\Carbon::parse($event->date, 'UTC')->format('Y-m-d')}}" name="date">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Location:</label>
            <input type="text" class="form-control" value="{{$event->location}}" name="location">
          </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Start time:</label>
            <input type="text" class="form-control" value="{{$event->start_time}}" name="start_time">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">End time:</label>
            <input type="text" class="form-control" value="{{$event->end_time}}" name="end_time">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Registration fee:</label>
            <input type="text" class="form-control" value="{{$event->reg_fee}}" name="reg_fee">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Payment method:</label>
            <input type="text" class="form-control" value="{{$event->payment_method}}" name="payment_method">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Payment number:</label>
            <input type="text" class="form-control" value="{{$event->payment_number}}" name="payment_number">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Registration deadline:</label>
            <input type="datetime-local" class="form-control" value="{{\Carbon\Carbon::parse($event->deadline, 'UTC')->format('Y-m-d\\TH:i')}}" name="deadline">
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
<script src="{{ asset('assets/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
@if(count($events) < 5))
$('.footer').attr('style','margin-top: 230px');
@endif

$('#event_type').on('change', function() {
  if(this.value == "team")
  {
	  $('#max_member').append
		       (
				   '<div class="form-group">' +
				   '<label for="title-name" class="col-form-label">Team max member:</label>' +
				   '<input type="text" class="form-control" name="max_member">' +
				   '</div>'
							);
  }
  else
  {
	  $('#max_member').empty();
  }
});
@foreach($events as $event)
$('#event_type{{$event->id}}').on('change', function() {
  if(this.value == "team")
  {
	  $('#max_member{{$event->id}}').append
		       (
				   '<div class="form-group">' +
				   '<label for="title-name" class="col-form-label">Team max member:</label>' +
				   '<input type="text" class="form-control" name="max_member">' +
				   '</div>'
							);
  }
  else
  {
	  $('#max_member{{$event->id}}').empty();
  }
});
@endforeach
$("a#remove").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to permanently delete this event?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.events.remove') }}",
       {
         id: msgid,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'News removed.'
			, position: 'top-right'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});

$('#addnewevent').on('submit',function(event){
       
	   for (instance in CKEDITOR.instances) {
		   CKEDITOR.instances[instance].updateElement();
		  }
	   
       $.ajax({
        url: "{{ route('admin.events.add') }}",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'Event Published. Reload the page to see the result.'
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