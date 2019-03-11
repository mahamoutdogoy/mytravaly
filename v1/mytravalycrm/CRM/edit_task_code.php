<?php
	
  session_start();
  if(!isset($_SESSION['user']))
  {
    header("location:../");
  }

	include('../phpmailer/sendemail.php');
	include('../dbConnect.php');

	if(isset($_POST['taskUpdate'])  ) 
	{
		//updating  task Details
		$task=trim(mysqli_real_escape_string($conn, strip_tags($_POST['task'])));
		$priority=mysqli_real_escape_string($conn, strip_tags($_POST['priority']));
		$assignto=mysqli_real_escape_string($conn, strip_tags($_POST['assignto']));
		$status=mysqli_real_escape_string($conn, strip_tags($_POST['status']));
		$description=trim(mysqli_real_escape_string($conn, strip_tags($_POST['description'])));
		$remarks=mysqli_real_escape_string($conn, strip_tags($_POST['remarks']));
		$duedate=mysqli_real_escape_string($conn, strip_tags($_POST['duedate']));
		
		//checking for empty values

		if($priority=="")
			$priority="Set Priority";
		
		if($assignto=="")
			$assignto="Set AssignTo";

		if($status=="")
			$status="Set Status";

		if($description=="")
			$description="Add Description";

		if($remarks=="")
			$remarks="Add Remarks";
		

		
		mysqli_query($conn,"update task_details set Task='$task',Priority='$priority',AssignTo='$assignto',
			Status='$status',Description='$description',Remarks='$remarks',DueDate='$duedate'
			where TaskId='$_REQUEST[tid]'") or die(mysqli_error($conn));
		
		//selecting email id of employee 
		$query="select name,email from users where hotelid='".$_SESSION['user']['hotelid']."'";
		$list=mysqli_query($conn,$query)  or die(mysqli_error($conn));
		$email=mysqli_fetch_array($list) or die(mysqli_error($conn));

		//sending mail
		send_mail($email['email'],"new notification ","hi there \nThe assigned task is updated or  new task is Assigned to you... Thank You ");
		
		$msg="Success ! \n Details Updated Successfully...";
		//echo "<script>alert('$msg');</script>";
		
		//redirection to task page
		$url="location:task.php?cid=".$_REQUEST['cid'];
		

		header($url);
	
	}
	else
	{
		echo "not set";
	}
	

?>