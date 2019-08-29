@extends('admin.app')
@section('title') Pending Registration @endsection

@section('content')
<div class="col-md-12"> 
<div class="widget stacked">
							
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Registration pending individual members information</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Id</th>
					            <th>Name</th>
					            <th>Gender</th>
								<th>Email</th>
								<th>Phone</th>
								<th>University</th>
								<th>Department</th>
								<th>Semester</th>
								<th>Transaction id</th>
								<th>Sender</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							@if(sizeof($members) == 0)
							<td style="text-align: center;" colspan="12"> No data yet </td>
							@endif
							 @foreach($members as $key=>$member)
					          <tr id="raw{{$member->id}}">
					            <td>{{$key+1}}</td>
					            <td>{{$member->student_id}}</td>
								<td>{{$member->name}}</td>
								<td>{{$member->gender}}</td>
								<td>{{$member->email}}</td>
								<td>{{$member->phone}}</td>
								<td>{{$member->institute}}</td>
								<td>{{$member->department}}</td>
								<td>{{$member->semester}}</td>
					            <td>{{$member->transaction_id}}</td>
								<td>{{$member->sender}}</td>
								<td width="">
								<a class="btn btn-success btn-sm"  id="approve" teamid="{{$member->id}}">Approve</a>
								<a class="btn btn-danger btn-sm" id="remove" teamid="{{$member->id}}">Remove</a>
								</td>
					          </tr>
					         @endforeach
					        </tbody>
					      </table>
						  {{ $members->links('pagination.simple') }}
					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
@endsection
@section('css')
<link href="{{asset('assets/admin/js/plugins/msgbox/jquery.msgbox.css')}}" rel="stylesheet">
@endsection
@section('script')
<script src="{{asset('assets/admin/js/plugins/msgbox/jquery.msgbox.min.js')}}"></script>
<script>
@if(count($members) < 7)
$('.footer').attr('style','margin-top: 230px');
@endif
$("a#approve").click(function(){

    var teamid = $(this).attr("teamid");
 	$.msgbox("Are you sure that you want to approve this member?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.events.reg.approve') }}",
       {
         id: teamid,
		 type: "individual",
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Member Approved.'
			, position: 'top-right'
		});
		$('#raw'+teamid).remove();
       }
    );
		  }
		});	
});

$("a#remove").click(function(){

    var teamid = $(this).attr("teamid");
 	$.msgbox("Are you sure that you want to remove this member?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('admin.events.reg.remove') }}",
       {
         id: teamid,
		 type: "individual",
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Data removed.'
			, position: 'top-right'
		});
		$('#raw'+teamid).remove();
       }
    );
		  }
		});	
});
</script>
@endsection