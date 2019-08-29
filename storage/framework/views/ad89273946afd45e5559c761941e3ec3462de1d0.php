<?php $__env->startSection('title'); ?> New student Registration | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

                    <div class="form-items">
                        <h3>New student Registration</h3>
						<hr>
						<div class="alert alert-warning" role="alert"><p>
						Don't provide any wrong information, Your data will be verified by the department
						</p>
						</div>
                        <form method="post" action="<?php echo e(route('register')); ?>">
						<?php echo e(csrf_field()); ?>

						
						<?php if(session('success')): ?>
                        <div class="alert alert-success" role="alert"><p><?php echo e(session('success')); ?></p>
                        </div>
                        <?php endif; ?>
                         <?php if(session('alert')): ?>
						 <div class="alert alert-danger" role="alert"><p> <?php echo e(session('alert')); ?> </p></div>
                        <?php endif; ?>
                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($error); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
						
                            <input class="form-control" type="text" name="student_id" placeholder="Enter Student ID" value="<?php echo e(old('student_id')); ?>" required>
                            <input class="form-control" type="text" name="name" placeholder="Enter Full name" value="<?php echo e(old('name')); ?>" required>
                            <input class="form-control" type="text" name="email" placeholder="Enter email" value="<?php echo e(old('email')); ?>" required>
                            <input class="form-control" type="text" name="phone" placeholder="Enter phone" value="<?php echo e(old('phone')); ?>" required>
                            <input class="form-control" type="text" name="password" placeholder="Enter password" required>
                            <input class="form-control" type="text" name="semester" placeholder="Enter semester" value="<?php echo e(old('semester')); ?>" required>
                            <input class="form-control" type="text" name="section" placeholder="Enter section" value="<?php echo e(old('section')); ?>" required>
                            

                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
						<br>
						<div class="page-links">
                            <a href="<?php echo e(route('index')); ?>">Back to login</a>
                        </div>
                        <div class="other-links">
                            <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle"></i>FAQ</a>
							<a href="#"><i class="fa fa-info-circle"></i>About this system</a>
                        </div>
                        <div class="footer-copyright text-center py-3">&copy; 2019 Developed by:
      <a href="https://fb.me/s4k1b"> Sakib</a>
    </div>
                    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.html.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>