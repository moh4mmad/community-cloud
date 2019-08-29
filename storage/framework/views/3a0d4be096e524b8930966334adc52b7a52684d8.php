<?php $__env->startSection('title'); ?> Departments | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Departments</h4><hr/>
						<button type="button" data-toggle="modal" data-target="#add_dept" class="btn btn-info waves-effect waves-light">Add new Department</button>
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
                                            <th class="border-top-0">Short</th>
											<th class="border-top-0">Department</th>
											<th class="border-top-0">Phone</th>
											<th class="border-top-0">Email</th>
											<th class="border-top-0">Status</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($departments)): ?>  <td colspan="4" style="text-align: center">No data found</td> <?php endif; ?>
									<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									      
									       <td><?php echo e($count+1); ?></td>
									        <td><?php echo e($dept->short); ?></td>
											<td><?php echo e($dept->name); ?></td>
											<td><?php echo e($dept->phone); ?></td>
                                            <td><?php echo e($dept->email); ?></td>
                                            <td>
											<?php if($dept->status == 1): ?>
												<strong class="badge badge-info">Active</strong>
											<?php else: ?>
												<strong class="badge badge-danger">Inactive</strong>
											<?php endif; ?>
											</td>
											<td>
											<button type="button" data-toggle="modal" data-target="#edit_dept<?php echo e($dept->id); ?>" class="btn btn-primary waves-effect waves-light">Edit</button>
											<button type="button" id="changepass" dept_id="<?php echo e($dept->id); ?>" class="btn btn-info waves-effect waves-light">Change password</button>
											<?php if($dept->status == 1): ?>
											<button type="button" id="disable" dept_id="<?php echo e($dept->id); ?>" class="btn btn-danger waves-effect waves-light">Disable</button>
										    <?php else: ?>
											<button type="button" id="enable" dept_id="<?php echo e($dept->id); ?>" class="btn btn-success waves-effect waves-light">Enable</button>
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
	
	<div class="modal fade" id="add_dept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new department</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.department.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Name</label>
                                                        <input type="text" class="form-control" name="name" required placeholder="Department name" >
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Short name</label>
                                                        <input type="text" class="form-control" name="short" required placeholder="Department short name" >
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Phone</label>
                                                        <input type="text" class="form-control" name="phone" required placeholder="Department phone" >
                                                    </div>
                                                </div>
												
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Email</label>
                                                        <input type="email" class="form-control" name="email" required placeholder="Department email" >
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Department password</label>
                                                        <input type="text" class="form-control" data-parsley-minlength="6" name="password" required placeholder="Department password" >
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
	
<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_dept<?php echo e($dept->id); ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit department</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.department.edit')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($dept->id); ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Name</label>
                                                        <input type="text" class="form-control" value="<?php echo e($dept->name); ?>" name="name" required placeholder="Department name" >
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Short name</label>
                                                        <input type="text" class="form-control" value="<?php echo e($dept->short); ?>" name="short" required placeholder="Department short name" >
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Phone</label>
                                                        <input type="text" class="form-control" value="<?php echo e($dept->phone); ?>" name="phone" required placeholder="Department phone" >
                                                    </div>
                                                </div>
												
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Email</label>
                                                        <input type="email" class="form-control" value="<?php echo e($dept->email); ?>" name="email" required placeholder="Department email" >
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
<script type="text/javascript" src="<?php echo e(asset('assets/app/plugins/parsleyjs/parsley.min.js')); ?>"></script>
<script>
$(document).ready(function() {
	$('form').parsley();
});

$('button#changepass').confirm({
    title: 'Change password',
    content: function() {
	return (
    '<form>' +
    '<div class="form-group">' +
    '<label>New password </label>' +
    '<input type="text" name="password" placeholder="Password" class="password form-control" required />' +
    '</div>' +
    '</form>')},
    buttons: {
        formSubmit: {
            text: 'Submit',
            btnClass: 'btn-blue',
            action: function () {
                var password = this.$content.find('.password').val();
                if(!password){
                    $.alert('Enter a password');
                    return false;
                }
                var form = $('<form action="<?php echo e(route("admin.department.password")); ?>" method="post">' +
				             '<input type="hidden" name="dept_id" value="' + this.$target.attr("dept_id") + '" />' +
							 '<input type="hidden" name="password" value="' + password + '" />' +
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




$('button#enable').confirm({
	
	title: 'Are you sure?',
    content: 'To enable this department click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.department.enable")); ?>" method="post">' +
				             '<input type="hidden" name="dept_id" value="' + this.$target.attr("dept_id") + '" />' +
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

$('button#disable').confirm({
	
	title: 'Are you sure?',
    content: 'To disable this department click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.department.disable")); ?>" method="post">' +
				             '<input type="hidden" name="dept_id" value="' + this.$target.attr("dept_id") + '" />' +
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