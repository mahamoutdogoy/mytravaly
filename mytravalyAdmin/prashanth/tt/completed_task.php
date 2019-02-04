<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 
</head>
<body>
<form action='' method='post'>
<table cellpadding="20"><tr>
	

<?php
	$con=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
	$list=mysqli_query($con,"select FirstName,LastName,Email,Phone from client_details where ClientId='".$_REQUEST['cid']."';")or 
	die(mysqli_error($con));
	$row=mysqli_fetch_assoc($list);

echo "
	<td style='width:40%' valign='top'><table cellpadding=10><tr>
	<td>
	<input type='button' class='btn btn-warning btn-sm' value='Edit Profile'/>
	
	</td></tr>
	<tr>
	<td>


	<img src='http://localhost/tt/img/profile.png' height='70px' width='70px' radius=50></img>

	</td>
	<td><b style='font-size:25'>".$row['FirstName'].' '.$row['LastName']."</b>
</td>
	</tr>
	<tr>
	<td>Phone No</td><br>
	<td><b>".$row['Phone']."</b></td>
	</tr>
	<tr>
	<td>Email</td>
	<td><span style='color:blue'>".$row['Email']."</span></td>
	</tr>
	<tr><td colspan=2><br>
	<input type='button' class='btn btn-info' name='send_mail' value='Send Mail'/>
				
	</td>
	</tr>
</table></td>";
	$task_list=mysqli_query($con,"select TaskId,Task,DueDate,AssignTo,Priority,Status from task_details where ClientId='".$_REQUEST['cid']."' and Status='COMPLETED'")or 
	die(mysqli_error());
	echo "<td >
	<div class='alert alert-info alert-dismissible'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong><a href='http://localhost/tt/task.php?cid=".$_REQUEST['cid']."'>Click Here</a> To View Task</strong>
</div>
	<table style='width:500px'>";
	 while($row2=mysqli_fetch_assoc($task_list))
	{
		echo "
		
		
			<tr>
				<td style='width:30%'>Task</td>
				<td style='width:70%'>".$row2['Task']."</td>
			</tr>
			<tr>
				<td>Due Date</td>
				<td>".$row2['DueDate']."</td>
			</tr>
			<tr>
			<td>Assign To</td>
			<td>
			".$row2['AssignTo']."
			</td>
			</tr>
			<tr>
			<td>Priority</td>
			<td>
			".$row2['Priority']."</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>".$row2['Status']."</td>
			</tr>
			<tr><td colspan='2' align='right'>
			<br>
			
			
			<hr/></td></tr>";
			
	} 
	echo "
			</table>
			</td>";
	?>


</tr>
</table>
</form>

</body>
</html>