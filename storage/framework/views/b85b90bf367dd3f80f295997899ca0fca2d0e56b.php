<?php $__env->startSection('title'); ?> My profile | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="wrapper">
        <div class="container-fluid">

<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">My profile</h4></div>
                </div>
            </div>
                        
<div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card">
					<div class="card-body">
                                <form action="<?php echo e(route('accountant.profileup')); ?>" method="post">
								<?php echo e(csrf_field()); ?>

								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Name</h6>
								  <input type="text" class="form-control" name="name" required="required" value="<?php echo e($user->name); ?>">
							    </div>
								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Username</h6>
								 <input type="text" class="form-control" value="<?php echo e($user->username); ?>" disabled>
							    </div>
								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Email</h6>
								  <input type="email" class="form-control" name="email" required="required" placeholder="<?php echo e($user->email); ?>" value="<?php echo e($user->email); ?>">
							    </div>
								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Password</h6>
								  <input type="password" name="password" class="form-control" placeholder="Leave blank if you don't want to change">
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
<?php echo $__env->make('accountant.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>