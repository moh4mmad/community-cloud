<?php $__env->startSection('title'); ?> Frontend Settings <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12">      		
      		
      		<div class="widget stacked ">
      			
      			<div class="widget-header">
      				<i class="icon-envelope"></i>
      				<h3>Mailer Settings</h3>
  				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					
					
							<form id="mailer" class="form-horizontal col-md-8">
								<fieldset>
									
									<?php echo e(csrf_field()); ?>

									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">To</label>
										<div class="col-md-8">
										<select name="type" id="" class="form-control">
				                <option value="">Select</option>
				                <option value="individual">All students</option>
				                <option value="team">All subscribers</option>
				              </select>			
							  </div>
									</div> <!-- /control-group -->
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Subject</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="" value="">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									
									<div class="form-group">
            <label for="message-text" class="col-md-4">Content:</label>
			<div class="col-md-8">
            <textarea class="form-control" id="editor" name="content"> </textarea>
			</div>
          </div>
									
										<br />
									
										
									<div class="form-group">

										<div class="col-md-offset-4 col-md-8">
											<button type="submit" class="btn btn-info">Send</button>
									</div> <!-- /form-actions -->
								</fieldset>
							</form>
					  
					  
					</div>
					
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->
      
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/vendor/ckeditor/ckeditor.js')); ?>"></script>
<script>

	$('#mailer').on('submit',function(event){

	 
	 $.msgGrowl ({
			type: 'error'
			, title: 'Error'
			, text: 'Mail send Failed'
			, position: 'top-right'
		});
return false;
    });
	 
$("textarea").each(function(){
CKEDITOR.replace(this, {
      height: 200
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>