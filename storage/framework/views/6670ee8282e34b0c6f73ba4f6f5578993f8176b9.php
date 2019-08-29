<?php $__env->startSection('title'); ?> Mailer settings | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Mailer settings</h4>
						</div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card">
					<div class="card-body">
                                <form action="<?php echo e(route('admin.mail.update')); ?>" method="post">
								<?php echo e(csrf_field()); ?>

								
								<div class="form-group mb-0">											
										<h6 class="sub-title mb-3">Driver</h6>
										
											<input type="text" class="form-control" name="driver" value="<?php echo e($mailer->driver); ?>">
										 			
									</div> 

									<div class="form-group mb-0">											
										<h6 class="sub-title mb-3">Host</h6>
										
											<input type="text" class="form-control" name="host" value="<?php echo e($mailer->host); ?>">
										 			
									</div> 

									<div class="form-group mb-0">											
										<h6 class="sub-title mb-3">Port</h6>
										
											<input type="text" class="form-control" name="port" value="<?php echo e($mailer->port); ?>">
										 			
									</div> 

									<div class="form-group mb-0">											
										<h6 class="sub-title mb-3">Mail from address</h6>
										
											<input type="text" class="form-control" name="from_address" value="<?php echo e($mailer->from_address); ?>">
										 			
									</div> 

									<div class="form-group mb-0">											
										<h6 class="sub-title mb-3">Mail from</h6>
										
											<input type="text" class="form-control" name="from_name" value="<?php echo e($mailer->from_name); ?>">
										 			
									</div> 

									<div class="form-group mb-0">											
										<h6 class="sub-title mb-3">Encryption</h6>
										
											<input type="text" class="form-control" name="encryption" value="<?php echo e($mailer->encryption); ?>">
										 			
									</div> 

									<div class="form-group mb-0">											
										<h6 class="sub-title mb-3">Username</h6>
										
											<input type="text" class="form-control" name="username" value="<?php echo e($mailer->username); ?>">
										 			
									</div> 

									<div class="form-group mb-0">											
										<h6 class="sub-title mb-3">Password</h6>
										
											<input type="text" class="form-control" name="password" value="<?php echo e($mailer->password); ?>">
										 			
									</div> 
								
								<br></br>
								<div class="form-group mb-0">
								<div>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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