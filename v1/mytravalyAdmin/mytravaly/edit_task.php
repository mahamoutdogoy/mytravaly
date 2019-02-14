
<?php
	session_start();

	$_SESSION['tid']=$_REQUEST['tid'];
	$_SESSION['cid']=$_REQUEST['cid'];

	$con=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());


	if(isset($_POST['update']))
	{
	
		mysqli_query($con,"update task_details set Task='$_POST[task]',Priority='$_POST[priority]',AssignTo='$_POST[assignto]',Status='$_POST[status]',Description='$_POST[description]',Remarks='$_POST[remarks]',DueDate='$_POST[duedate]' where TaskId='$_SESSION[tid]'") or die(mysqli_error($con));

		$query="SELECT email FROM `employee` WHERE name='".$_POST['assignto']."'";
		$list=mysqli_query($con,$query)  or die(mysqli_error($con));
		$email=mysqli_fetch_assoc($list) or die(mysqli_error($con));

		mail($email['email'],"new notification ","hi there \nYou have new task to do... Thank You " ) or die("notification not sent..");
	
		$url="location:http://localhost/tt/task.php?cid=".$_SESSION['cid']."&tid=".$_SESSION['tid'];
		
		header($url);
	
	}


?>
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
	$task_list=mysqli_query($con,"select Task,DueDate,AssignTo,Priority,Status,Description,Remarks from task_details where TaskId='".$_REQUEST['tid']."' and Status!='COMPLETED'")or 
	die(mysqli_error($con));
	echo "<td >
	
	<table style='width:500px' cellpadding='5'>";
	 while($row2=mysqli_fetch_assoc($task_list))
	{
		echo "
		
		
			<tr>
				<td style='width:30%'>Task</td>
				<td style='width:70%'>
					<select name='task' style='width:170px'  class='task'>";
			
			if($row2['Task']=='Call'){
				
				echo "<option value='Call' selected='selected'>Call</option>
                    <option value='Email' >Email</option>
                    <option value='Message'>Message</option>
                    <option value='Product Demo'>Product Demo</option>";
			}
			else if($row2['Task']=='Email'){
				
				echo "<option value='Call' >Call</option>
                    <option selected='selected' value='Email'>Email</option>
                    <option value='Message'>Message</option>
                    <option value='Product Demo'>Product Demo</option>";
			}
			else if($row2['Task']=='Message'){
				
				echo "<option value='Call' >Call</option>
                    <option  value='Email'>Email</option>
                    <option value='Message' selected='selected'>Message</option>
                    <option value='Product Demo'>Product Demo</option>";
			}
			else if($row2['Task']=='Product Demo'){
				
				echo "<option value='Call' >Call</option>
                    <option  value='Email'>Email</option>
                    <option value='Message' >Message</option>
                    <option value='Product Demo' selected='selected'>Product Demo</option>";
			}
					else
						echo "<option value='' disabled selected>--Select--</option>
					<option value='Call' >Call</option>
                    <option  value='Email'>Email</option>
                    <option value='Message'>Message</option>";
                   
            echo " </select></td>

					
			</tr>
			<tr>
				<td>Due Date</td>
				<td><input type='text' name='duedate' value='".$row2['DueDate']."' readonly /></td>
			</tr>
			<tr>
			<td>Assign To</td>
			<td>";
				echo "<select name='assignto' style='width:170px' class='myDropDown'>";
                echo "<option value='' disabled selected>---select---</option>";
                 $emp_list=mysqli_query($con,"select name,email from employee") or die(mysqli_error($con));
                while ($row3=mysqli_fetch_assoc($emp_list)) {
					//$v=$_REQUEST['cid'] ."/".$_REQUEST['tid']."/".$row3['name'];
					if($row2['AssignTo']==$row3['name'])
						echo "<option value='".$row3['name']."' selected='selected'>".$row3['name']."</option>";
					else	
						echo "<option value='".$row3['name']."'>".$row3['name']."</option>";
					
                }

			echo "
			</td>
			</tr>
			<tr>
			<td>Priority</td>
			<td>
				<select name='priority' style='width:170px'  class='priority'>";
			
			if($row2['Priority']=='Hot'){
				
				echo "<option value='Hot' selected='selected'>Hot</option>
                    <option value='Warm'>Warm</option>
                    <option value='Cold'>Cold</option>";
			}
			else if($row2['Priority']=='Warm')
			{
				echo "<option value='Hot'>Hot</option>
                    <option value='Warm' selected='selected'>Warm</option>
                    <option value='Cold'>Cold</option>";
			}
			else if($row2['Priority']=='Cold')
			{
				echo "<option value='Hot'>Hot</option>
                    <option value='Warm'>Warm</option>
                    <option value='Cold' selected='selected'>Cold</option>";
			}
					else
						echo "<option value='' disabled selected>--Select--</option>
					<option value='Hot' >Hot</option>
                    <option value='Warm'>Warm</option>
                    <option value='Cold'>Cold</option>";
                   
            echo " </select></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>";
					if($row2['Status']=="NOT_YET_STARTED")
			{
				//echo "<script>$('#".$_REQUEST['tid']."').css('background',' #ff7133');</script>
				echo "<select name='status' class='status' style='width:170px'>
                <option value='NOT_YET_STARTED' selected='selected' >NOT_YET_STARTED</option>
                <option value='ONGOING'>Ongoing</option>
                
                <option value='COMPLETED'>Completed</option>
				</select>";
			}
			else if($row2['Status']=="ONGOING")
			{
				//echo "<script>$('#".$_REQUEST['tid']."').css('background','#E0FFFF');</script>
				echo "<select name='status' class='status' style='width:170px'>
                <option value='NOT_YET_STARTED' >NOT_YET_STARTED</option>
                <option value='ONGOING' selected='selected'>Ongoing</option>
                
                <option value='COMPLETED' >Completed</option>
				</select>";
			}
			else if($row2['Status']=="COMPLETED")
			{
				//echo "<script>$('#".$_REQUEST['tid']."').css('background','#33ff58');</script>
				echo "<select name='status' class='status'>
                <option value='NOT_YET_STARTED' >NOT_YET_STARTED</option>
                <option value='ONGOING' >Ongoing</option>
                
                <option value='COMPLETED' Selected='Selected'>Completed</option>
				</select>";
			}
			else
			{
				//echo "<script>$('#".$_REQUEST['tid']."').css('background','#9969b4');</script>
				echo "<select name='status' class='status' style='width:170px'>
				<option value='' disabled selected>--select--</option>
                <option value='NOT_YET_STARTED'>NOT_YET_STARTED</option>
                <option value='ONGOING' >Ongoing</option>
                
                <option value='COMPLETED'>Completed</option>
				</select>";
			}

				echo "</td>
			</tr>
			<tr>
				<td>Action Description</td>
				<td><textarea name='description' style='width: 170px;height: 80'>".$row2['Description']."</textarea></td>
			</tr>
			<tr>
				<td>Remarks</td>
				<td><input type='text' name='remarks' value='".$row2['Remarks']."'/></td>
			</tr>
			<tr><td colspan='2' align='right'>
			<br>
			
			<input type='submit' name='update' class='btn btn-warning' value='Update' />

			<a href='http://localhost/tt/task.php?cid=".$_REQUEST['cid']."&tid=".$_REQUEST['tid']."'>
				<input type='button' class='btn btn-success' value='Go Back'/>
			</a>
			
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
<?php



?>
