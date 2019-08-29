@extends('admin.app')
@section('title') Messages @endsection

@section('content')
<div class="col-md-12"> 
<div class="widget stacked">
				
				<div class="widget-header">
					<i class="icon-envelope"></i>
					<h3>Messages</h3>
				</div> 
				<div class="widget-content">
					
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>IP</th>
					            <th>Status</th>
					            <th>Content</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							@php
							$count = count($msgs);
							@endphp
							@if($count == 0)
							<td style="text-align: center;" colspan="5"> No message yet </td>
							@endif
							@foreach($msgs as $key=>$msg)
					          <tr id="raw{{$msg->id}}">
					            <td>{{$key+1}}</td>
					            <td>{{$msg->by}}</td>
					            <td>@if($msg->viewcount == 0) Read @else Unread @endif</td>
								<td><a class="btn btn-default" id="viewcontent" msgid="{{$msg->id}}">View</a></td>
								<td width="30%"><a class="btn btn-danger" id="remove" msgid="{{$msg->id}}">Remove</a>
								@if($msg->attachment == 1) 
								<a href="{{ route('DownloadAttach', $msg->id) }}" class="btn btn-default">Download attachment</a>
							    @endif
								</td>
					          </tr>
					         @endforeach
							 
					        </tbody>
					      </table>
						  <?php echo $msgs->render(); ?>
					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
@endsection
@section('modal')

  <div class="modal fade" id="content">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Content</h4>
        </div>

        <div class="modal-body">
		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('css')
<link href="{{asset('assets/admin/js/plugins/msgbox/jquery.msgbox.css')}}" rel="stylesheet">
@endsection
@section('script')
<script src="{{asset('assets/admin/js/plugins/msgbox/jquery.msgbox.min.js')}}"></script>

<script>
@php
$count = count($msgs);
if($count < 5){
echo "$('.footer').attr('style','margin-top: 230px');";
}
@endphp

$("a#viewcontent").click(function(){

    $.post("{{ route('showcontent') }}",
       {
         id: $(this).attr("msgid"),
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		 $('#content').modal('show');
		 var mdl = $('#content');
						var data = resObject.responseJSON.message.content;
						$('#content .modal-body').empty();
						mdl.find('.modal-body').append("<p>" +data+ "</p>");
		 
		 
       }
    );

    return false;
});

var dltraw = false;
$("a#remove").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to permanently delete this message?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("{{ route('RemoveMSG') }}",
       {
         id: msgid,
         _token: '{{ csrf_token() }}',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Message removed.'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});

</script>
@endsection