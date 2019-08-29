<?php $__env->startSection('title'); ?> Other & Per Credit Costs | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Other & Per Credit Costs</h4>
						<hr/>
						<button type="button" data-toggle="modal" data-target="#add_creditcost" class="btn btn-info waves-effect waves-light">Add Per Credit cost</button>
						<button type="button" data-toggle="modal" data-target="#add_othercost" class="btn btn-info waves-effect waves-light">Add Other cost</button>
						</div>
                </div>
            </div>
			
            <div class="row">
               <div class="col-sm-7 mx-auto">
                    <div class="card">
					
                        <div class="card-body new-user">
						<h5 class="header-title mb-4 mt-0">Credit Costs</h5>
						
						<div class="col-sm-3">										
	</div>
						
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
										    <th class="border-top-0">SL.</th>
											<th class="border-top-0">Dept.</th>
											<th class="border-top-0">Amount</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($creditcosts)): ?>  <td colspan="5" style="text-align: center">No data found</td> <?php endif; ?>
									<?php $__currentLoopData = $creditcosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $creditcost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									      
									       <td><?php echo e($count+1); ?></td>
									       <td><?php echo e($creditcost->Department->short); ?></td>
										   <td><?php echo e($creditcost->amount); ?></td>
											
											<td>
											<button type="button" data-toggle="modal" data-target="#edit_creditcost<?php echo e($creditcost->id); ?>" class="btn btn-primary waves-effect waves-light">Edit</button>
											
											<button type="button" id="removecreditcost" creditcost_id="<?php echo e($creditcost->id); ?>" class="btn btn-danger waves-effect waves-light">Remove</button>
											
											
										
											</td>
											
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
                        </div>
                        
                    </div>
                    
                </div>
              <div class="col-sm-5 mx-auto">
                    <div class="card">
					
                        <div class="card-body new-user">
						<h5 class="header-title mb-4 mt-0">Other costs</h5>
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
										    <th class="border-top-0">SL.</th>
                                            <th class="border-top-0">Cost</th>
											<th class="border-top-0">Amount</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($othercosts)): ?>  <td colspan="5" style="text-align: center">No data found</td> <?php endif; ?>
									<?php $__currentLoopData = $othercosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $othercost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									      
									       <td><?php echo e($count+1); ?></td>
									       <td><?php echo e($othercost->cost); ?></td>
										   <td><?php echo e($othercost->amount); ?></td>
										   
											<td>
											<button type="button" data-toggle="modal" data-target="#edit_othercost<?php echo e($othercost->id); ?>" class="btn btn-primary waves-effect waves-light">Edit</button>

											<button type="button" id="removeothercost" othercost_id="<?php echo e($othercost->id); ?>" class="btn btn-danger waves-effect waves-light">Remove</button>
											
											
										
											</td>
											
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
	
	<div class="modal fade" id="add_creditcost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Per Credit Cost</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.costs.percreditcostadd')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Department</label>
                                                        <select class="form-control" name="department">
														<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($dept->id); ?>"><?php echo e($dept->short); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Amount</label>
                                                        <input type="text" class="form-control" name="amount" placeholder="amount" >
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
			<div class="modal fade" id="add_othercost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add other cost</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.costs.othercostadd')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
										
										<div class="row">
										<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Cost details</label>
                                                        <input type="text" class="form-control" name="cost" placeholder="cost details" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Amount</label>
                                                        <input type="text" class="form-control" name="amount" placeholder="amount" >
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
	<?php $__currentLoopData = $creditcosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $creditcost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_creditcost<?php echo e($creditcost->id); ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Per Credit Cost</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.costs.percreditcostedit')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($creditcost->id); ?>">
                                        <div class="modal-body">
										
                                            <div class="row">
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Amount</label>
                                                        <input type="text" class="form-control" value="<?php echo e($creditcost->amount); ?>" name="amount" placeholder="amount" >
                                                    </div>
                                                </div>
												
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	<?php $__currentLoopData = $othercosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $othercost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_othercost<?php echo e($othercost->id); ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Other cost</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.costs.othercostedit')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($othercost->id); ?>">
                                        <div class="modal-body">
												<div class="row">
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Cost details</label>
                                                        <input type="text" class="form-control" name="cost" value="<?php echo e($othercost->cost); ?>" placeholder="Cost details" >
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Amount</label>
                                                        <input type="text" class="form-control" value="<?php echo e($othercost->amount); ?>" name="amount" placeholder="amount" >
                                                    </div>
                                                </div>
												
                                            </div>
											
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	
	
	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/app/plugins/jqconfirm/jquery-confirm.min.js')); ?>"></script>
<script>
$('button#removecreditcost').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this credit cost click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.costs.removepercreditcost")); ?>" method="post">' +
				             '<input type="hidden" name="id" value="' + this.$target.attr("creditcost_id") + '" />' +
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

$('button#removeothercost').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this other cost click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.costs.removeothercost")); ?>" method="post">' +
				             '<input type="hidden" name="id" value="' + this.$target.attr("othercost_id") + '" />' +
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
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>