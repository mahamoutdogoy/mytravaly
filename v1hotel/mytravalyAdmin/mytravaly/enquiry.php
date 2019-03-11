<?php
	
    $con = mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
  	if(isset($_POST['submit']))
   	{
      $date=date("d/m/Y");
    	mysqli_query($con,"insert into  client_details (FirstName,LastName,CompanyName,LeadSource,Email,DOB,Phone,DateOpened) values ('$_POST[firstname]','$_POST[lastname]','$_POST[companyname]','$_POST[lead]','$_POST[email]','$_POST[dob]','$_POST[phone]','$date');") or die(mysqli_error($con));
    	
		$list_id=mysqli_query($con,"select max(ClientId) from client_details;");
    	$cid=mysqli_fetch_array($list_id);
    	
    	mysqli_query($con,"insert into task_details (ClientId,Task,Priority,AssignTo,Status,Description,Remarks,DueDate) values ('$cid[0]','$_POST[task]','$_POST[priority]','$_POST[assignto]','NOT YET STARTED','$_POST[description]','$_POST[remarks]','$_POST[duedate]')") or die(mysqli_error());

    	$sql = "SELECT email FROM employee where name='".$_POST['assignto']."';";
		$eid_list=mysqli_query($con,$sql);
		$eid=mysqli_fetch_array($eid_list);
		
		mail($eid[0],"Mail to Assign Work","Assigned WOrk");
    	echo "<script>alert('Data Saved Successful And Mail Sent Successfully');</script>";
		header("location:http://localhost/tt/leadtablepage.php");
   }
?>