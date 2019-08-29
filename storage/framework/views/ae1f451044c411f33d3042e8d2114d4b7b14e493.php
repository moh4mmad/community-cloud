<?php $__env->startSection('title'); ?> All Teachers | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">All teachers</h4>
						<hr/>
						<button type="button" data-toggle="modal" data-target="#add_teacher" class="btn btn-info waves-effect waves-light">Add new teacher</button> </div>
                </div>
            </div>

			
			
            <div class="row">
                <div class="col-xl">
                    <div class="card">
					
					<li class="list-inline-item hide-phone app-search">
					<form role="search" method="post" action="<?php echo e(route('admin.teachers.search')); ?>">
					<?php echo e(csrf_field()); ?>

					<input type="text" name="search" placeholder="Search teacher" class="form-control"> <a onclick="$(this).closest('form').submit()" href="#"><i class="fa fa-search">
					</i>
					</a>
					</form>
					</li>
                        <div class="card-body new-user">
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Id</th>
											<th class="border-top-0">Teacher name</th>
											<th class="border-top-0">Department</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									        <td><?php echo e($teacher->teacherId); ?></td>
                                            <td><?php echo e($teacher->name); ?></td>
											<td><?php echo e($teacher->Department->short); ?></td>
											<td><?php echo e($teacher->phone); ?></td>
											<td><?php echo e($teacher->email); ?></td>
											<td>
											<button style="border-radius: 2px; font-size: 12px;" type="button" data-toggle="modal" data-target="#edit_<?php echo e($teacher->id); ?>" class="btn btn-primary waves-effect waves-light">Update</button>
											<a style="border-radius: 2px; font-size: 12px;" type="button" href="<?php echo e(route('admin.teacher.assignedcourses', $teacher->id)); ?>" class="btn btn-primary waves-effect waves-light">Assigned courses</a>
											<button style="border-radius: 2px; font-size: 12px;" type="button" id="changepass" teacher_id="<?php echo e($teacher->id); ?>" class="btn btn-info waves-effect waves-light btn-sm">Change password</button>
											<?php if($teacher->status == 1): ?>
											<button style="border-radius: 2px; font-size: 12px;" type="button" id="deactivate" teacher_id="<?php echo e($teacher->id); ?>" class="btn btn-danger waves-effect waves-light btn-sm">Deactivate</button>
										    <?php else: ?>
											<button style="border-radius: 2px; font-size: 12px;" type="button" id="activate" teacher_id="<?php echo e($teacher->id); ?>" class="btn btn-success waves-effect waves-light btn-sm">Activate</button>
										<?php endif; ?>
											</td>
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								
								</div>
                        </div>
                        
                    </div>
                    <?php echo e($teachers->render()); ?>

                </div>
              
            </div>

            
        </div>
        
    </div>
	
	<div class="modal fade" id="add_teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new teacher</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.add.teacher')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Teacher Id</label>
                                                        <input type="text" class="form-control" name="teacherId" placeholder="Teacher Id" required="required">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Teacher name</label>
                                                        <input type="text" class="form-control" name="name" placeholder="Teacher name" required="required">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Teacher email</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Teacher email" required="required">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Teacher phone</label>
                                                        <input type="text" class="form-control" name="phone" placeholder="Teacher phone" required="required">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Select department</label>
                                                        <select class="form-control" id="dept" required name="department">
														<option value="">Select department</option>
														<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($dept->id); ?>"><?php echo e($dept->short); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Teacher password</label>
                                                        <input type="text" class="form-control" name="password" placeholder="Teacher password" required="required">
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
		<?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_<?php echo e($teacher->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit teacher</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.update.teacher')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($teacher->id); ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Teacher Id</label>
                                                        <input type="text" class="form-control" value="<?php echo e($teacher->teacherId); ?>" placeholder="Teacher Id" disabled>
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Teacher name</label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo e($teacher->name); ?>"  placeholder="Teacher name" required="required">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Teacher email</label>
                                                        <input type="email" class="form-control" name="email" value="<?php echo e($teacher->email); ?>" placeholder="Teacher email" required="required">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Teacher phone</label>
                                                        <input type="text" class="form-control" name="phone" value="<?php echo e($teacher->phone); ?>" placeholder="Teacher phone" required="required">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Department</label>
                                                        <input type="text" class="form-control" value="<?php echo e($teacher->Department->short); ?>" disabled>
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
$('button#changepass').confirm({
    title: 'Change password',
    content: function() {
	return (
    '<form>' +
    '<div class="form-group">' +
    '<label>Change password for ' + this.$target.attr("teacher_id") + '</label>' +
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
                var form = $('<form action="<?php echo e(route("admin.teacher.password")); ?>" method="post">' +
				             '<input type="hidden" name="teacher_id" value="' + this.$target.attr("teacher_id") + '" />' +
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
    content: 'To deactivate this student click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.teacher.deactivate")); ?>" method="post">' +
				             '<input type="hidden" name="teacher_id" value="' + this.$target.attr("teacher_id") + '" />' +
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

$('button#activate').confirm({
	
	title: 'Are you sure?',
    content: 'To activate this student click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.teacher.activate")); ?>" method="post">' +
				             '<input type="hidden" name="teacher_id" value="' + this.$target.attr("teacher_id") + '" />' +
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