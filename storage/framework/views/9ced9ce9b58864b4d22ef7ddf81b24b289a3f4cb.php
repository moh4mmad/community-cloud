<?php $__env->startSection('title'); ?> Students | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Students data</h4></div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-xl">
                    <div class="card">
					
					<li class="list-inline-item hide-phone app-search">
					<form role="search" method="post" action="<?php echo e(route('accountant.students.search')); ?>">
					<?php echo e(csrf_field()); ?>

					<input type="text" name="search" value="<?php echo e($data ? $data['search'] : ""); ?>" placeholder="Search student" class="form-control"> <a onclick="$(this).closest('form').submit()" href="#"><i class="fa fa-search">
					</i>
					</a>
					</form>
					</li>

                        <div class="card-body new-user">
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Id</th>
											<th class="border-top-0">Dept.</th>
											<th class="border-top-0">Name</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">Email</th>
											<th class="border-top-0">Guardian's phone</th>
											<th style="" width="30%" class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									        <td><?php echo e($student->student_id); ?></td>
											<td><?php echo e($student->Department->short); ?></td>
                                            <td><?php echo e($student->name); ?></td>
											<td><?php echo e($student->phone); ?></td>
											<td><?php echo e($student->email); ?></td>
											<td><?php echo e($student->Guardian->phone); ?></td>
											<td>
											<a style="" type="button" href="<?php echo e(route('accountant.students.view', $student->student_id)); ?>" class="btn btn-primary waves-effect waves-light btn-sm">View</a>
											<a style="" type="button" href="<?php echo e(route('accountant.students.deposid', $student->student_id)); ?>" class="btn btn-primary waves-effect waves-light btn-sm">Deposits</a>
											<a style="" type="button" href="<?php echo e(route('accountant.students.billing', $student->student_id)); ?>" class="btn btn-primary waves-effect waves-light btn-sm">Billing</a>
											</td>
											
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								<?php echo e($students->render()); ?>

								</div>
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>

            
        </div>
        
    </div>
	
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('accountant.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>