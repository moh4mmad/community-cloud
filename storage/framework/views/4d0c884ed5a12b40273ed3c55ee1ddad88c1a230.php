<?php $__env->startSection('title'); ?> Dashboard <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-3 col-xs-12">
</div>
<div class="col-md-6 col-xs-12">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-star"></i>
					<h3>Statistics</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<div class="stats">
						
						<div class="stat">
							<span class="stat-value"><?php echo e($news_count); ?></span>									
							Total news
						</div> <!-- /stat -->
						
						<div class="stat">
							<span class="stat-value"><?php echo e($events_count); ?></span>									
							Total events
						</div> <!-- /stat -->
						
						<div class="stat">
							<span class="stat-value"><?php echo e($faculty_count); ?></span>									
							Faculty members
						</div> <!-- /stat -->
						
					</div> <!-- /stats -->
					
					
					
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->	
			
			
	
						
      		
	    </div> <!-- /span6 -->
      	<div class="col-md-3 col-xs-12">
		</div>
 


        <div class="col-md-2 col-xs-12">
		</div>
		
		  <div class="col-md-10 col-xs-12">
			
			
			<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Recent News</h3>
				</div> 
				<div class="widget-content">
					
					<ul class="news-items">
					<?php if(sizeof($news) == 0): ?>
							<td style="text-align: center;" colspan="4"> No news yet </td>
							<?php endif; ?>
						<?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$news1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<div class="news-item-detail">										
								<a href="javascript:;" class="news-item-title"><?php echo e($news1->title); ?></a>
								<p class="news-item-preview"><?php echo e(str_limit(strip_tags($news1->content), 250)); ?></p>
							</div>
							
							<div class="news-item-date">
								<span class="news-item-day"><?php echo e(\Carbon\Carbon::parse($news1->created_at, 'UTC')->format('d')); ?></span>
								<span class="news-item-month"><?php echo e(\Carbon\Carbon::parse($news1->created_at, 'UTC')->format('M')); ?></span>
							</div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					
				</div>
				
			</div>
			
			
			
			<div class="widget widget-nopad stacked">
						
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Recent Events</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<ul class="news-items">
					<?php if(sizeof($events) == 0): ?>
							<td style="text-align: center;" colspan="4"> No event yet </td>
							<?php endif; ?>
						<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<div class="news-item-detail">										
								<a href="javascript:;" class="news-item-title"><?php echo e($event->title); ?></a>
								<p class="news-item-preview"><?php echo e(str_limit(strip_tags($event->content), 200)); ?></p>
							</div>
							
							<div class="news-item-date">
								<span class="news-item-day"><?php echo e(\Carbon\Carbon::parse($event->created_at, 'UTC')->format('d')); ?></span>
								<span class="news-item-month"><?php echo e(\Carbon\Carbon::parse($event->created_at, 'UTC')->format('M')); ?></span>
							</div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					
				</div> <!-- /widget-content -->
			
			</div>
			
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>