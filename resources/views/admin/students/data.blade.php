@extends('admin.app')
@section('title') Students @endsection

@section('content')
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<a class="btn btn-default" href="{{ route('admin.students.pending') }}" >Pending students</a>
				<br>
				</br>
				</section>				
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Students</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Student Id</th>
					            <th>Name</th>
					            <th>Gender</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							@if(sizeof($students) == 0)
							<td style="text-align: center;" colspan="7"> No student yet </td>
							@endif
							 @foreach($students as $key=>$student)
					          <tr>
					            <td>{{$key+1}}</td>
					            <td>{{$student->student_id}}</td>
					            <td>{{$student->name}}</td>
					            <td>{{$student->gender}}</td>
					            <td>{{$student->email}}</td>
					            <td>{{$student->phone}}</td>
					            <td width="20%">
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$student->id}}">Edit</a>
								@if($student->active == 1)
								<a class="btn btn-danger btn-sm" id="deactivate" sid="{{$student->student_id}}">Deactivate</a>
							    @else
								<a class="btn btn-success btn-sm" id="activate" sid="{{$student->student_id}}">Activate</a>
							    @endif
								</td>
					          </tr>
					         @endforeach
					        </tbody>
					      </table>
						  {{ $students->links('pagination.simple') }}
					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
@endsection
@section('modal')
@foreach($students as $student)
<div class="modal fade" id="edit{{$student->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit student</h5>

      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.students.update') }}">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{$student->student_id}}">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" value="{{$student->name}}" name="name">
          </div>
         <div class="form-group">
            <label for="title-name" class="col-form-label">Gender:</label>
            <select name="gender" class="form-control">
				                <option value="">Select...</option>
				                <option value="male" @if($student->gender == "male") selected @endif >Male</option>
				                <option value="female" @if($student->gender == "female") selected @endif>Female</option>
				              </select>
          </div>
         <div class="form-group">
            <label for="title-name" class="col-form-label">Email:</label>
            <input type="email" class="form-control" value="{{$student->email}}" name="email">
          </div>
         <div class="form-group">
            <label for="title-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" value="{{$student->phone}}" name="phone">
          </div>
         <div class="form-group">
            <label for="title-name" class="col-form-label">Academic year:</label>
            <input type="text" class="form-control" value="{{$student->academic_year}}" name="academic_year">
          </div>
         
		 
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="@if($student->image == null){{asset('assets/img/no-image.png')}}@else{{asset('assets/img/students/')}}/{{$student->image}}@endif">
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
@if(count($students) < 5)
$('.footer').attr('style','margin-top: 230px');
@endif
$("a#deactivate").click(function(){

    var msgid = $(this).attr("sid");
 	$.msgbox("Are you sure that you want to Deactivate this student?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.students.status') }}",
       {
         id: msgid,
		 active: 0,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Student deactivated. Reload the page to see the result.'
			, position: 'top-right'
		});
       }
    );
		  }
		});	
});

$("a#activate").click(function(){

    var msgid = $(this).attr("sid");
 	$.msgbox("Are you sure that you want to Activate this student?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.students.status') }}",
       {
         id: msgid,
		 active: 1,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Student activated. Reload the page to see the result.'
			, position: 'top-right'
		});
       }
    );
		  }
		});	
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