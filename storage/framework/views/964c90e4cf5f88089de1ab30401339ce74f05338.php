<?php $__env->startSection('title'); ?> All Teachers | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Admin users</h4>
						<hr/>
						<button type="button" data-toggle="modal" data-target="#add_user" class="btn btn-info waves-effect waves-light">Add new user</button> </div>
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
                                            <th class="border-top-0">Sl.</th>
											<th class="border-top-0">Name</th>
											<th class="border-top-0">Email</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0">Type</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
											<td><?php echo e($count+1); ?></td>
											<td><?php echo e($admin->name); ?></td>
                                            <td><?php echo e($admin->email); ?></td>
											<td><?php echo e($admin->username); ?></td>
											<td><?php echo e($admin->type); ?></td>
											<td>
											<button style="border-radius: 2px; font-size: 12px;" type="button" data-toggle="modal" data-target="#edit_<?php echo e($admin->id); ?>" class="btn btn-primary waves-effect waves-light">Update</button>
											
											<button style="border-radius: 2px; font-size: 12px;" type="button" id="changepass" admin_id="<?php echo e($admin->username); ?>" class="btn btn-info waves-effect waves-light btn-sm">Change password</button>
											
											<?php if($admin->username == $user->username): ?>
											<?php else: ?> 
												<button style="border-radius: 2px; font-size: 12px;" type="button" id="deactivate" admin_id="<?php echo e($admin->id); ?>" class="btn btn-danger waves-effect waves-light btn-sm">Remove</button>
										   <?php endif; ?>
											</td>
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
							</div>
							</div>
							
								<?php echo e($admins->render()); ?>

                        
                        
                    
                    
                </div>
              
            </div>

            
        </div>
        
    </div>
	
	<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new user</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.users.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Name</label>
                                                        <input type="text" class="form-control" name="name" placeholder="Name" required="required" value="<?php echo e(old('name')); ?>">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Email</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Email" required="required" value="<?php echo e(old('email')); ?>">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Username</label>
                                                        <input type="text" class="form-control" name="username" placeholder="Username" required="required" value="<?php echo e(old('username')); ?>">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Password</label>
                                                        <input type="text" class="form-control" name="password" placeholder="Password" required="required">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">User type</label>
                                                        <select class="form-control" required name="type">
														<option value="">Select type</option>
														<option value="admin">Admin</option>
														<option value="accountant">Accountant</option>
														<option value="student_affair">Student affairs</option>
														</select>
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
		<?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_<?php echo e($admin->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit admin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.users.edit')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($admin->id); ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Name</label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo e($admin->name); ?>" placeholder="Name">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Email</label>
                                                        <input type="email" class="form-control" name="email" value="<?php echo e($admin->email); ?>"  placeholder="Email" required="required">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Username</label>
                                                        <input type="text" class="form-control" value="<?php echo e($admin->username); ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
											<?php if($admin->username == $user->username): ?>
												<input type="hidden" name="type" value="<?php echo e($admin->type); ?>">
											<?php else: ?> 
											<div class="row">
                                               <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">User type</label>
                                                        <select class="form-control" required name="type">
														<option value="">Select type</option>
														<option value="admin" <?php if($admin->type == "admin"): ?> selected <?php endif; ?> >Admin</option>
														<option value="accountant" <?php if($admin->type == "accountant"): ?> selected <?php endif; ?> >Accountant</option>
														<option value="student_affair" <?php if($admin->type == "student_affair"): ?> selected <?php endif; ?> >Student affairs</option>
														</select>
                                                    </div>
                                                </div>
                                            </div>
										<?php endif; ?>
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
$('button#changepass').confirm({
    title: 'Change password',
    content: function() {
	return (
    '<form>' +
    '<div class="form-group">' +
    '<label>Change password for ' + this.$target.attr("admin_id") + '</label>' +
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
                var form = $('<form action="<?php echo e(route("admin.users.password")); ?>" method="post">' +
				             '<input type="hidden" name="username" value="' + this.$target.attr("admin_id") + '" />' +
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


$('button#deactivate').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this user click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.users.remove")); ?>" method="post">' +
				             '<input type="hidden" name="id" value="' + this.$target.attr("admin_id") + '" />' +
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