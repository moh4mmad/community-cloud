<?php $__env->startSection('title'); ?> Dashboard | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4></div>
                </div>
            </div>
			
			

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
                            <h5 class="mt-0"><?php echo e($season); ?></h5>
                            <p class="mb-0 text-muted"><strong>Current Semester</strong></p>
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
                            <h5 class="mt-0"><?php echo e($totalCourse); ?></h5>
                            <p class="mb-0 text-muted"><strong>Total Course</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-chalkboard-teacher"></i></div>
                    </div>
                    <div class="col-9 text-right align-self-center">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($totalTeacher); ?></h5>
                            <p class="mb-0 text-muted"><strong>Total Teacher</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="search-type-arrow"></div>
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-users"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($totalStudent); ?></h5>
                            <p class="mb-0 text-muted"><strong>Total Student</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
			
			<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="far fa-building"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($dept); ?></h5>
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
                        <div class="round"><i class="fas fa-dollar-sign"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e(number_format($total_deposit, 2)); ?></h5>
                            <p class="mb-0 text-muted"><strong>Total deposit</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-dollar-sign"></i></div>
                    </div>
                    <div class="col-9 text-right align-self-center">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e(number_format($month_deposit, 2)); ?></h5>
                            <p class="mb-0 text-muted"><strong>Deoosit in this month</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="search-type-arrow"></div>
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-calendar-alt"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($sessions); ?></h5>
                            <p class="mb-0 text-muted"><strong>Total Sessions</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card card-body text-center">
            <h4 class="card-title font-20 mt-0">Add billing</h4>
            <p class="card-text">Add custom billing to student account</p>
			<button type="button" data-toggle="modal" data-target="#add_billing" class="btn btn-primary waves-effect waves-light">Add billing</button>
			</div>
    </div>
    <div class="col-lg-4">
        <div class="card card-body text-center">
            <h4 class="card-title font-20 mt-0">Add waiver</h4>
             <p class="card-text">Add waiver to student account</p>
			<button type="button" data-toggle="modal" data-target="#add_waiver" class="btn btn-primary waves-effect waves-light">Add waiver</button>
			</div>
    </div>
    <div class="col-lg-4">
        <div class="card card-body text-center">
            <h4 class="card-title font-20 mt-0">Notice board</h4>
            <p class="card-text">Check all the notice</p>
			<a href="<?php echo e(route('admin.notice')); ?>" class="btn btn-primary waves-effect waves-light">Notice</a>
			</div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card card-body text-center">
            <h4 class="card-title font-20 mt-0">Print admit card</h4>
            <p class="card-text">Print admit card for exam</p><a href="<?php echo e(route('admin.admitcard')); ?>" class="btn btn-primary waves-effect waves-light">Print admit</a></div>
    </div>
    <div class="col-lg-4">
        <div class="card card-body text-center">
            <h4 class="card-title font-20 mt-0">Deposit</h4>
            <p class="card-text">All deposit made by the students</p><a href="<?php echo e(route('admin.deposits')); ?>" class="btn btn-primary waves-effect waves-light">Deposits</a></div>
    </div>
    <div class="col-lg-4">
        <div class="card card-body text-center">
            <h4 class="card-title font-20 mt-0">Search student</h4>
            <form role="search" id="search" method="post" action="<?php echo e(route('admin.students.search')); ?>">
					<?php echo e(csrf_field()); ?>

					 <p>
					<input type="text" name="search" value="" placeholder="Search student by id,name,phone,email" class="form-control"> 
				</p>
				</form><a href="#" onclick="document.getElementById('search').submit();" class="btn btn-primary waves-effect waves-light">Search student</a>
			</div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card card-body text-center">
            <h4 class="card-title font-20 mt-0">Class attendance sheet</h4>
            <p class="card-text">Genarate class attendance sheet</p><a href="<?php echo e(route('admin.attendance.sheet')); ?>" class="btn btn-primary waves-effect waves-light">Class attendance sheet</a></div>
    </div>
    <div class="col-lg-4">
        <div class="card card-body text-center">
            <h4 class="card-title font-20 mt-0">Exam attendance sheet</h4>
            <p class="card-text">Genarate exam attendance sheet</p><a href="<?php echo e(route('admin.exam.attendance.sheet')); ?>" class="btn btn-primary waves-effect waves-light">Exam attendance sheet</a></div>
    </div>
    <div class="col-lg-4">
        <div class="card card-body text-center">
            <h4 class="card-title font-20 mt-0">Add new student</h4>
            <p class="card-text">Add new student data</p><a href="<?php echo e(route('admin.student.add')); ?>" class="btn btn-primary waves-effect waves-light">Add student data</a></div>
    </div>
</div>








	
<div class="row">
                <div class="col-xl">
				  <div class="card">
                        <div class="card-body">
			<?php if( $sys->course_reg == 1 && Carbon\Carbon::now() < Carbon\Carbon::parse($sys->reg_last_date)): ?>
			<div class="alert alert-info font-18" role="alert"><strong>Notice!</strong> Course registration is open for <?php echo e($season); ?>.</div>
			<div class="alert alert-info font-18" role="alert"><strong>Notice!</strong> Course registration for <?php echo e($season); ?> last date <?php echo e(Carbon\Carbon::parse($sys->reg_last_date)->format('d M Y g:ia')); ?>.</div>
			<?php else: ?>
			<div class="alert alert-danger font-18" role="alert"><strong>Notice!</strong> Course registration for <?php echo e($season); ?> is closed.</div>
		    <?php endif; ?>
			
            </div>
			</div>
            </div>
			</div>
            
        </div>
        
    </div>
    <div class="modal fade" id="add_billing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add billing</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.students.billing.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <div class="row">
											
											<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student id</label>
                                                        <input type="text" class="form-control" name="student_id" value="<?php echo e(old('student_id')); ?>" placeholder="Student id" required>
                                                    </div>
                                                </div>
											
											<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Amount</label>
                                                        <input type="text" class="form-control" name="amount" value="<?php echo e(old('amount')); ?>" placeholder="Amount" required>
                                                    </div>
                                                </div>
											
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Details</label>
                                                        <input type="text" class="form-control" name="details" value="<?php echo e(old('details')); ?>" placeholder="Details" required>
                                                    </div>
                                                </div>
												
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
		<div class="modal fade" id="add_waiver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add waiver</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.students.waiver.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <div class="row">
											
											<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student id</label>
                                                        <input type="text" class="form-control" name="student_id" value="<?php echo e(old('student_id')); ?>" placeholder="Student id" required>
                                                    </div>
                                                </div>
											
											<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Amount</label>
                                                        <input type="text" class="form-control" name="amount" value="<?php echo e(old('amount')); ?>" placeholder="Amount" required>
                                                    </div>
                                                </div>
											
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Details</label>
                                                        <input type="text" class="form-control" name="details" value="<?php echo e(old('details')); ?>" placeholder="Details" required>
                                                    </div>
                                                </div>
												
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
		
		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>