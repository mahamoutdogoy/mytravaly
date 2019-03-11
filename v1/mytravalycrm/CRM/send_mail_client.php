<?php
	session_start();
	include("../dbConnect.php");
	include('../phpmailer/sendemail.php');

	if(isset($_POST['sendMail']) && isset($_SESSION['cid']))
	{
		
		mailToClient($conn);
		
	}

	if(isset($_POST['add_send_mail']) && isset($_SESSION['cid']))
	{
		
		$sub=trim(mysqli_real_escape_string($conn, strip_tags($_POST['subject'])));
		$body=trim(mysqli_real_escape_string($conn, strip_tags($_POST['body'])));

		$query="insert into mail_template (HotelId,Subject,Body) values (1,'$sub','$body');";
		mysqli_query($conn,$query) or die(mysqli_error($conn));

		mailToClient($conn);


	}
	
	function mailToClient($conn)
	{
		$val=mysqli_query($conn,"select Email from client_details where ClientId=".$_SESSION['cid']) or die(mysqli_error($conn));
		
		$email=mysqli_fetch_assoc($val) or die("no value");
		
		if(send_mail($email['Email'],$_POST['subject'],$_POST['body']))
		{
			echo "<script> alert('Warning ! Message not sent ...') </script>";
		}
		else
		{
			echo "<script> alert('Success ! Message  sent successfully ...') </script>";
		}
		
		mysqli_close($conn);
		$url="location:task.php?cid=".$_SESSION['cid'];

		header($url);
	}
	
	
	
?>