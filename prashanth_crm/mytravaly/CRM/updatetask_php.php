<?php
	session_start();
	include("../dbConnect.php");
if(isset($_POST['update']))
{
		$task=mysqli_real_escape_string($conn, strip_tags($_POST['task']));
		$priority=mysqli_real_escape_string($conn, strip_tags($_POST['priority']));
		$assignto=mysqli_real_escape_string($conn, strip_tags($_POST['assignto']));
		$description=mysqli_real_escape_string($conn, strip_tags($_POST['description']));
		$remarks=mysqli_real_escape_string($conn, strip_tags($_POST['remarks']));
		$duedate=mysqli_real_escape_string($conn, strip_tags($_POST['duedate']));
		$status=mysqli_real_escape_string($conn, strip_tags($_POST[status]));
		mysqli_query($con,"update task_details set Task='$task',Priority='$priority',AssignTo='$assignto',
		Status='$status',Description='$description',Remarks='$remarks',DueDate='$duedate' where TaskId='$_SESSION[tid]'") or 
		die(mysqli_error($conn));
	
	$url="location:task.php?cid=".$_SESSION['cid']."&tid=".$_SESSION['tid'];
	header($url);
	
}

?>
