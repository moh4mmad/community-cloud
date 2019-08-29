<?php if($paginator->hasPages()): ?>
    <div class="ui pagination menu">
        
        <?php if($paginator->onFirstPage()): ?>
            <a class="icon item disabled"> <i class="left chevron icon"></i> </a>
        <?php else: ?>
            <a class="icon item" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"> <i class="left chevron icon"></i> </a>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <a class="icon item disabled"><?php echo e($element); ?></a>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <a class="item active" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                    <?php else: ?>
                        <a class="item" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <a class="icon item" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"> <i class="right chevron icon"></i> </a>
        <?php else: ?>
            <a class="icon item disabled"> <i class="right chevron icon"></i> </a>
        <?php endif; ?>
    </div>
<?php endif; ?>
