<?php $__env->startSection('title'); ?> Photo gallery <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add" >Add folder</button>
				<br>
				</br>
				</section>				
				<div class="widget-header">
					<i class="icon-picture"></i>
					<h3>Photo gallery</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Name</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							<?php if(sizeof($gallerys) == 0): ?>
							<td style="text-align: center;" colspan="4"> No gallery yet </td>
							<?php endif; ?>
							 <?php $__currentLoopData = $gallerys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          <tr id="raw<?php echo e($gallery->id); ?>">
					            <td><?php echo e($key+1); ?></td>
					            <td><?php echo e($gallery->name); ?></td>
					            <td>
								<a class="btn btn-info btn-sm" href="<?php echo e(route('admin.photo', $gallery->id)); ?>">Photos</a>
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo e($gallery->id); ?>" >Edit</a>
								<a class="btn btn-danger btn-sm" id="remove" msgid="<?php echo e($gallery->id); ?>">Remove</a>
					          </tr>
					         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </tbody>
					      </table>
						  <?php echo e($gallerys->links('pagination.simple')); ?>

					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add folder</h5>

      </div>
      <div class="modal-body">
        <form id="addfolder" method="post">
			<?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify">
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
	   </form>
    </div>
  </div>
</div>
<?php $__currentLoopData = $gallerys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="edit<?php echo e($gallery->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit folder</h5>

      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.gallery.edit')); ?>">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="id" value="<?php echo e($gallery->id); ?>">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" value="<?php echo e($gallery->name); ?>" name="name">
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php if($gallery->image == null): ?><?php echo e(asset('assets/img/gallary.png')); ?><?php else: ?><?php echo e(asset('assets/img/gallery/')); ?>/<?php echo e($gallery->image); ?><?php endif; ?>">
           </div>
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
<script>
<?php if(count($gallerys) < 5): ?>
$('.footer').attr('style','margin-top: 230px');
<?php endif; ?>

$("a#remove").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to permanently delete this folder?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.gallery.remove')); ?>",
       {
         id: msgid,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'folder removed.'
			, position: 'top-right'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});


$('#addfolder').on('submit',function(event){
       
	  
       $.ajax({
        url: "<?php echo e(route('admin.gallery.add')); ?>",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'Gallery added. Reload the page to see the result.'
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

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>