<!DOCTYPE html>
<html>
<title>Admit card <?php echo e($student->student_id); ?></title>
<head>
<style>
@page  { size: 600pt 500pt; }
.datatable td {
  border: 1px solid black;
  font: 12px 'Arial';
}

.datatable th {
  border: 1px solid black;
  font: bold 13px 'Arial';
}

table {
  border-collapse: collapse;

}
.logo {
   display: flex;
   align-items:center;
   justify-content: center; 

}
th {
  height: 50px;
}

td {
  padding: 1px;
}
.column {
  float: left;
  padding: 10px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>


    <h1 align="center" style="" >
	<img src="<?php echo e(asset('assets/logo.png')); ?>" style="vertical-align: text-top;" height="40" width="40"> <?php echo e($system->app_title); ?></h1>

<h3 align="center">ADMIT CARD</h3>

<div class="row">

<div class="column">
<table class="" style="  font: 13px 'Arial';" align="">

  <tr>
    <td>Semester/Trimester <b>: <?php echo e($session->season); ?></b></td>
  </tr>
  
  <tr>
    <td>Student ID <b>: <?php echo e($student->student_id); ?></b></td>
  </tr>
  
  <tr>
    <td>Name<b>: <?php echo e($student->name); ?></b></td>
  </tr>

  <tr>
    <td>Department <b>: <?php echo e($student->Department->name); ?></b> </td>
  </tr>
  
  <tr>
  <td>Enrollment <b>: <?php echo e($student->Season->season); ?></b></td>
  </tr>
  
  
  <tr>
  <td>Validity <b>: <?php echo e($exam); ?></b></td>
  </tr>

  <tr>
  <td>Date of Issue<b>: <?php echo e($date->toDateString()); ?></b> </td>
  </tr>
  
</table>
</div>

<div class="column">
<table>
<td width="180" align="right"><img src="<?php echo e(asset('assets/image/students')); ?>/<?php echo e($student->image); ?>" width="100" height="100" ></td>
</table>
</div>

</div>


<h4>Registered Courses</h4>
<table class="" style="  font: 11px 'Arial';" border="0" cellpadding="0" cellspacing="0" align="">
<tbody>
<?php $__currentLoopData = $reg_courses->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<td width="20" align="center"><?php echo e(strtoupper($course->Course->course_code)); ?> &nbsp; &nbsp;</td>
<td width="200"><?php echo e(strtoupper($course->Course->course_name)); ?></td>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>

</table>

<div class="footer">
<table>
  <td width="340">&nbsp;</td><td align="center"><img src="<?php echo e(asset('assets/image/admit/sign.png')); ?>" style="height: auto;border: 0;vertical-align: middle;" height="100px" width="100px"><br><b><?php echo e($system->exam_controller_name); ?></b><br>Controller of Examinations</td>
</table>
</div>
<p align="center"><font color="red">N.B: No Mobile phone is allowed in the examination hall.</font></p>

</body>
</html>