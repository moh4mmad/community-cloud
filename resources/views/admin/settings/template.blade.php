@extends('admin.app')
@section('title') Template Settings @endsection

@section('content')
<div class="col-md-12">      		
      		<div class="widget stacked ">
      			
      		<div class="widget stacked ">
      			
      			<div class="widget-header">
      				<i class="icon-envelope"></i>
      				<h3>Template Settings</h3><button class="btn btn-info" data-toggle="modal" data-target="#codes">Short Codes</button>
  				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					
					
							<form id="edit-template" class="form-horizontal col-md-8">
								<fieldset>
									
									
									<div class="form-group">									
										<h5><b>Message Subject </b></h5>
										<br/>
											<input type="text" id="subject" class="form-control" value="{{$data->subject}}">
											
									</div>
									
									<div class="form-group">									
										<h5><b>Message body </b></h5>
										<br/>
											<textarea id="editor" class="form-control">{!!$data->body!!}</textarea>
											
									</div> <!-- /control-group -->

										<br />
									
										
									<div class="form-group">

										<div class="col-md-offset-4 col-md-8">
											<button type="submit" class="btn btn-primary">Update</button>
									</div> <!-- /form-actions -->
								</fieldset>
							</form>
					  
					  
					</div>
					
					
				</div> <!-- /widget-content -->
					
			</div>
			
			</div> <!-- /widget -->
@endsection
@section('modal')
<div class="modal fade" id="codes">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Short Codes</h4>
        </div>
                <div class="modal-body">
                    <div class="portlet-body">
					<div class="table-scrollable">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th> # </th>
									<th> CODE </th>
									<th> DESCRIPTION </th>
								</tr>
							</thead>
							<tbody>


								<tr>
									<td> 1 </td>
									<td> <pre>&#123;&#123;ip&#125;&#125;</pre> </td>
									<td> IP address of the user</td>
								</tr>

								<tr>
									<td> 2 </td>
									<td> <pre>&#123;&#123;destruct_time&#125;&#125;</pre> </td>
									<td> The destruction time of the message</td>
								</tr>

								<tr>
									<td> 3 </td>
									<td> <pre>&#123;&#123;url&#125;&#125;</pre> </td>
									<td> The URL of the message</td>
								</tr>



							</tbody>
						</table>
					</div>
				</div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('css')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection
@section('script')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script>
$('textarea#editor').summernote({
  height: 450, 
  codemirror: {
    theme: 'monokai'
  }
});

$(function() {
    $('#edit-template').on('submit', function(e) {
        e.preventDefault();
		
		var subject = $("#subject").val();
		var body = $("#editor").val();
	    
		var request;
		
	   request = $.post("{{ route('TemplateUP') }}",
       {
		 subject: subject,
		 body: body,
         _token: '{{ csrf_token() }}',
       });
       
	   request.done(function(data, statusText, xhr) {
		   var status = xhr.status;
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Template updated successfully.'
			, position: 'top-right'
		});
       });
	  	
		request.fail(function (jqXHR, textStatus, errorThrown){
		var message = jQuery.parseJSON(jqXHR.responseText);
        $.msgGrowl ({
			type: 'error'
			, title: 'Updating failed'
			, text: message.message
			, position: 'top-right'
		});
		});

	   
		});
		});

</script>
@endsection