<?php $__env->startSection('title'); ?> Notice | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">All notice</h4> <hr/> <button type="button" data-toggle="modal" data-target="#add_notice" class="btn btn-info waves-effect waves-light">Add new notice</button>
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
											<th class="border-top-0">Dept.</th>
											<th class="border-top-0">Title</th>
											<th class="border-top-0">Created by</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($notices)): ?>  <td colspan="4" style="text-align: center">No data found</td> <?php endif; ?>
									<?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									        <td><?php echo e($count+1); ?></td>
											<td><?php if($notice->isalldept == 0): ?> <?php echo e($notice->Department->short); ?> <?php else: ?> All <?php endif; ?></td>
                                            <td><?php echo e($notice->title); ?></td>
											<td><?php echo e($notice->created_by); ?></td>
											
											<td>
											<button type="button" data-toggle="modal" data-target="#edit_notice<?php echo e($notice->id); ?>" class="btn btn-primary waves-effect waves-light">Edit</button>
										
										
											<button type="button" id="remove" notice_id="<?php echo e($notice->id); ?>" class="btn btn-danger waves-effect waves-light">Remove</button>
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
	
	<div class="modal fade" id="add_notice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new notice</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.notice.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Department</label>
                                                        <select class="form-control" name="department">
														<option value="all" selected>All department</option>
														<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($dept->id); ?>"><?php echo e($dept->short); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Title</label>
                                                        <input type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>" placeholder="title" >
                                                    </div>
                                                </div>
												
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Content</label>
														<textarea name="content" class="form-control"><?php echo e(old('content')); ?></textarea>
                                                    </div>
                                                </div>
												
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Attachment</label>
                                                        <input type="file" name="attachment" id="input-file-now" data-height="150" class="dropify" data-default-file="">
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
	
	
	<?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_notice<?php echo e($notice->id); ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                               <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit notice</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.notice.edit')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($notice->id); ?>">
                                        <div class="modal-body">
                                       <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Department</label>
                                                        <select class="form-control" name="department">
														<option value="all">All department</option>
														<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($dept->id); ?>" <?php if($notice->department == $dept->id): ?> selected <?php endif; ?>><?php echo e($dept->short); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Title</label>
                                                        <input type="text" class="form-control" name="title" value="<?php echo e($notice->title); ?>" placeholder="title" >
                                                    </div>
                                                </div>
												
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Content</label>
														<textarea name="content" class="form-control"><?php echo e($notice->content); ?></textarea>
                                                    </div>
                                                </div>
												
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Attachment</label>
                                                        <input type="file" name="attachment" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php echo e(asset('assets/notice')); ?>/<?php echo e($notice->attachment); ?>">
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
<script src="<?php echo e(asset('assets/app/plugins/dropify/js/dropify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/app/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script>
$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});

$('button#remove').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this notice click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.notice.remove")); ?>" method="post">' +
				             '<input type="hidden" name="notice_id" value="' + this.$target.attr("notice_id") + '" />' +
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

$("textarea").summernote( {
    height: 250, minHeight: null, maxHeight: null, focus: !0
});

</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/app/plugins/jqconfirm/jquery-confirm.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/app/plugins/sweet-alert2/sweetalert2.min.css')); ?>">
<link href="<?php echo e(asset('assets/app/plugins/dropify/css/dropify.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/app/plugins/summernote/summernote-bs4.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>