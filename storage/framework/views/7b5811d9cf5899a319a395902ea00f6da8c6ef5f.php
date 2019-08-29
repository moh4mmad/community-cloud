<?php $__env->startSection('title'); ?> <?php echo e($member1); ?>  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add" >Add <?php echo e($member1); ?></button>
				<br>
				</br>
				</section>				
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3><?php echo e($member1); ?></h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Name</th>
					            <th>Position</th>
					            <th>Phone</th>
								<th>Email</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							<?php if(sizeof($members) == 0): ?>
							<td style="text-align: center;" colspan="5"> No members yet </td>
							<?php endif; ?>
							 <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          <tr id="raw<?php echo e($member->id); ?>">
					            <td><?php echo e($key+1); ?></td>
					            <td><?php echo e($member->name); ?></td>
					            <td><?php echo e($member->position); ?></td>
					            <td><?php echo e($member->phone); ?></td>
					            <td><?php echo e($member->email); ?></td>
					            <td width="20%">
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo e($member->id); ?>" >Edit</a>
								<a class="btn btn-danger btn-sm" id="remove" memberid="<?php echo e($member->id); ?>">Remove</a>
								</td>
					          </tr>
					         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </tbody>
					      </table>
						  <?php echo e($members->links('pagination.simple')); ?>

					  </div> 
					
				</div>
			
			</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add <?php echo e($member1); ?></h5>

      </div>
      <div class="modal-body">
        <form id="addmember" method="post">
			<?php echo e(csrf_field()); ?>

		 <input type="hidden" name="type" value="<?php echo e($type); ?>">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Position:</label>
            <input type="text" class="form-control" name="position">
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify">
           </div>
		   <?php if($type == "faculty_members"): ?>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Content:</label>
            <textarea class="form-control" id="editor" name="content"> </textarea>
          </div>
		  <?php endif; ?>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" name="phone">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" name="email">
          </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Facebook url:</label>
            <input type="text" class="form-control" name="fb_url">
          </div>
		  <?php if($type == "faculty_members"): ?>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Password:</label>
            <input type="text" class="form-control" name="password">
          </div>
		 <?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
	   </form>
    </div>
  </div>
</div>
<?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="edit<?php echo e($member->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Faculty Members</h5>

      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="<?php echo e(route('admin.facultymembers.update')); ?>" method="post">
			<?php echo e(csrf_field()); ?>

		 <input type="hidden" name="id" value="<?php echo e($member->id); ?>">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" value="<?php echo e($member->name); ?>" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Position:</label>
            <input type="text" class="form-control" value="<?php echo e($member->position); ?>" name="position">
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php if($member->image == null): ?><?php echo e(asset('assets/img/no-image.png')); ?><?php else: ?><?php echo e(asset('assets/img/members/')); ?>/<?php echo e($member->image); ?><?php endif; ?>">
           </div>
		   <?php if($type == "faculty_members"): ?>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Content:</label>
            <textarea class="form-control" id="editor" name="content"><?php echo e($member->content); ?></textarea>
          </div>
		  <?php endif; ?>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" value="<?php echo e($member->phone); ?>" name="phone">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" value="<?php echo e($member->email); ?>" name="email">
          </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Facebook url:</label>
            <input type="text" class="form-control" value="<?php echo e($member->fb_url); ?>" name="fb_url">
          </div>
		  <?php if($type == "faculty_members"): ?>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Password:</label>
            <input type="text" class="form-control" placeholder="Leave blank if no change needed" name="password">
          </div>
		  <?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
	   </form>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('assets/admin/js/plugins/msgbox/jquery.msgbox.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/vendor/dropify/css/dropify.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/admin/js/plugins/msgbox/jquery.msgbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/dropify/js/dropify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/ckeditor/ckeditor.js')); ?>"></script>
<script>
<?php if(count($members) < 5): ?>
$('.footer').attr('style','margin-top: 230px');
<?php endif; ?>

$("a#remove").click(function(){

    var memberid = $(this).attr("memberid");
 	$.msgbox("Are you sure that you want to permanently delete this member?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.facultymembers.remove')); ?>",
       {
         id: memberid,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Member removed.'
			, position: 'top-right'
		});
		$('#raw'+memberid).remove();
       }
    );
		  }
		});	
});

$('#addmember').on('submit',function(event){
       
	   for (instance in CKEDITOR.instances) {
		   CKEDITOR.instances[instance].updateElement();
		  }
	   
       $.ajax({
        url: "<?php echo e(route('admin.facultymembers.add')); ?>",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'Member added. Reload the page to see the result.'
							, position: 'top-right'
							, lifetime: 999999999
							});
						$('#cancel-btn').click();
						$('#addnewnews')[0].reset();
					},
					error: function (xhr) {
						$('#cancel-btn').click();
						$.each(xhr.responseJSON.errors, function(key,value) {
							$.msgGrowl ({
								type: 'error'
								, title: 'Error'
								, text: value
								, position: 'top-right'
								});
							});	
						}
		});


return false;
});



$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
$("textarea").each(function(){
CKEDITOR.replace(this, {
      height: 200
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>