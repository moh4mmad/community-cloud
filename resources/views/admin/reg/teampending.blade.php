@extends('admin.app')
@section('title') Pending Registration @endsection

@section('content')
<div class="col-md-12"> 
<div class="widget stacked">
							
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Registration pending team information</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Team name</th>
					            <th>Gender</th>
								<th>Email</th>
								<th>Members</th>
								<th>Transaction id</th>
								<th>Sender</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							@if(sizeof($teams) == 0)
							<td style="text-align: center;" colspan="8"> No data yet </td>
							@endif
							 @foreach($teams as $key=>$team)
					          <tr id="raw{{$team->id}}">
					            <td>{{$key+1}}</td>
					            <td>{{$team->team_name}}</td>
								<td>{{$team->team_gender}}</td>
								<td>{{$team->team_email}}</td>
								<td>{{$team->total_team_member}}</td>
								<td>{{$team->transaction_id}}</td>
								<td>{{$team->sender}}</td>
					            <td width="35%">
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#teammembers{{$team->id}}">Members</a>
								<a class="btn btn-success btn-sm"  id="approve" teamid="{{$team->id}}">Approve</a>
								<a class="btn btn-danger btn-sm" id="remove" teamid="{{$team->id}}">Remove</a>
								</td>
					          </tr>
					         @endforeach
					        </tbody>
					      </table>
						  {{ $teams->links('pagination.simple') }}
					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
@endsection
@section('modal')
@foreach($teams as $team)
<div class="modal fade" id="teammembers{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Team members</h5>

      </div>
      <div class="modal-body">
		<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>Id</th>
								<th>Name</th>
					            <th>Email</th>
								<th>Phone</th>
								<th>University</th>
								<th>Department</th>
								<th>Semester</th>
					          </tr>
					        </thead>
					        <tbody>
							@php
							$members = \App\TeamMembers::where('team_id', $team->id)->get();
							@endphp
							@foreach($members as $member)
					          <tr>
					            <td>{{$member->student_id}}</td>
								<td>{{$member->name}}</td>
								<td>{{$member->email}}</td>
								<td>{{$member->phone}}</td>
								<td>{{$member->institute}}</td>
								<td>{{$member->department}}</td>
								<td>{{$member->semester}}</td>
					          </tr>
					         @endforeach
							</tbody>
					      </table>
					  </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection
@section('css')
<link href="{{asset('assets/admin/js/plugins/msgbox/jquery.msgbox.css')}}" rel="stylesheet">
@endsection
@section('script')
<script src="{{asset('assets/admin/js/plugins/msgbox/jquery.msgbox.min.js')}}"></script>
<script>
@if(count($teams) < 7)
$('.footer').attr('style','margin-top: 230px');
@endif
$("a#approve").click(function(){

    var teamid = $(this).attr("teamid");
 	$.msgbox("Are you sure that you want to approve this team?", {
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
		 type: "team",
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Team Approved.'
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
 	$.msgbox("Are you sure that you want to remove this team?", {
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
		  type: "team",
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'data removed.'
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