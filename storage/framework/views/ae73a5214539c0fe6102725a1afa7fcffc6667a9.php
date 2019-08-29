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
	<div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-dollar-sign"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e(number_format($today_deposit, 2)); ?></h5>
                            <p class="mb-0 text-muted"><strong>Deoosit today</strong></p>
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
                            <h5 class="mt-0"><?php echo e($number_deposit); ?></h5>
                            <p class="mb-0 text-muted"><strong>Number of deposit today</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
    </div>
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
            <h4 class="card-title font-20 mt-0">Deposits</h4>
            <p class="card-text">All deposit made by the students</p><a href="<?php echo e(route('accountant.deposits')); ?>" class="btn btn-primary waves-effect waves-light">Deposits</a></div>
    </div>
    <div class="col-lg-4">
        <div class="card card-body text-center">
            <h4 class="card-title font-20 mt-0">Search student</h4>
            <form role="search" id="search" method="post" action="<?php echo e(route('accountant.students.search')); ?>">
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
    <div class="modal fade" id="add_billing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add billing</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" enctype="multipart/form-data" action="<?php echo e(route('accountant.students.billing.add')); ?>">
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
<?php echo $__env->make('accountant.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>