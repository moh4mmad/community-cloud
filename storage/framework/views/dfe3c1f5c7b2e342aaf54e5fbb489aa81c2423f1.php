<?php $__env->startSection('title'); ?> Student Completed Courses | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Student Completed Courses</h4></div>
                </div>
            </div>
			
			<?php if(count($courses)): ?>
			<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-user-graduate"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($student->name); ?></h5>
                            <p class="mb-0 text-muted"><strong>Student name</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
	<div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-university"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($student->Department->short); ?></h5>
                            <p class="mb-0 text-muted"><strong>Department</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
	
	<div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-graduation-cap"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($student->Completed_Course_CGPA()); ?></h5>
                            <p class="mb-0 text-muted"><strong>CGPA</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
	<div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-book"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($student->TotalCourseCreditCompleted()); ?></h5>
                            <p class="mb-0 text-muted"><strong>Credit completed</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
	</div>	
<?php endif; ?>
            <div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body new-user">
						
						   <div style="border: 1px solid #dee2e6;" class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
										    <th width="2%" class="border-top-0">SL.</th>
											<th width="12%" class="border-top-0">Course code</th>
											<th width="35%" class="border-top-0">Course name</th>
                                            <th width="5%" class="border-top-0">Credit</th>
											<th width="5%" class="border-top-0">Point</th>
                                            <th width="5%" class="border-top-0">Grade</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($courses)): ?>  <td colspan="6" style="text-align: center">No data found </td> <?php endif; ?>
									<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										    <td><?php echo e($count+1); ?></td>
											<td><?php echo e($course->course_code); ?></td>
											<td><?php echo e($course->Course->course_name); ?></td>
											<td><?php echo e(number_format($course->Course->credit, 2)); ?></td>
											<td><?php echo e(number_format($course->grade_point, 2)); ?></td>
											<td><?php echo e($course->grade_letter); ?></td>
											
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>
            
        </div>
        
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>