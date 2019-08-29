<!DOCTYPE html>
<html>
<head>
<style>
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
  height: 25px;
}

td {
  padding: 1px;
}
.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
}
</style>
</head>
<body>


    <h1 align="center" style="" >
	<img src="<?php echo e(asset('assets/logo.png')); ?>" style="vertical-align: text-top;" height="40" width="40"> <?php echo e($system->app_title); ?></h1>

<h3 align="center">Student attendance sheet for <?php echo e($exam); ?> examination</h3>

<table class="" style="font:  12px 'Arial';" align="">
 <tr style="display:none;">
	<th width="">&nbsp;</th>
	<th width="">&nbsp;</th>
	<th width="">&nbsp;</th>
	<th width="">&nbsp;</th>
	<th width="">&nbsp;</th>
	
  </tr>
  <tr>
    <td width="280" colspan="4"><b>Program :</b> <?php echo e($course->Department->name); ?></td>

	<td> &nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>

  </tr>
  <tr>
    <td colspan="4"><b>Date of exam :</b> </td>

	<td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td><b>Semester :</b> <?php echo e($season->season); ?></td>
  </tr>
  <tr>
    <td colspan="4"><b>Time of exam :</b> </td>

	<td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td><b>Venue :</b> </td>
  </tr>
 
</table>
<table class="" style="font:  12px 'Arial';" align="">
 <tr style="display:none;">
	<th width="">&nbsp;</th>
	<th width="">&nbsp;</th>
	<th width="">&nbsp;</th>
	
  </tr>
  <tr>
	<td width="100"><b>Course code :</b> <?php echo e($course->course_code); ?></td>
	<td width="214"><b>Course title :</b> <?php echo e($course->course_name); ?></td>
	<td width=""><b>Instructor :</b> </td>
  </tr>
  </table>
<br></br>

<table class="datatable" style="width:100%">
  <tr>
    <th align="center" width="3%">SL</th>
    <th align="center" width="10%">Student Id</th>
    <th align="center" width="25%">Name</th> 
    <th align="center" width="10%">Section</th> 
	<th align="center" width="10%">Room</th> 
	<th align="center" width="25%">Signature</th> 
	<th align="center" width="15%">Remarks</th> 
	
	
  </tr>
  <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <td align="center"><?php echo e($count+1); ?></td>
	<td><?php echo e($data->Student->student_id); ?></td>
    <td><?php echo e($data->Student->name); ?></td>
    <td align="center"><?php echo e($data->Section->section); ?></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <th style="" colspan="7" align="left">Present:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Absent:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reported:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total number of students: <?php echo e(count($datas)); ?></th>

	
  </tr>
  
  
</table>

<div class="footer">
<table>
  <td width="380"><b>Name of the chief invigilator:</b></td><td><b>Signature & Date</b></td>
</table>
</div>

</body>
</html>