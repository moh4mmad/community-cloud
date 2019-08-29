<!DOCTYPE html>
<html>
<title>{{$event->title}}</title>
<head>
<style>
table {page-break-before:auto;}
.datatable td {
  border: 1px solid #dddddd;
  font: 12px 'Arial';
}

.datatable th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
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

}

td {
  padding: 1px;
}

</style>
</head>
<body>


    <h1 align="center" style="" >
	<img src="{{ asset('assets/img/logo-pdf.jpg')}}" style="vertical-align: text-top;" height="40" width="40"> {{$front->title}}</h1>

<h3 align="center">Registered Members</h3>

<table class="" style="  font: 13px 'Arial';" align="">
 <tr style="display:none;">
	<th width="10%">&nbsp;</th>
	<th width="10%">&nbsp;</th>
	<th width="10%">&nbsp;</th>
	<th width="10%">&nbsp;</th>
	<th width="60%">&nbsp;</th>
	
  </tr>
  <tr>
    <td  width="280" colspan="4"><b>Event :</b> {{$event->title}}</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td><b>Total members :</b> {{count($members)}}</td>
  </tr>
  <tr>
    <td colspan="4"><b>Event type :</b> {{$event->type}}</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;</td>
    <td><b>Event date :</b> {{\Carbon\Carbon::parse($event->date, 'UTC')->format('d-m-y')}}</td>
  </tr>
 
</table>

<br></br>

<table class="datatable" style="width:100%">
  <tr>
    <th align="center">Id</th>
	<th align="center">Name</th>
	<th align="center">Email</th>
	<th align="center">Phone</th>
	<th align="center">University</th>
	<th align="center">Department</th>
	<th align="center">Semester</th>
	</tr>

  @foreach($members as $member)
  <tr>
<td align="center">{{$member->student_id}}</td>
<td align="center">{{$member->name}}</td>
<td align="center">{{$member->email}}</td>
<td align="center">{{$member->phone}}</td>
<td align="center">{{$member->institute}}</td>
<td align="center">{{$member->department}}</td>
<td align="center">{{$member->semester}}</td>
  </tr>
  @endforeach
  
</table>



</body>
</html>