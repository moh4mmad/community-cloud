<?php $__env->startSection('title'); ?>Resources - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Resources - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - Resources <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - Resources <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>Resources, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_image'); ?><?php echo e($front->og_img); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div id="wrapper">
        <header>
		<?php echo $__env->make('front.mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('front.mobilemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>Resources</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Resources</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="section-space accent-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <ul class="profile-title">
                            <li class="active"><a href="<?php echo e(route('teacher.resources')); ?>" >Resources</a></li>
							<li><a href="<?php echo e(route('teacher.resources.upload')); ?>" >Upload resource</a></li>
							<li><a href="<?php echo e(route('teacher.profile')); ?>">Profile</a></li>
                            <li><a href="<?php echo e(route('teacher.logout')); ?>">Sign out</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="profile-details tab-content">
                                <div class="tab-pane fade active in">
									<h3 class="title-section title-bar-high mb-40">Resources</h3>
									
			<?php if(session('success')): ?>
		<div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
		<?php endif; ?>
		
		<?php if(session('alert')): ?>
		<div class="alert alert-danger" role="alert"><?php echo e(session('alert')); ?></div>
		<?php endif; ?>

		<?php if($errors->any()): ?>
			<div class="alert alert-danger" role="alert">
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo e($error); ?> <br>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<?php endif; ?>
									<form method="post" action="<?php echo e(route('teacher.resources.search')); ?>">
										<?php echo e(csrf_field()); ?>

									<div class="input-group col-xs-4">
									<input type="text" name="search" placeholder="search resource" class="form-control">
									<span class="input-group-btn">
									<button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i></button>
									</span>
									</div>
									</form>
									</br>
									
									<div class="table-responsive">
                                            <table class="table table-bordered table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th>Uploaded By</th>
                                                        <th>Uploaded Date</th>
                                                        <th>Attachment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php if( sizeof($resources) == 0): ?>
													<td colspan="4" style="text-align: center">No data found</td>
												<?php endif; ?>
												<?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php
												$date = \Carbon\Carbon::parse($resource->created_at, 'UTC');
												?>
                                                    <tr>
                                                        <th><?php echo e($resource->description); ?></th>
                                                        <td><?php echo e($resource->created_by); ?></td>
														<td><?php echo e($date->format('d-m-Y h:m A')); ?></td>
                                                        <td>
                                                            <a href="<?php echo e(route('teacher.resources.download', $resource->secret)); ?>" title="download" style="color: #8a0000;" class="btn-view"><?php echo e($resource->filename); ?></a>
                                                        </td>
                                                    </tr>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
											<?php echo e($resources->links('pagination.simple')); ?>

                                        </div>
                                </div>
                             </div>
                    </div>
                </div>
            </div>
        </div>
	 
</div>
<?php $__env->stopSection(); ?>	
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>