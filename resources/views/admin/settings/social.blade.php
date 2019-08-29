@extends('admin.app')
@section('title') Frontend Settings @endsection
@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
@endsection
@section('content')
<div class="col-md-12">      		
      		
      		<div class="widget stacked ">
      			
      			<div class="widget-header">
      				<i class="icon-facebook"></i>
      				<h3>Social ICONS </h3><button class="btn btn-success" data-toggle="modal" data-target="#addsociallink">Add new Social link</button>
  				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Font-Awesome ICON</th>
					            <th>URL</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							@php
							$count = count($data);
							@endphp
							@if($count == 0)
							<td style="text-align: center;" colspan="5"> No social ids </td>
							@endif
							@foreach($data as $key=>$msg)
					          <tr id="raw{{$msg->id}}">
					            <td>{{$key+1}}</td>
					            <td>{{$msg->icon}}</td>
								<td>{{$msg->url}}</td>
								<td><a class="btn btn-default" data-toggle="modal" data-target="#edit{{$msg->id}}">Edit</a>
								<a class="btn btn-danger" id="remove" msgid="{{$msg->id}}">Remove</a>
								</td>
					          </tr>
					         @endforeach
							 
					        </tbody>
					      </table>
						  <?php echo $data->render(); ?>
					  </div> 
					
							
					  
					  
					</div>
					
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->
      
@endsection
@section('modal')

   <div class="modal fade" id="addsociallink">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add new social link</h4>
        </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form name="addsociallink" method="post" role="form">
                                <div class="form-group">
                                    <label class="col-md-4">Fontawesome Icon :</label>
									<div class="col-md-8">
									<div class="input-group">
                                    <input class="form-control" value="" id="fontawesome_icon" required>
									<div class="input-group-btn"> <a href="https://fontawesome.com/icons" target="_blank" class="btn btn-default" ><span class="fas fa-question-circle"></span></a> </div>
									</div>
                                    </div>
                                </div>
								<br><br/>
                                <div class="form-group">
                                    <label class="col-md-4">URL :</label>
									<div class="col-md-8">
                                    <input class="form-control" id="social_url" required>
									</div>
                                </div>
								<br><br/>
                                <button class="btn btn-success pull-right">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@foreach($data as $room)
   <div class="modal fade" id="edit{{$room->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4>
        </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form name="edit{{$room->id}}" method="post" role="form">
							<input type="hidden" name="sid" value="{{$room->id}}">
                                <div class="form-group">
                                    <label class="col-md-4">Fontawesome Icon :</label>
									<div class="col-md-8">
									<div class="input-group">
                                    <input class="form-control" value="{{$room->icon}}" id="icon{{$room->id}}" required>
									<div class="input-group-btn"> <a href="https://fontawesome.com/icons" target="_blank" class="btn btn-default" ><span class="fas fa-question-circle"></span></a> </div>
									</div>
                                    </div>
									</div>
                                </div>
								<br><br/>
                                <div class="form-group">
                                    <label class="col-md-4">URL :</label>
									<div class="col-md-8">
                                    <input class="form-control" value="{{$room->url}}" id="url{{$room->id}}" required>
									</div>
                                </div>
								<br><br/>
                                <button class="btn btn-success pull-right">Update</button>
                            </form>
                        </div>
                    </div>
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

$(function() {
    $('#addsociallink').on('submit', function(e) {
        e.preventDefault();
		var icon = $("#fontawesome_icon").val();
		var url = $("#social_url").val();
	  $.post("{{ route('socialadd') }}",
	   {
		 icon: icon,
		 url: url,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, xhr) {
		   var status = xhr.status;
		   if(status == 200){
		   $("#addsociallink").modal("hide");
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Social link added Successfully.'
		});
		setTimeout(function() {location.reload();}, 2000);
		}
       });		
		});
		});
		
@foreach($data as $room)

$(function() {
    $('#edit{{$room->id}}').on('submit', function(e) {
        e.preventDefault();
		var sid = "{{ $room->id }}";
		var icon = $("#icon{{$room->id}}").val();
		var url = $("#url{{$room->id}}").val();
	  $.post("{{ route('editsocial') }}",
       {
         id: sid,
		 icon: icon,
		 url: url,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, xhr) {
		   var status = xhr.status;
		   if(status == 200){
		   $("#edit{{$room->id}}").modal("hide");
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Social link Edited Successfully.'
		});
		}
       });		
		});
		});
@endforeach



$("a#remove").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to permanently delete this ?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('removesocial') }}",
       {
         id: msgid,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Social link removed.'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});

</script>
@endsection