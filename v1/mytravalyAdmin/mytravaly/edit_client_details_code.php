<?php
	session_start();
	$con=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
	mysqli_query($con,"update client_details set FirstName='$_POST[fname]' , LastName='$_POST[lname]' ,Email='$_POST[email]' ,Phone='$_POST[pno]' ,DOB='$_POST[dob]' ,CompanyName='$_POST[cname]' where ClientId='".$_SESSION['cid']."'") or die(mysql_error($con));
	$url="location:http://localhost/tt/task.php?cid=".$_SESSION['cid'];
	unset($_SESSION['cid']);
		
		header($url);
?>