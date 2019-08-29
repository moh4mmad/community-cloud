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
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-chalkboard-teacher"></i></div>
                    </div>
                    <div class="col-9 text-right align-self-center">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($StudentinthisSemester); ?></h5>
                            <p class="mb-0 text-muted"><strong>Student admitted in this semester</strong></p>
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
                        <div class="round"><i class="far fa-user"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($student_verification); ?></h5>
                            <p class="mb-0 text-muted"><a href="<?php echo e(route('acad.students.verify')); ?>"><strong>Student verifications</strong></a></p>
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
            <h4 class="card-title font-20 mt-0">Add new student</h4>
            <p class="card-text">Add new student data</p><a href="<?php echo e(route('acad.student.add')); ?>" class="btn btn-primary waves-effect waves-light">Add student data</a></div>
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
            <h4 class="card-title font-20 mt-0">Search student</h4>
            <form role="search" id="search" method="post" action="<?php echo e(route('acad.students.search')); ?>">
					<?php echo e(csrf_field()); ?>

					 <p>
					<input type="text" name="search" value="" placeholder="Search student by id,name,phone,email" class="form-control"> 
				</p>
				</form><a href="#" onclick="document.getElementById('search').submit();" class="btn btn-primary waves-effect waves-light">Search student</a>
			</div>
    </div>
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
										<form method="post" enctype="multipart/form-data" action="<?php echo e(route('acad.students.waiver.add')); ?>">
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
<?php echo $__env->make('acad.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>