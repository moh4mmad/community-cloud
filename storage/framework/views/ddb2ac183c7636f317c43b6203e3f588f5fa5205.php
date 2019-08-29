<?php $__env->startSection('title'); ?> Events <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addevent" >Add new Event</button>
				<br>
				</br>
				</section>				
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Events</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Event</th>
					            <th>Date</th>
								<th>Location</th>
								<th>Reg Deadline</th>
								<th>Type</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							<?php if(sizeof($events) == 0): ?>
							<td style="text-align: center;" colspan="5"> No events yet </td>
							<?php endif; ?>
							 <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          <tr id="raw<?php echo e($event->id); ?>">
					            <td><?php echo e($key+1); ?></td>
					            <td><?php echo e($event->title); ?></td>
					            <td><?php echo e(\Carbon\Carbon::parse($event->date, 'UTC')->format('d-m-y')); ?></td>
					            <td><?php echo e($event->location); ?></td>
					            <td><?php echo e(\Carbon\Carbon::parse($event->deadline, 'UTC')->format('d-m-y h:i A')); ?></td>
					            <td><?php echo e($event->type); ?></td>
					            <td width="35%">
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#editevent<?php echo e($event->id); ?>" >Edit</a>
								<a class="btn btn-danger btn-sm" id="remove" msgid="<?php echo e($event->id); ?>">Remove</a>
								<a class="btn btn-info btn-sm" href="<?php echo e(route('admin.events.pending', $event->id)); ?>">Pending</a>
								<a class="btn btn-info btn-sm" href="<?php echo e(route('admin.events.registered', $event->id)); ?>">Registered</a>
								<div class="btn-group">
								<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">Export <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo e(route('admin.events.exportpdf', $event->id)); ?>">PDF</a></li>
								<li><a href="<?php echo e(route('admin.events.exportxlsx', $event->id)); ?>">XLSX</a></li>
								</ul>
								</div>
								</td>
					          </tr>
					         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </tbody>
					      </table>
						  <?php echo e($events->links('pagination.simple')); ?>

					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
  <div class="modal fade" id="addevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new event</h5>

      </div>
      <div class="modal-body">
        <form id="addnewevent" method="post">
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
            <select name="type" id="event_type" class="form-control">
				                <option value="">Select...</option>
				                <option value="individual">Individual</option>
				                <option value="team">Team</option>
				              </select>
          </div>
		   <div id="max_member"></div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Event date:</label>
            <input type="date" class="form-control" name="date">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Location:</label>
            <input type="text" class="form-control" name="location">
          </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Start time:</label>
            <input type="text" class="form-control" name="start_time">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">End time:</label>
            <input type="text" class="form-control" name="end_time">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Registration fee:</label>
            <input type="text" class="form-control" name="reg_fee">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Payment method:</label>
            <input type="text" class="form-control" name="payment_method">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Payment number:</label>
            <input type="text" class="form-control" name="payment_number">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Registration deadline:</label>
            <input type="datetime-local" class="form-control" name="deadline">
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
<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="editevent<?php echo e($event->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit event</h5>

      </div>
      <div class="modal-body">
        <form  enctype="multipart/form-data" action="<?php echo e(route('admin.events.edit')); ?>" method="post">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="id" value="<?php echo e($event->id); ?>">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" value="<?php echo e($event->title); ?>" name="title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Content:</label>
            <textarea class="form-control" id="editor" name="content"><?php echo e($event->content); ?></textarea>
          </div>
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php if($event->image == null): ?><?php echo e(asset('assets/img/no-image.png')); ?><?php else: ?><?php echo e(asset('assets/img/event/')); ?>/<?php echo e($event->image); ?><?php endif; ?>">
           </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Type:</label>
            <select name="type" id="event_type<?php echo e($event->id); ?>" class="form-control">
				                <option value="">Select...</option>
				                <option value="individual" <?php if($event->type=="individual"): ?> selected <?php endif; ?>>Individual</option>
				                <option value="team" <?php if($event->type=="team"): ?> selected <?php endif; ?>>Team</option>
				              </select>
          </div>
		   <div id="max_member<?php echo e($event->id); ?>">
		   <?php if($event->type=="team"): ?>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Team max member:</label>
            <input type="text" class="form-control" value="<?php echo e($event->max_member); ?>" name="max_member">
           </div>
		   <?php endif; ?>
		   </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Event date:</label>
            <input type="date" class="form-control" value="<?php echo e(\Carbon\Carbon::parse($event->date, 'UTC')->format('Y-m-d')); ?>" name="date">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Location:</label>
            <input type="text" class="form-control" value="<?php echo e($event->location); ?>" name="location">
          </div>
		   <div class="form-group">
            <label for="title-name" class="col-form-label">Start time:</label>
            <input type="text" class="form-control" value="<?php echo e($event->start_time); ?>" name="start_time">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">End time:</label>
            <input type="text" class="form-control" value="<?php echo e($event->end_time); ?>" name="end_time">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Registration fee:</label>
            <input type="text" class="form-control" value="<?php echo e($event->reg_fee); ?>" name="reg_fee">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Payment method:</label>
            <input type="text" class="form-control" value="<?php echo e($event->payment_method); ?>" name="payment_method">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Payment number:</label>
            <input type="text" class="form-control" value="<?php echo e($event->payment_number); ?>" name="payment_number">
          </div>
		  <div class="form-group">
            <label for="title-name" class="col-form-label">Registration deadline:</label>
            <input type="datetime-local" class="form-control" value="<?php echo e(\Carbon\Carbon::parse($event->deadline, 'UTC')->format('Y-m-d\\TH:i')); ?>" name="deadline">
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
<?php if(count($events) < 5): ?>)
$('.footer').attr('style','margin-top: 230px');
<?php endif; ?>

$('#event_type').on('change', function() {
  if(this.value == "team")
  {
	  $('#max_member').append
		       (
				   '<div class="form-group">' +
				   '<label for="title-name" class="col-form-label">Team max member:</label>' +
				   '<input type="text" class="form-control" name="max_member">' +
				   '</div>'
							);
  }
  else
  {
	  $('#max_member').empty();
  }
});
<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
$('#event_type<?php echo e($event->id); ?>').on('change', function() {
  if(this.value == "team")
  {
	  $('#max_member<?php echo e($event->id); ?>').append
		       (
				   '<div class="form-group">' +
				   '<label for="title-name" class="col-form-label">Team max member:</label>' +
				   '<input type="text" class="form-control" name="max_member">' +
				   '</div>'
							);
  }
  else
  {
	  $('#max_member<?php echo e($event->id); ?>').empty();
  }
});
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
$("a#remove").click(function(){

    var msgid = $(this).attr("msgid");
 	$.msgbox("Are you sure that you want to permanently delete this event?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.events.remove')); ?>",
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

$('#addnewevent').on('submit',function(event){
       
	   for (instance in CKEDITOR.instances) {
		   CKEDITOR.instances[instance].updateElement();
		  }
	   
       $.ajax({
        url: "<?php echo e(route('admin.events.add')); ?>",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'Event Published. Reload the page to see the result.'
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