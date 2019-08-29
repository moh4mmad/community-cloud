<?php $__env->startSection('title'); ?> Password reset <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="account-container register stacked">
	
	<div class="content clearfix">
		
		<form id="signin" method="post">
		
			<h1>Reset password</h1>		
			<hr style="border: 1px dotted #CCC;"></hr>
			<div class="login-fields">
				<p>Enter new password:</p>
				<?php echo e(csrf_field()); ?>

				<div class="field">
					<label for="email">Email Address:</label>
					<input type="text" value="<?php echo e($email); ?>" disabled class="form-control"/>
				</div>
				<div class="field">
					<label for="email">New password:</label>
					<input type="text" name="password" placeholder="New password" class="form-control"/>
				</div>
			</div> <!-- /login-fields -->
			
			<div class="login-actions">		
				<button style="float: left;" id="button" class="login-action btn btn-primary">Submit</button>
				
			</div> 
			
		</form>
		
	</div> <!-- /content -->
</div> 
<div class="login-extra">
	Go back to <a href="<?php echo e(route('admin.login')); ?>">Login</a>
</div> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
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
        url: "<?php echo e(route('admin.forget.reset.post', $token)); ?>",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.auth.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>