@extends('admin.app')
@section('title') Registered Members @endsection

@section('content')
<div class="col-md-12"> 
<div class="widget stacked">
							
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Registered Members</h3>
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
								<td>
								<a class="btn btn-info btn-sm">Edit</a>
								<a class="btn btn-info btn-sm">Send mail</a>
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
@section('script')
<script>
@if(count($members) < 7)
$('.footer').attr('style','margin-top: 230px');
</script>
@endif
@endsection