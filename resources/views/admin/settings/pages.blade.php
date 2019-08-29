@extends('admin.app')
@section('title') Attachment Settings @endsection

@section('content')
<div class="col-md-12">      		
      		
      		<div class="widget stacked ">
      			
      			<div class="widget-header">
      				<i class="icon-html5"></i>
      				<h3>Page content Settings</h3>
  				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<div class="tabbable">
					<ul class="nav nav-tabs">
					  <li class="active">
					    <a href="#about" data-toggle="tab">About</a>
					  </li>
					  <li><a href="#faq" data-toggle="tab">FAQ</a></li>
					  <li><a href="#privacy" data-toggle="tab">Privacy</a></li>
					  <li><a href="#support" data-toggle="tab">Support</a></li>
					</ul>
					<form id="edit" class="form-horizontal col-md-8">
					{{ csrf_field() }}
					<div class="tab-content">
							<div class="tab-pane active" id="about">
							
								<fieldset>
								
											<textarea id="editor" name="about" class="form-control" rows="6">{{$data->about}}</textarea>
										<br />
									
								</fieldset>
							
					  </div>
					  
					  <div class="tab-pane" id="faq">
							
								<fieldset>
								
											<textarea id="editor" name="faq" class="form-control" rows="6">{{$data->faq}}</textarea>
										<br />
									
										
								</fieldset>
							
					  </div>
					  
					  <div class="tab-pane" id="privacy">
						
								<fieldset>
								
											<textarea id="editor" name="privacy" class="form-control" rows="6">{{$data->privacy}}</textarea>
										<br />
									
								</fieldset>
					  </div>
					  
					  <div class="tab-pane" id="support">
							
								<fieldset>
								
								   <textarea id="editor" name="support" class="form-control" rows="6">{{$data->support}}</textarea>
								<br/>
									
									

										
								
								</fieldset>
							
					  </div>
					  <div class="form-group">
					  <div class="col-md-offset-4 col-md-8">
											<button type="submit" class="btn btn-primary">Update</button>
									</div> <!-- /form-actions -->
									</div>
					</div>
					</form>
					
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
$(document).ready(function() {
  $('textarea#editor').summernote();
});

$(function() {
     
	 $('#edit').on('submit',function(event){
		
	   var request;
	   event.preventDefault();
		
		var $form = $(this);
		var $inputs = $form.find("textarea");
		var serializedData = $form.serialize();
		
		request = $.ajax({
        url: "{{ route('pageup') }}",
        type: "post",
        data: serializedData
		});
 
    request.done(function (response, textStatus, jqXHR){
	$.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Updated successfully'
		});
    });
 
    request.fail(function (jqXHR, textStatus, errorThrown){
		var message = jQuery.parseJSON(jqXHR.responseText);
        $.msgGrowl ({
			type: 'error'
			, title: 'Updating failed'
			, text: message.message
		});
    });
    });
		});

</script>
@endsection
