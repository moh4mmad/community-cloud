@extends('admin.auth.app')
@section('title') Password reset @endsection

@section('content')
<div class="account-container register stacked">
	
	<div class="content clearfix">
		
		<form id="signin" method="post">
		
			<h1>Reset password</h1>		
			<hr style="border: 1px dotted #CCC;"></hr>
			<div class="login-fields">
				<p>Enter your email address</p>
				{{ csrf_field() }}
				<div class="field">
					<label for="email">Email Address:</label>
					<input type="text" name="email" placeholder="Email" class="form-control"/>
				</div>
			</div> <!-- /login-fields -->
			
			<div class="login-actions">		
				<button style="float: left;" id="button" class="login-action btn btn-primary">Submit</button>
				
			</div> 
			
		</form>
		
	</div> <!-- /content -->
</div> 
<div class="login-extra">
	Go back to <a href="{{ route('admin.login') }}">Login</a>
</div> 
@endsection
@section('script')
<script>
$(function() {
     
	 $('#signin').on('submit',function(event){

	   $("#button").prop("disabled",true);
   	   var request;
	   event.preventDefault();
		
		var $form = $(this);
		var $inputs = $form.find("input");
		var serializedData = $form.serialize();
		
		request = $.ajax({
        url: "{{ route('admin.forget.pass.post') }}",
        type: "post",
        data: serializedData
		});
 
    request.done(function (response, textStatus, jqXHR){
	var message = jQuery.parseJSON(jqXHR.responseText);
		$.each( message.data, function( key, value) {
            String = value;
        });
        $.msgGrowl ({
			type: 'success'
			, title: message.message
			, text: String
			, closeTrigger: true
		});
		$("#button").prop("disabled",true);
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
		$("#button").prop("disabled",false);
    });
    });
		});

</script>
@endsection