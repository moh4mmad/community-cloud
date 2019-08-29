<?php $__env->startSection('title'); ?> Select department | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Select department</h4> 
						</div>
                </div>
            </div>

			
			
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card">
                        <div class="card-body new-user">
						
						<form action="<?php echo e(route('admin.course.select')); ?>" method="post">
						<?php echo e(csrf_field()); ?>

						<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Select Department</h6>
								 
								 <select class="form-control" id="dept" name="dept">
										<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($dept->short); ?>"><?php echo e($dept->short); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
								 
							    </div>
						<br></br>
								<div class="form-group mb-0">
								<div>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>