<?php $__env->startSection('title'); ?> Sessions | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Sessions</h4><hr/>
						<button type="button" data-toggle="modal" data-target="#add_season" class="btn btn-info waves-effect waves-light">Add new Session</button>
						<!--
						<button type="button" id="update" class="btn btn-info waves-effect waves-light">Update all student semester & section for new session</button>
						</div>
						-->
                </div>
            </div>
			</div>
            <div class="row">
                <div class="col-xl">
                    <div class="card">
					
                        <div class="card-body new-user">
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
										    <th class="border-top-0">SL.</th>
                                            <th class="border-top-0">Session</th>
											<th class="border-top-0">Year</th>
											<th class="border-top-0">Status</th>
											<th class="border-top-0">Result</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($seasons)): ?>  <td colspan="4" style="text-align: center">No data found</td> <?php endif; ?>
									<?php $__currentLoopData = $seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $season): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									      
									       <td><?php echo e($count+1); ?></td>
									        <td><?php echo e($season->season); ?></td>
											<td><?php echo e($season->year); ?></td>
                                            <td>
											<?php if($season->active == 1): ?>
												<strong class="badge badge-info">Active</strong>
											<?php else: ?>
												<strong class="badge badge-danger">Inactive</strong>
											<?php endif; ?>
											</td>
											<td>
											<?php if($season->result_publish == 1): ?>
												<strong class="badge badge-info">Published</strong>
											<?php else: ?>
												<strong class="badge badge-danger">Unpublished</strong>
											<?php endif; ?>
											</td><td>
											<button type="button" data-toggle="modal" data-target="#edit_season<?php echo e($season->id); ?>" class="btn btn-primary waves-effect waves-light">Edit</button>
										
											
											<?php if($season->active == null): ?>
											<button type="button" id="activate" season_id="<?php echo e($season->id); ?>" class="btn btn-success waves-effect waves-light">Activate</button>
										    <?php endif; ?>
										
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
	
	<div class="modal fade" id="add_season" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new session</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.season.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Session</label>
                                                        <input type="text" class="form-control" name="season" placeholder="Session" >
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Year</label>
                                                        <input type="text" class="form-control" name="year" placeholder="Year" >
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
	
<?php $__currentLoopData = $seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $season): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_season<?php echo e($season->id); ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit session</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.season.edit')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($season->id); ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Session</label>
                                                        <input type="text" class="form-control" name="season" value="<?php echo e($season->season); ?>" placeholder="season" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Year</label>
                                                        <input type="text" class="form-control" name="year" value="<?php echo e($season->year); ?>" placeholder="Year" >
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
$('button#activate').confirm({
	
	title: 'Are you sure?',
    content: 'To activate this session click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.season.activate")); ?>" method="post">' +
				             '<input type="hidden" name="season_id" value="' + this.$target.attr("season_id") + '" />' +
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
/*
$('button#update').confirm({
	
	title: 'Are you sure?',
    content: 'To update all students semester & section click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="" method="post">' +
				             '<input type="hidden" name="update" value="1" />' +
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
*/
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/app/plugins/jqconfirm/jquery-confirm.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>