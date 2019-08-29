<?php $__env->startSection('title'); ?> Administrator Login <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="account-container stacked">
	
	<div class="content clearfix">
		
		<form id="signin" method="post">
		
			<h1>Sign In</h1>		
			
			<div class="login-fields">
				
				<p>Sign in to administrator panel</p>
				<?php echo e(csrf_field()); ?>

				<div class="field">
					<label for="username">Username:</label>
					<input type="text" name="username" placeholder="Username" class="form-control input-lg username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" name="password" placeholder="Password" class="form-control input-lg password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input name="remember" type="checkbox" class="field login-checkbox" value="1" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
									
				<button id="button" class="login-action btn btn-primary" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading">Sign In</button>
				
			</div> 
			
		</form>
		
	</div> <!-- /content -->
</div> 
<div class="login-extra">
	Reset <a href="<?php echo e(route('admin.forget.pass')); ?>">Password</a>
</div> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
        url: "<?php echo e(route('admin.login')); ?>",
        type: "post",
        data: serializedData
		});
 
    request.done(function (response, textStatus, jqXHR){
	window.location.href="<?php echo e(route('admin.dashboard')); ?>";
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
			, position: 'top-center'
		});
		$("#button").prop("disabled",false);
    });
    });
		});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.auth.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>