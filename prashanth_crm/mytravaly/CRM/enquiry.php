<?php
	
  include('../dbConnect.php');
  
  	if(isset($_POST['submit']))
   	{
      $date=date("d/m/Y");
     // $name = mysqli_real_escape_string($_POST['firstname']);
		$fname=mysqli_real_escape_string($conn, strip_tags($_POST['firstname']));
		$lname=mysqli_real_escape_string($conn, strip_tags($_POST['lastname']));
		$cname=mysqli_real_escape_string($conn, strip_tags($_POST['companyname']));
		$lead=mysqli_real_escape_string($conn, strip_tags($_POST['lead']));
		$email=mysqli_real_escape_string($conn, strip_tags($_POST['email']));
		
		$dob=mysqli_real_escape_string($conn, strip_tags($_POST['dob']));
		
		//inserting to client_details table
	 
    	mysqli_query($conn,"insert into  client_details (FirstName,LastName,CompanyName,LeadSource,
					Email,DOB,Phone,DateOpened) values ('$fname','$lname',
					'$cname','$lead','$email','$dob','$_POST[phone]',
					'$date');") or die(mysqli_error($conn));
    	
		$list_id=mysqli_query($conn,"select max(ClientId) from client_details;");
    	$cid=mysqli_fetch_array($list_id);
    	
    	//inserting to Task Details
		$task=mysqli_real_escape_string($conn, strip_tags($_POST['task']));
		$priority=mysqli_real_escape_string($conn, strip_tags($_POST['priority']));
		$assignto=mysqli_real_escape_string($conn, strip_tags($_POST['assignto']));
		$description=mysqli_real_escape_string($conn, strip_tags($_POST['description']));
		$remarks=mysqli_real_escape_string($conn, strip_tags($_POST['remarks']));
		$duedate=$_POST['duedate'];
		
		
		
    	mysqli_query($conn,"insert into task_details (ClientId,Task,Priority,AssignTo,Status,Description,
		Remarks,DueDate) values ('$cid[0]','$task','$priority','$assignto',
		'NOT YET STARTED','$description','$remarks','$duedate')") or die(mysqli_error($conn));
		
		//inserting to task_details table
		
    	$sql = "SELECT email FROM employee where name='".$_POST['assignto']."';";
		$eid_list=mysqli_query($con,$sql);
		$eid=mysqli_fetch_array($eid_list);
		
		//sending mail
		mail($eid[0],"Mail to Assign Work","Assigned WOrk");
    	echo "<script>alert('Data Saved Successful And Mail Sent Successfully');</script>";
    	//page redirection 
		header("location:leadtablepage.php");
   }
?>