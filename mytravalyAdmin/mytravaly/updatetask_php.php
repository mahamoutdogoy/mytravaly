<?php
	session_start();
	$con=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
if(isset($_POST['update']))
{
	
	mysqli_query($con,"update task_details set Task='$_POST[task]',Priority='$_POST[priority]',AssignTo='$_POST[assignto]',Status='$_POST[status]',Description='$_POST[description]',Remarks='$_POST[remarks]',DueDate='$_POST[duedate]' where TaskId='$_SESSION[tid]'") or die(mysqli_error($con));
	
	$url="location:http://localhost/tt/task.php?cid=".$_SESSION['cid']."&tid=".$_SESSION['tid'];
	header($url);
	/
}

?>
