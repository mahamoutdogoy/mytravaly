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
	<td><a href='http://localhost/tt/edit_client_details.php?cid=".$_REQUEST['cid']."'>
	<input type='button' class='btn btn-warning btn-sm' value='Edit Profile' /></a>
	
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
	<tr><td><br>
	<input type='button' class='btn btn-info' name='send_mail' value='Send Mail'/>
				
	</td>
	<td><br><a href='http://localhost/tt/new_task.php?cid=".$_REQUEST['cid']."'>
	<input type='button' class='btn btn-info' name='send_mail' value='Add Task' /></a>
		
	</td>
	</tr>
</table></td>";
	$task_list=mysqli_query($con,"select TaskId,Task,DueDate,AssignTo,Priority,Status from task_details where ClientId='".$_REQUEST['cid']."' and Status!='COMPLETED'")or 
	die(mysqli_error());
	echo "<td >
	<div class='alert alert-info alert-dismissible'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong><a href='http://localhost/tt/completed_task.php?cid=".$_REQUEST['cid']."'>Click Here</a> To View Completed Task</strong>
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
			<a href='http://localhost/tt/enq_form.php'>
			<img src='http://localhost/tt/img/gallery.png' height='50px' width='50px' title='Product Demo'/>
			</a>

			<a href='http://localhost/tt/edit_task.php?cid=".$_REQUEST['cid']."&tid=".$row2['TaskId']."'>
				<input type='button' class='btn btn-warning' value='Edit' text='".$row2['TaskId']."'/>
			</a>
			
			<input type='button' class='btn btn-danger id' text='".$row2['TaskId']."' value='Close Task' onclick='d_task();'/>
			<a href='http://localhost/tt/leadtablepage.php'>
			<input type='button' class='btn btn-success' value='Back' />
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
<script>
	$(document).ready(function(){
    $('.id').click(function(){
        var tid=$(this).attr("text");
		var r=confirm("Are You Sure! \n You Will Not Be Able TO Recover This Task!");
		
if (r == true) {
  $.post('demo.php', { tid:tid}, function(data){
					
					alert('Task Closed Successfully...');
					location.reload();
                    //do after submission operation in DOM
                });
} else {
  txt = "You pressed Cancel!";
}
		
	});
});
	</script>
	