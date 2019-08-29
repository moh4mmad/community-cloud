
        <div class="slider1-area overlay-default">
            <div class="bend niceties preview-1">
                <div id="ensign-nivoslider-3" class="slides">
				<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e(asset('assets/img/slider/')); ?>/<?php echo e($slider->image); ?>" alt="slider" title="#slider-direction-<?php echo e($count+1); ?>" />
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
				<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="slider-direction-<?php echo e($count+1); ?>" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-1">
                        <div class="title-container s-tb-c">
                            <div class="title1"><?php echo e($slider->title); ?></div>
                            <p><?php echo e($slider->description); ?></p>
                        </div>
                    </div>
                </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
		