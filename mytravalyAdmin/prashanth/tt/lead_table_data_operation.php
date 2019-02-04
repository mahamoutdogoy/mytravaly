<?php
	//code for changing priority
    if($_POST['lead_id'] &&$_POST['taskid']  && $_POST['prty'])
    {
    
    
		$con2=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
	
        $date=date("Y/m/d");
		$date=date_create($date);
		date_format($date,"d/m/Y");
           
            if($_POST['prty']=="Hot")
            {
                $date=$date;
            }
			else if($_POST['prty']=="Warm")
            {
                date_add($date,date_interval_create_from_date_string("3 days"));
            }
			else if($_POST['prty']=="Cold")
            {
                date_add($date,date_interval_create_from_date_string("6 days"));
            }
            $date=date_format($date,'d/m/Y');
           
            mysqli_query($con2,"update task_details set DueDate='$date',Priority='$_POST[prty]' where ClientId='$_POST[lead_id]' and taskid='.$_POST[taskid]. ';") or die(mysqli_error());
			mysqli_close($con2);
                    
    }
	//code for updating a status of lead task
	else if($_POST['lead_id'] && $_POST['status'])
    {
    
    
		$con2=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
	
            mysqli_query($con2,"update task_details set Status='$_POST[status]' where Id='$_POST[lead_id]';")or die(mysqli_error());
			mysqli_close($con2);
                    
    }
	//code for updating a Remarks
	else if($_POST['lead_id'] && $_POST['text'])
    {
    
    
		$con2=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
	
            mysqli_query($con2,"update task_details set Remarks='$_POST[text]' where Id='$_POST[lead_id]';")or die(mysqli_error());
			mysqli_close($con2);
                    
    }
	//code for updating a Action Description
	else if($_POST['lead_id'] && $_POST['action'])
    {
    
    
		$con2=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
	
            mysqli_query($con2,"update task_details set Description='$_POST[action]' where Id='$_POST[lead_id]';")or die(mysqli_error());
			mysqli_close($con2);
                    
    }
	else if ($_POST['lead_id'] && $_POST['email'] && $_POST['name']){
    //call the function or execute the code
    
	$con2=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
	mysqli_query($con2,"update task_details set AssignTo='$_POST[name]' where Id='$_POST[lead_id]';")or die(mysqli_error());
	mysqli_close($con2);
	 mail($_POST['email'],"new notification ","hi there \n You have new task to do... Thank You " );
}

?>