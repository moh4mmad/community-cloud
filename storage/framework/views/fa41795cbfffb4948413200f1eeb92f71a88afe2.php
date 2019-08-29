<?php $__env->startSection('title'); ?> Grading systems | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Grading systems</h4>
						<hr/>
						<button type="button" data-toggle="modal" data-target="#add_new" class="btn btn-info waves-effect waves-light">Add new</button>
						</div>
                </div>
            </div>
			
            <div class="row">
              <div class="col-sm-8 mx-auto">
                    <div class="card">
					
                        <div class="card-body new-user">
						<h5 class="header-title mb-4 mt-0">Grading systems</h5>
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
										    <th class="border-top-0">SL.</th>
                                            <th class="border-top-0">Marks Obtained ( % )</th>
											<th class="border-top-0">Grade Point</th>
											<th class="border-top-0">Grade</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($grading)): ?>  <td colspan="5" style="text-align: center">No data found</td> <?php endif; ?>
									<?php $__currentLoopData = $grading; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									      
									       <td><?php echo e($count+1); ?></td>
									       <td><?php echo e($grade->mark1); ?> - <?php echo e($grade->mark2); ?></td>
										   <td><?php echo e($grade->grade_points); ?></td>
										   <td><?php echo e($grade->letter_grade); ?></td>
											<td>
											<button type="button" data-toggle="modal" data-target="#edit_grade<?php echo e($grade->id); ?>" class="btn btn-primary waves-effect waves-light">Edit</button>

											<button type="button" id="removegrade" grade_id="<?php echo e($grade->id); ?>" class="btn btn-danger waves-effect waves-light">Remove</button>
											
											
										
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
	
			<div class="modal fade" id="add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new grade</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.grading.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
										
										<div class="row">
										<div class="col-md-12">
                                                        <label for="field-3" class="control-label">Marks</label>
														<div class="input-group">
														
														<input type="text" name="mark1" placeholder="80" class="form-control capitalize" required>
														<div class="input-group-addon">-</div>
														<input type="text" name="mark2" placeholder="100" class="form-control capitalize" required>
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Grade point</label>
                                                        <input type="text" class="form-control" name="grade_points" placeholder="4" required >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Grade letter</label>
                                                        <input type="text" class="form-control" name="letter_grade" placeholder="A+" required>
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

	<?php $__currentLoopData = $grading; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_grade<?php echo e($grade->id); ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit grade</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.grading.edit')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($grade->id); ?>">
                                        <div class="modal-body">
												<div class="row">
										<div class="col-md-12">
										<label for="field-3" class="control-label">Marks</label>
                                                        <div class="input-group">
														<input type="text" name="mark1" placeholder="80" value="<?php echo e($grade->mark1); ?>" class="form-control capitalize">
														<div class="input-group-addon">-</div>
														<input type="text" name="mark2" placeholder="100" value="<?php echo e($grade->mark2); ?>" class="form-control capitalize">
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Grade point</label>
                                                        <input type="text" class="form-control" name="grade_points" value="<?php echo e($grade->grade_points); ?>" placeholder="4" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Grade letter</label>
                                                        <input type="text" class="form-control" name="letter_grade" value="<?php echo e($grade->letter_grade); ?>" placeholder="A+" >
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
$('button#removegrade').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this grade click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.grading.remove")); ?>" method="post">' +
				             '<input type="hidden" name="id" value="' + this.$target.attr("grade_id") + '" />' +
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