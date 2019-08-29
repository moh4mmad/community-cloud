<!DOCTYPE html>
<html>
<title>Id Card <?php echo e($student->student_id); ?></title>
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
  height: 50px;
}

td {
  padding: 0px;
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


    <h3 align="center">
	<img src="<?php echo e(asset('assets/uni.png')); ?>" width="300" height="32" > </h3>

<p style="font-family: Arial, Helvetica, sans-serif;background-color: #191598;color: #FFFFFF;" align="center">STUDENT ID CARD</p>

<div class="row">

<div class="column">
<table>
<td width="" align="right"><img src="<?php echo e(asset('assets/image/students')); ?>/<?php echo e($student->image); ?>" width="100" height="100" ></td>
</table>
</div>

<div class="column">
<table class="" style="font: 11px 'Arial';line-height: 1.6;" align="">

  <tr>
    <td><b>Student ID : <?php echo e($student->student_id); ?></b></td>
  </tr>
  
  <tr>
    <td><b>Name: <?php echo e($student->name); ?></b></td>
  </tr>

  <tr>
    <td><b>Department : <?php echo e($student->Department->short); ?></b> </td>
  </tr>
  
  <tr>
  <td><b>Enrollment : <?php echo e($student->Season->season); ?></b></td>
  </tr>
  
  
  <tr>
  <td><b>Validity :  <?php echo e($validity->toDateString()); ?></b></td>
  </tr>

  <tr>
  <td><b>Date of Issue: <?php echo e($date->toDateString()); ?></b> </td>
  </tr>
  
</table>
</div>



</div>

<div class="footer">
<table style="font: 8px 'Arial';">
  <td width="140">&nbsp;</td><td align="center"><img src="<?php echo e(asset('assets/image/admit/sign.png')); ?>" style="height: auto;border: 0;vertical-align: middle;" height="50px" width="50px"><br><b><?php echo e($system->exam_controller_name); ?></b><br>Controller of Examinations</td>
</table>
</div>

</body>
</html>