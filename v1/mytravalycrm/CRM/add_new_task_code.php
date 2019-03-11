<?php
	session_start();

	if(isset($_POST['addtask']) && isset($_SESSION['cid']))
	{
		$cid=$_SESSION['cid'];
		include("../dbConnect.php");
		
			$task=mysqli_real_escape_string($conn, strip_tags($_POST['task']));
			$priority=mysqli_real_escape_string($conn, strip_tags($_POST['priority']));
			$assignto=mysqli_real_escape_string($conn, strip_tags($_POST['assignto']));
			$description=mysqli_real_escape_string($conn, strip_tags($_POST['description']));
			$remarks=mysqli_real_escape_string($conn, strip_tags($_POST['remarks']));
			$duedate=mysqli_real_escape_string($conn, strip_tags($_POST['duedate']));
			
		mysqli_query($conn,"insert into task_details (ClientId,Task,Priority,AssignTo,Status,Description,Remarks,DueDate)
		values ('$cid','$task','$priority','$assignto','Not Yet Started','$description','$remarks','$duedate')") or die(mysqli_error($conn));
		
		$url="location:task.php?cid=".$cid;
		mysqli_close($conn);
		
		header($url);
		
	}
	
	
?>