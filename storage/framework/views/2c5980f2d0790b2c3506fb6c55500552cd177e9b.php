<?php $__env->startSection('title'); ?> News <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addnews" >Add new news</button>
				<br>
				</br>
				</section>				
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>News</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Title</th>
					            <th>Content</th>
					            <th>Type</th>
								<th>Posted By</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							<?php if(sizeof($news) == 0): ?>
							<td style="text-align: center;" colspan="5"> No News yet </td>
							<?php endif; ?>
							 <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$news1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          <tr id="raw<?php echo e($news1->id); ?>">
					            <td><?php echo e($key+1); ?></td>
					            <td><?php echo e($news1->title); ?></td>
					            <td width="30%"><?php echo e(str_limit(strip_tags($news1->content), 80)); ?></td>
					            <td><?php echo e($news1->type); ?></td>
					            <td><?php echo e($news1->created_by); ?></td>
					            <td width="20%">
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#editnews<?php echo e($news1->id); ?>" >Edit</a>
								<?php if($news1->status == 1): ?>
								<a class="btn btn-warning btn-sm" id="unpublish" msgid="<?php echo e($news1->id); ?>">Unpublish</a>
							    <?php else: ?>
								<a class="btn btn-success btn-sm" id="publish" msgid="<?php echo e($news1->id); ?>">Publish</a>
							    <?php endif; ?>
								<a class="btn btn-danger btn-sm" id="remove" msgid="<?php echo e($news1->id); ?>">Remove</a>
								</td>
					          </tr>
					         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </tbody>
					      </table>
						  <?php echo e($news->links('pagination.simple')); ?>

					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
  <div class="modal fade" id="addnews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new news</h5>

      </div>
      <div class="modal-body">
        <form id="addnewnews" method="post">
			<?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="title-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Content:</label>
            <textarea class="form-control" id="editor" name="content"> </textarea>
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify">
           </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Type:</label>
            <input type="text" class="form-control" name="type">
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
<?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="editnews<?php echo e($news1->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit news</h5>

      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.news.edit')); ?>">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="id" value="<?php echo e($news1->id); ?>">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" value="<?php echo e($news1->title); ?>" name="title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Content:</label>
            <textarea class="form-control" id="editor1" name="content"><?php echo e($news1->content); ?></textarea>
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php if($news1->image == null): ?><?php echo e(asset('assets/img/no-image.png')); ?><?php else: ?><?php echo e(asset('assets/img/news/')); ?>/<?php echo e($news1->image); ?><?php endif; ?>">
           </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Type:</label>
            <input type="text" class="form-control" value="<?php echo e($news1->type); ?>" name="type">
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
<script src="<?php echo e(asset('assets/vendor/ckeditor/ckeditor.js')); ?>"></script>
<script>
<?php if(count($news) < 5): ?>
$('.footer').attr('style','margin-top: 230px');
<?php endif; ?>

$("a#remove").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to permanently delete this news?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.news.remove')); ?>",
       {
         id: msgid,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'News removed.'
			, position: 'top-right'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});

$("a#unpublish").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to Unpublish this news?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.news.unpublish')); ?>",
       {
         id: msgid,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'News Unpublished.'
			, position: 'top-right'
		});
       }
    );
		  }
		});	
});

$("a#publish").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to Publish this news?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.news.publish')); ?>",
       {
         id: msgid,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'News Published.'
			, position: 'top-right'
		});
       }
    );
		  }
		});	
});

$('#addnewnews').on('submit',function(event){
       
	   for (instance in CKEDITOR.instances) {
		   CKEDITOR.instances[instance].updateElement();
		  }
	   
       $.ajax({
        url: "<?php echo e(route('admin.news.add')); ?>",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'News Published. Reload the page to see the result.'
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