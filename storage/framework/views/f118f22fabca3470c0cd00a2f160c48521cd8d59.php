<?php $__env->startSection('title'); ?> Sliders <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12">      		
      		<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add" >Add slider</button>
				<br>
				</br>
				</section>	
      		<div class="widget stacked ">
      			
      			<div class="widget-header">
      				<i class="icon-list-alt"></i>
      				<h3>Sliders</h3>
  				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>Image</th>
								<th>Title</th>
								<th>Description</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							<?php if(sizeof($sliders) == 0): ?>
							<td style="text-align: center;" colspan="3"> No slider yet </td>
							<?php endif; ?>
							 <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          <tr id="raw<?php echo e($slider->id); ?>">
					            <td><ul style="margin-bottom: 0;text-align: left; " class="gallery-container">
								<li style="position: unset; margin: 0 0px;margin-bottom: 0em;border: 0;padding: 0px; ">
								<a href="<?php echo e(asset('assets/img/slider/')); ?>/<?php echo e($slider->image); ?>" class="ui-lightbox">
									<img style="max-width: 50%;" src="<?php echo e(asset('assets/img/slider/')); ?>/<?php echo e($slider->image); ?>" alt="">
								</a></li></ul></td>
								<td><?php echo e($slider->title); ?></td>
					            <td><?php echo e(str_limit(strip_tags($slider->description), 80)); ?></td>
					            <td width="20%">
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo e($slider->id); ?>">Edit</a>
								<a class="btn btn-danger btn-sm" id="remove" msgid="<?php echo e($slider->id); ?>">Remove</a>
								<?php if($slider->status == 1): ?>
								<a class="btn btn-danger btn-sm" id="deactivate" msgid="<?php echo e($slider->id); ?>">Deactivate</a>
							<?php else: ?>
								<a class="btn btn-success btn-sm" id="activate" msgid="<?php echo e($slider->id); ?>">Activate</a>
							<?php endif; ?>
								</td>
					          </tr>
					         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </tbody>
					      </table>
						  <?php echo e($sliders->links('pagination.simple')); ?>

					  </div> 
					
				</div> 
				
				
			</div> <!-- /widget -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add slider</h5>

      </div>
      <div class="modal-body">
        <form id="addslider" method="post">
			<?php echo e(csrf_field()); ?>

		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify">
           </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" name="title">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" name="description">
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

<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="modal fade" id="edit<?php echo e($slider->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit slider</h5>

      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('admin.sliders.edit')); ?>" method="post">
			<?php echo e(csrf_field()); ?>

		   <input type="hidden" name="id" value="<?php echo e($slider->id); ?>">
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php echo e(asset('assets/img/slider/')); ?>/<?php echo e($slider->image); ?>">
           </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" value="<?php echo e($slider->title); ?>" name="title">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" value="<?php echo e($slider->description); ?>" name="description">
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
<link href="<?php echo e(asset('assets/admin/js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/admin/js/plugins/msgbox/jquery.msgbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/dropify/js/dropify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/plugins/lightbox/jquery.lightbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/plugins/hoverIntent/jquery.hoverIntent.minified.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/demo/gallery.js')); ?>"></script>
<script>
<?php if(count($sliders) < 5): ?>
$('.footer').attr('style','margin-top: 230px');
<?php endif; ?>

$("a#remove").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to permanently delete this slider?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.sliders.remove')); ?>",
       {
         id: msgid,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'slider removed.'
			, position: 'top-right'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});

$("a#deactivate").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to deactivate this slider?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.sliders.status')); ?>",
       {
         id: msgid,
		 status: 0,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'slider deactivated.'
			, position: 'top-right'
		});
       }
    );
		  }
		});	
});

$("a#activate").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to activate this slider?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.sliders.status')); ?>",
       {
         id: msgid,
		 status: 1,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'slider activated.'
			, position: 'top-right'
		});
       }
    );
		  }
		});	
});


$('#addslider').on('submit',function(event){
       
	  
       $.ajax({
        url: "<?php echo e(route('admin.sliders.add')); ?>",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'slider added. Reload the page to see the result.'
							, position: 'top-right'
							, lifetime: 999999999
							});
					},
					error: function (xhr) {
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