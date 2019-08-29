<?php $__currentLoopData = $coursereg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<b> course code <?php echo e($course->courses_course_code); ?> </b>
<br>
<b> course name <?php echo e($course->Course->course_name); ?> </b>
<br>
<b> Season <?php echo e($course->Season->season); ?> </b>
<br>
<b> Student name <?php echo e($course->Student->name); ?> </b>
<br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>