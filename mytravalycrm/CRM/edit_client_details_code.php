<?php
	session_start();
	if(isset($_POST['editClientDetails']) && isset($_SESSION['cid']))
	{
		include("../dbConnect.php");
		$fname=mysqli_real_escape_string($conn, strip_tags($_POST['fname']));
		$lname=mysqli_real_escape_string($conn, strip_tags($_POST['lname']));
		$email=mysqli_real_escape_string($conn, strip_tags($_POST['email']));
		$pno=mysqli_real_escape_string($conn, strip_tags($_POST['pno']));
		$dob=mysqli_real_escape_string($conn, strip_tags($_POST['dob']));
		$cname=mysqli_real_escape_string($conn, strip_tags($_POST['cname']));
		$cid=mysqli_real_escape_string($conn, strip_tags($_SESSION['cid']));
		
		
		mysqli_query($conn,"update client_details set FirstName='$fname' , LastName='$lname' ,Email='$email' ,
			Phone='$pno' ,DOB='$dob' ,CompanyName='$cname' where ClientId='".$cid."'") or die(mysql_error($conn));
		
		$url="location:task.php?cid=".$_SESSION['cid'];
		
			
		header($url);
	}
?>
