<?php $__env->startSection('title'); ?> Student Billing | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Student Billing</h4> 
						<hr/>
						<button type="button" data-toggle="modal" data-target="#add_billing" class="btn btn-info waves-effect waves-light">Add custom billing</button>
						<button type="button" data-toggle="modal" data-target="#add_waiver" class="btn btn-info waves-effect waves-light">Add waiver </button>
						</div>
                </div>
            </div>
			<?php if(!empty($student)): ?>
			<div class="row">
		<div class="col-md-1">
		</div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-user-graduate"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($id); ?></h5>
                            <p class="mb-0 text-muted"><strong>Student Id</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
	<div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-graduation-cap"></i></div>
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
	<div class="col-md-3">
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
                            <h5 class="mt-0"><?php echo e($student->TotalDeposit()); ?></h5>
                            <p class="mb-0 text-muted"><strong>Total paid</strong></p>
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
                            <h5 class="mt-0"><?php echo e($student->TotalBillingAmount()); ?></h5>
                            <p class="mb-0 text-muted"><strong>Total payable</strong></p>
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
                            <h5 class="mt-0"><?php echo e($student->TotalWeiver()); ?></h5>
                            <p class="mb-0 text-muted">Total waiver</p>
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
                            <h5 class="mt-0"><?php echo e($student->AdvanceAmount()); ?></h5>
                            <p class="mb-0 text-muted"><strong><?php if($student->AdvanceAmount() < 0 ): ?> <p class="text-danger">Due amount</p> <?php else: ?> Advance amount <?php endif; ?></strong></p>
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
                <div class="col-sm-6 mx-auto">
                    <div class="card">
                        <div class="card-body new-user">
						<h4 class="mt-0 header-title">Billings</h4>
						   <div style="border: 1px solid #dee2e6;" class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
											<th class="border-top-0">Date</th>
											<th class="border-top-0">Amount</th>
											<th class="border-top-0">Details</th>
											<th class="border-top-0">Added by</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($billings)): ?>  <td colspan="7" style="text-align: center">No data found </td> <?php endif; ?>
									<?php $__currentLoopData = $billings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $billing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
											<?php
											$date = \Carbon\Carbon::parse($billing->created_at, 'UTC');
											$date =  $date->format('d-m-Y');
											?>
											<td><?php echo e($date); ?></td>
									        <td><strong><?php echo e(number_format($billing->amount, 2)); ?></strong></td>
											<td><?php echo e($billing->details); ?></td>
											<td><?php echo e($billing->added_by); ?></td>
											<?php if($billing->custom == 1): ?>
											<td> <button type="button" id="remove" billing_id="<?php echo e($billing->id); ?>" class="btn btn-danger waves-effect waves-light">Remove</button> </td>
										<?php else: ?>
											<td> </td>
										<?php endif; ?>
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
                        </div>
                        
                    </div>
                    
                </div>
              
			  <div class="col-sm-6 mx-auto">
                    <div class="card">
                        <div class="card-body new-user">
						<h4 class="mt-0 header-title">Waivers</h4>
						   <div style="border: 1px solid #dee2e6;" class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
											<th class="border-top-0">Date</th>
											<th class="border-top-0">Amount</th>
											<th class="border-top-0">Details</th>
											<th class="border-top-0">Approved by</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($waivers)): ?>  <td colspan="7" style="text-align: center">No data found </td> <?php endif; ?>
									<?php $__currentLoopData = $waivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $waiver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
											<?php
											$date = \Carbon\Carbon::parse($waiver->created_at, 'UTC');
											$date =  $date->format('d-m-Y');
											?>
											<td><?php echo e($date); ?></td>
									        <td><strong><?php echo e(number_format($waiver->amount, 2)); ?></strong></td>
											<td><?php echo e($waiver->details); ?></td>
											<td><?php echo e($waiver->approved_by); ?></td>
											<td> <button type="button" id="remove_waiver" waiver_id="<?php echo e($waiver->id); ?>" class="btn btn-danger waves-effect waves-light">Remove</button> </td>
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
	<div class="modal fade" id="add_billing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add billing</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" enctype="multipart/form-data" action="<?php echo e(route('acad.students.billing.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <div class="row">
											
											<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student id</label>
                                                        <input type="text" class="form-control" name="student_id" value="<?php echo e($id); ?>" placeholder="Student id" required>
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
										<form method="post" enctype="multipart/form-data" action="<?php echo e(route('acad.students.waiver.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <div class="row">
											
											<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student id</label>
                                                        <input type="text" class="form-control" name="student_id" value="<?php echo e($id); ?>" placeholder="Student id" required>
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
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/app/plugins/jqconfirm/jquery-confirm.min.js')); ?>"></script>
<script>

$('button#remove').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this custom billing click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("acad.students.billing.remove")); ?>" method="post">' +
				             '<input type="hidden" name="billing_id" value="' + this.$target.attr("billing_id") + '" />' +
							 '<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />' +
							 '</form>');
				$('body').append(form);
			    form.submit();
            }
        },
        close: function () {
        }
    }
});

$('button#remove_waiver').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this waiver click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("acad.students.waiver.remove")); ?>" method="post">' +
				             '<input type="hidden" name="waiver_id" value="' + this.$target.attr("waiver_id") + '" />' +
							 '<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />' +
							 '</form>');
				$('body').append(form);
			    form.submit();
            }
        },
        close: function () {
        }
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/app/plugins/jqconfirm/jquery-confirm.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('acad.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>