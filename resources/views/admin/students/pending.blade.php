@extends('admin.app')
@section('title') Students @endsection

@section('content')
<div class="col-md-12"> 
<div class="widget stacked">
				
							
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
							<td style="text-align: center;" colspan="7"> No pending request</td>
							@endif
							 @foreach($students as $key=>$student)
					          <tr id="raw{{$student->student_id}}">
					            <td>{{$key+1}}</td>
					            <td>{{$student->student_id}}</td>
					            <td>{{$student->name}}</td>
					            <td>{{$student->gender}}</td>
					            <td>{{$student->email}}</td>
					            <td>{{$student->phone}}</td>
					            <td width="20%">
								<a class="btn btn-success btn-sm" id="approve" sid="{{$student->student_id}}">Approve</a>
								<a class="btn btn-danger btn-sm" id="remove" sid="{{$student->student_id}}">Remove</a>
								
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
$("a#approve").click(function(){

    var msgid = $(this).attr("sid");
 	$.msgbox("Are you sure that you want to approve this student?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.students.approve') }}",
       {
         id: msgid,
		 active: 0,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Student approved.'
			, position: 'top-right'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});

$("a#remove").click(function(){

    var msgid = $(this).attr("sid");
 	$.msgbox("Are you sure that you want to remove this student?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.students.remove') }}",
       {
         id: msgid,
		 active: 1,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Student removed. Reload the page to see the result.'
			, position: 'top-right'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});
</script>
@endsection