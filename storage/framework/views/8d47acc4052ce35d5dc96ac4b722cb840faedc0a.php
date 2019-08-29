<?php $__env->startSection('title'); ?> Student result | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Student result</h4></div>
                </div>
            </div>

			<?php if(!count($logs)): ?>
				<div class="alert alert-info font-18 text-center" role="alert"><strong>Info!</strong> No result found.</div>
			<?php endif; ?>
			<?php if(count($logs)): ?>
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
                            <h5 class="mt-0"><?php echo e($student->CGPA()); ?></h5>
                            <p class="mb-0 text-muted"><strong>Current CGPA</strong></p>
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
                            <h5 class="mt-0"><?php echo e($student->TotalCreditCompleted()); ?></h5>
                            <p class="mb-0 text-muted"><strong>Total credit completed</strong></p>
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
			
			<?php
			$cgpa_count = 0;
			$i = 0;
			?>
			<?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php
			$i++;
			?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body new-user">
						<div class="row grid-col">
						<div class="col-sm-6">
						<div class="pull-left">
						<?php
						$results = App\Results::where('student_id', $id)->where('season_id', $log->Season->id)->orderBy('created_at', 'desc')->get();
						$gpa_cal = 0;
						$total_credit = 0;
						foreach($results as $result)
						{
							$gpa_cal += $result->Course->credit * $result->Grade($result->total_mark)->grade_points;
							$total_credit += $result->Course->credit;
						}
						if($total_credit > 0){
						$gpa = $gpa_cal / $total_credit;
						}
						else {
						$gpa = 0;
						}
						$cgpa_count += $gpa;
						$SemesterCGPA = $cgpa_count / $i;
						?>
						<strong>Semester : <?php echo e($log->Season->season); ?></strong><br/>
						<strong>Credit completed : <?php echo e($student->CreditCompleted($log->Season->id)); ?></strong>
						</div>
						</div>
						<div class="col-sm-6">
						<div class="pull-right">
						<strong>GPA	: <?php echo e($student->GPA($log->Season->id)); ?></strong><br/>
						<strong>CGPA	: <?php echo e(number_format($SemesterCGPA,2)); ?></strong>
						</div>
						</div>
						</div>
						<br/>
						   <div style="border: 1px solid #dee2e6;" class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
										    <th width="2%" class="border-top-0">SL.</th>
											<th width="12%" class="border-top-0">Course code</th>
											<th width="35%" class="border-top-0">Course name</th>
                                            <th width="5%" class="border-top-0">Credit</th>
											<th width="8%" class="border-top-0">Total marks</th>
											<th width="5%" class="border-top-0">Point</th>
                                            <th width="5%" class="border-top-0">Grade</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php
									$results = App\Results::where('student_id', $id)->where('season_id', $log->Season->id)->orderBy('created_at', 'desc')->get();
									?>
									<?php if(!count($results)): ?>  <td colspan="8" style="text-align: center">No results data </td> <?php endif; ?>
									<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										    <td><?php echo e($count+1); ?></td>
									        <td><?php echo e($result->course_code); ?></td>
											<td><?php echo e($result->Course->course_name); ?></td>
											<td><?php echo e(number_format($result->Course->credit, 2)); ?></td>
											<td><?php echo e($result->total_mark); ?></td>
											<td><?php echo e(number_format($result->Grade($result->total_mark)->grade_points, 2)); ?></td>
											<td><?php echo e($result->Grade($result->total_mark)->letter_grade); ?></td>
											
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
        
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('acad.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>