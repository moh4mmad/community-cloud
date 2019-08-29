<?php $__env->startSection('title'); ?> My Profile <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12">      		
      		
      		<div class="widget stacked ">
      			
      			<div class="widget-header">
      				<i class="icon-user"></i>
      				<h3>My profile</h3>
  				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					
					
							<form id="edit" class="form-horizontal col-md-8">
								<fieldset>
									
									<?php echo e(csrf_field()); ?>

									<div class="form-group">											
										<label for="firstname" class="col-md-4">Name</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="name" value="<?php echo e($admin->name); ?>">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="form-group">											
										<label for="firstname" class="col-md-4">Username</label>
										<div class="col-md-8">
											<input type="text" class="form-control" disabled value="<?php echo e($admin->username); ?>">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="form-group">											
										<label for="firstname" class="col-md-4">Email</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="email" value="<?php echo e($admin->email); ?>">
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
      
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
$(function() {
     
	 $('#edit').on('submit',function(event){
		
	   var request;
	   event.preventDefault();
		
		var $form = $(this);
		var $inputs = $form.find("input");
		var serializedData = $form.serialize();
		
		request = $.ajax({
        url: "<?php echo e(route('admin.profileupdate')); ?>",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>