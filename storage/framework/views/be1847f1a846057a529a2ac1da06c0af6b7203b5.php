<?php $__env->startSection('title'); ?>
Add new admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

            <div class="page-header">
              <h1>Add new admin</h1>
            </div>
			
			        <div class="row">
				    <div class="col-xs-6 col-md-6">
				        
				        <!-- panel start -->
				        <div class="panel panel-default">
				            <div style="padding: 14px 16px" class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-user"></i> Admin Register</h3>
				            </div>
			
			<div class="panel-body">
				<form class="login-form" role="form" method="POST" action="<?php echo e(route('admin.register')); ?>">
					<?php echo e(csrf_field()); ?>

					
					<div class="form-group">
                                    <label for="text-input-default">Full Name</label>
                                     <input type="text" class="form-control input-lg" name="name" value="<?php echo e(old('name')); ?>"  >
                        </div>
						<div class="form-group">
                                    <label for="text-input-default">E-Mail</label>
                                     <input type="text" class="form-control input-lg" name="email" value="<?php echo e(old('email')); ?>"  >
                        </div>
						<div class="form-group">
                                    <label for="text-input-default">Username</label>
                                     <input type="text" class="form-control input-lg" name="username" value="<?php echo e(old('username')); ?>" >
                        </div>
						
						<div class="form-group">
                                    <label for="text-input-default">New Password</label>
                                    <input type="text" class="form-control input-lg" name="password"  >
                        </div>
						
						
						<div class="form-group">
                                    <label for="text-input-default">Confirm Password</label>
                                    <input type="text" class="form-control input-lg" name="password_confirmation"  >
                        </div>
							
						
					<div class="row">
						<hr/>
						<div class="col-md-6 col-md-offset-3">
							<button class="btn btn-success btn-block btn-lg">Update</button>
						</div>
					</div>
					</form>
					</div>
				        </div>
				    </div>
				</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.html.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>