@extends('admin.app')
@section('title') My Profile @endsection

@section('content')
<div class="col-md-12">      		
      		
      		<div class="widget stacked ">
      			
      			<div class="widget-header">
      				<i class="icon-user"></i>
      				<h3>My profile</h3>
  				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					
					
							<form id="edit" class="form-horizontal col-md-8">
								<fieldset>
									
									{{ csrf_field() }}
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Name</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="name" value="{{$admin->name}}">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="form-group">											
										<label for="firstname" class="col-md-4">Username</label>
										<div class="col-md-8">
											<input type="text" class="form-control" disabled value="{{$admin->username}}">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="form-group">											
										<label for="firstname" class="col-md-4">Email</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="email" value="{{$admin->email}}">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="form-group">											
										<label for="firstname" class="col-md-4">Password</label>
										<div class="col-md-8">
											<input type="text" class="form-control" autocomplete="off" name="password" placeholder="leave blank if you dont want to change" value="">
										</div> <!-- /controls -->				
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
					
			</div> <!-- /widget -->
      
@endsection
@section('script')
<script>
$(function() {
     
	 $('#edit').on('submit',function(event){
		
	   var request;
	   event.preventDefault();
		
		var $form = $(this);
		var $inputs = $form.find("input");
		var serializedData = $form.serialize();
		
		request = $.ajax({
        url: "{{ route('admin.profileupdate') }}",
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
        $.each( message.errors, function( key, value) {
            errorString = value;
        });

        $.msgGrowl ({
			type: 'error'
			, title: message.message
			, text: errorString
		});
    });
    });
		});

</script>
@endsection