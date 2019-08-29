<?php $__env->startSection('title'); ?> ID Generator | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">ID Generator</h4>
						<hr/>
						<button type="button" data-toggle="modal" data-target="#add_idgenerator" class="btn btn-info waves-effect waves-light">Add new</button>
						</div>
                </div>
            </div>
			
            <div class="row">
              <div class="col-sm-8 mx-auto">
                    <div class="card">
					
                        <div class="card-body new-user">
						<h5 class="header-title mb-4 mt-0">ID Generator Settings</h5>
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
										    <th class="border-top-0">SL.</th>
                                            <th class="border-top-0">Department</th>
											<th class="border-top-0">ID First Letter</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($idgenerators)): ?>  <td colspan="4" style="text-align: center">No data found</td> <?php endif; ?>
									<?php $__currentLoopData = $idgenerators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $idgenerator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									      
									       <td><?php echo e($count+1); ?></td>
									       <td><?php echo e($idgenerator->Department->short); ?></td>
										   <td><?php echo e($idgenerator->first); ?></td>
											<td>
											<button type="button" data-toggle="modal" data-target="#edit_idgenerator<?php echo e($idgenerator->id); ?>" class="btn btn-primary waves-effect waves-light">Edit</button>

											<button type="button" id="removeidgenerator" id_generator="<?php echo e($idgenerator->id); ?>" class="btn btn-danger waves-effect waves-light">Remove</button>
											
											
										
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
	
			<div class="modal fade" id="add_idgenerator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new Id Generator</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.idgeneretor.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
										
										<div class="row">
												<div class="col-md-12">
                                                    <div class="form-group">
													<h6 class="sub-title mb-3">Select department</h6>
													<select class="form-control" name="department">
														<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($dept->id); ?>"><?php echo e($dept->short); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">ID First Letter</label>
                                                        <input type="text" class="form-control" name="ID_First_Letter" placeholder="C" required>
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

	<?php $__currentLoopData = $idgenerators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idgenerator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_idgenerator<?php echo e($idgenerator->id); ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Id Generator</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.idgeneretor.edit')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($idgenerator->id); ?>">
                                        <div class="modal-body">
												<div class="row">
										<div class="col-md-12">
                                                    <div class="form-group">
													<h6 class="sub-title mb-3">Select department</h6>
													<select class="form-control" name="department">
														<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($dept->id); ?>" <?php if($dept->short == $idgenerator->Department->short): ?> selected <?php endif; ?>><?php echo e($dept->short); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">ID First Letter</label>
                                                        <input type="text" class="form-control" name="ID_First_Letter" value="<?php echo e($idgenerator->first); ?>" placeholder="C" required>
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
$('button#removeidgenerator').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.idgeneretor.remove")); ?>" method="post">' +
				             '<input type="hidden" name="id" value="' + this.$target.attr("id_generator") + '" />' +
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