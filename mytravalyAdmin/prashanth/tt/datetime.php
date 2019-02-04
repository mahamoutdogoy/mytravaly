<?php
$con2=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
	
        $date=date("Y/m/d");
           
           /*  if($_POST['prty']=="Hot")
            {
                $date=date("d/m/Y");
            }
			else if($_POST['prty']=="Warm")
            {
                date_add($date,date_interval_create_from_date_string("3 days"));
            }
			else if($_POST['prty']=="Cold")
            {
                date_add($date,date_interval_create_from_date_string("6 days"));
            }
             */
			 $date=date_create($date);
           date_add($date,date_interval_create_from_date_string("6 days"));
		   echo ($date=date_format($date,'d/m/Y'));
		   //$date=date('d/m/Y',$date);
            mysqli_query($con2,"update client_details set DueDate='$date',Priority='Hot' where Id='1';")or die(mysqli_error());
			mysqli_close($con2);
			//mysqli_close($con2);
?>