<?php $__env->startSection('title'); ?> Student Deposits | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Student Deposits</h4> <hr/> <button type="button" data-toggle="modal" data-target="#add_deposit" class="btn btn-info waves-effect waves-light">Add new deposit</button></div>
                </div>
            </div>
			<?php if(!empty($student)): ?>
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
	<div class="col-lg-3">
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
                        <div class="round"><i class="fas fa-dollar-sign"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($student->TotalDeposit()); ?></h5>
                            <p class="mb-0 text-muted"><strong>Total deposit</strong></p>
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
										    <th class="border-top-0">SL.</th>
											<th class="border-top-0">Date</th>
											<th class="border-top-0">Amount</th>
											<th class="border-top-0">Paidby</th>
                                            <th class="border-top-0">Reference</th>
											<th class="border-top-0">Comments</th>
											<th class="border-top-0">Received by</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($deposits)): ?>  <td colspan="7" style="text-align: center">No data found </td> <?php endif; ?>
									<?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										    <td><?php echo e($count+1); ?></td>
											<?php
											$date = \Carbon\Carbon::parse($deposit->created_at, 'UTC');
											$date =  $date->format('d F Y');
											?>
											<td><?php echo e($date); ?></td>
									        <td><strong><?php echo e(number_format($deposit->amount, 2)); ?></strong></td>
											<td><?php echo e($deposit->paidby); ?></td>
											<td><?php echo e($deposit->reference); ?></td>
											<td><?php echo e($deposit->comments); ?></td>
											<td><?php echo e($deposit->receivedby); ?></td>
											<td> <button type="button" id="move" deposit_id="<?php echo e($deposit->id); ?>" class="btn btn-danger waves-effect waves-light">Move</button> </td>
											
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
<div class="modal fade" id="add_deposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add deposit</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" enctype="multipart/form-data" action="<?php echo e(route('accountant.students.add.deposid')); ?>">
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
                                                        <label for="field-3" class="control-label">Paidby</label>
                                                        <select class="form-control" name="paidby" required>
														<option value="cash" selected>Cash</option>
														<option value="bank">Bank</option>
														<option value="Other">Other</option>
														</select>
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Reference</label>
                                                        <input type="text" class="form-control" name="reference" value="<?php echo e(old('reference')); ?>" placeholder="Reference" required>
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Comments</label>
                                                        <input type="text" class="form-control" name="comments" value="<?php echo e(old('comments')); ?>" placeholder="comments">
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
$('button#move').confirm({
    title: 'Move deposit',
    content: function() {
	return (
    '<form>' +
    '<div class="form-group">' +
    '<label>Enter a student id to move deposit' +
    '<input type="text" name="student_id" placeholder="student id" class="student_id form-control" required />' +
    '</div>' +
    '</form>')},
    buttons: {
        formSubmit: {
            text: 'Submit',
            btnClass: 'btn-blue',
            action: function () {
                var student_id = this.$content.find('.student_id').val();
                if(!student_id){
                    $.alert('Enter a student id');
                    return false;
                }
                var form = $('<form action="<?php echo e(route("accountant.students.move.deposid")); ?>" method="post">' +
				             '<input type="hidden" name="deposit_id" value="' + this.$target.attr("deposit_id") + '" />' +
							 '<input type="hidden" name="student_id" value="' + student_id + '" />' +
							 '<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />' +
							 '</form>');
				$('body').append(form);
			    form.submit();
            }
        },
        cancel: function () {

        },
    },
	onContentReady: function () {
        var jc = this;
        this.$content.find('form').on('submit', function (e) {
            e.preventDefault();
            jc.$$formSubmit.trigger('click');
        });
	}
});

</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/app/plugins/jqconfirm/jquery-confirm.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('accountant.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>