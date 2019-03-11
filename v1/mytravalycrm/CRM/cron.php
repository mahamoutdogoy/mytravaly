<?php
	require_once('../phpmailer/sendemail.php');

	require_once("../dbConnect.php");
	
	$date=date("Y/m/d");
	echo $date;
	echo "<br>";

	$query=mysqli_query($conn,"select * from task_details where DueDate <='".$date."' group by AssignTo ") or die(mysqli_error($conn));
	$i=1;
	while ($row=mysqli_fetch_array($query)) {

		$query2="SELECT count(*) as count FROM task_details where DueDate <='".$date."' and AssignTo like '".$row['AssignTo']."'";
		$list1=mysqli_query($conn,$query2)  or die(mysqli_error($conn));
		$taskCount=mysqli_fetch_array($list1);

		$query1="SELECT email FROM employee WHERE name like '".$row['AssignTo']."'";
		$list=mysqli_query($conn,$query1)  or die(mysqli_error($conn));
		if(mysqli_num_rows($list))
		{
			$email=mysqli_fetch_array($list) or die(mysqli_error($conn));
		}
		else
			$email['email']="";
		if($email['email']!="")
		{
			if(send_mail($email['email'],"Task Reminder","Hi There \nYou have '$taskCount[count]' task pending "))
			{
				echo "<script> alert('Warning ! Message not sent ...') </script>";
			}
			else
			{
				echo "<script> alert('Success ! Message  sent successfully ...') </script>";
			}
		
		echo  $i."     -> count".$taskCount['count']."  email= ".$email['email'];
    	//echo  $i."     -> task id " . $row['TaskId'] . ", task= " . $row['Task']." DueDate= ".$row['DueDate']." email= ".$email['email'];
    		
    	
    	echo "<br>";$i++;
		}
	}
?>