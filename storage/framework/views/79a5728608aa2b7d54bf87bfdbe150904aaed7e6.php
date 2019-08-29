<?php $__env->startSection('title'); ?> Student Id generator | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Generate student id card</h4>
						</div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <div class="card">
					<div class="card-body">
                                <form action="<?php echo e(route('acad.idcard.generate')); ?>" method="post">
								<?php echo e(csrf_field()); ?>

								<div class="col-sm-4">
								<div class="form-inline form-group mb-0">
								 <h6 class="sub-title mb-3">Student Id</h6>
								  <input type="text" name="studentid" placeholder="Student Id" class="form-control">
							    </div>
								</div>
								<div class="col-sm-4">
								<div class="form-group form-group mb-0">
								 <h6 class="sub-title mb-3">Validity</h6>
								  <select class="form-control" name="validity">
														<option selected validity>Select validity</option>
														<option value="1">1 Year</option>
														<option value="2">2 Year</option>
														<option value="3">3 Year</option>
														<option value="4">4 Year</option>
														</select>
							    </div>
								</div><br>
								
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
<?php echo $__env->make('acad.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>