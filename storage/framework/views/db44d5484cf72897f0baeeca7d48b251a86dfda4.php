<?php $__env->startSection('title'); ?> Exam admit card generator | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Generate student exam admit card</h4>
						</div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <div class="card">
					<div class="card-body">
                                <form action="<?php echo e(route('admin.admitcard.generate')); ?>" method="post">
								<?php echo e(csrf_field()); ?>

								<div class="col-sm-4">
								<div class="form-inline form-group mb-0">
								 <h6 class="sub-title mb-3">Student Id</h6>
								  <input type="text" id="studentId" name="studentId" placeholder="Student Id" class="form-control">
								 <span id="name" class="ml-2"> </span>
							    </div>
								</div><br>
								<div class="col-sm-6">
								<p><strong id="payment" class="text-danger"></strong></p>
								</div>
								<div class="col-sm-4">
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Select exam</h6>
								  <select class="form-control" name="exam">
														<option selected disabled>Select exam</option>
														<option value="mid">Mid</option>
														<option value="final">Final</option>
														</select>
							    </div>
								</div>
								<br></br>
								<div class="col-sm-6">
								<div class="form-group mb-0">
								<div>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
	</div>
</div>
                                    
                                </form>
								
							</div>
					</div>
</div>
					</div>
            
        </div>
        
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

$('#studentId').on('change', function() {

$.post("<?php echo e(route('admin.admitcard.data')); ?>",
       {
		 studentId: $('#studentId').val(),
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {

		   $('#name').text(resObject.responseJSON.name);
		   if(resObject.responseJSON.payment == "due")
		   {
			   $('#payment').attr('class','text-danger');
			   $('#payment').text("Payment : Not done, Due amount : "+resObject.responseJSON.amount);
		   }
		   if(resObject.responseJSON.payment == "ok")
		   {
			   $('#payment').attr('class','text-success');
			   $('#payment').text("Payment : Ok, Advance amount : "+resObject.responseJSON.amount);
		   }
       }
    );
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>