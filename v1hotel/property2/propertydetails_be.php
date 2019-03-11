<?php

    session_start();
	 include 'Property_DB.php';
   $session_user=$_SESSION['user_id'];

  	if(isset($_POST['submit']))
   	{
      $val=$_POST['ownerid'];
      
      

      
      $largenumber=$_SESSION['largestNumber'];

      $_SESSION['var']=$_POST['ownerid'];
      error_reporting(0);
      

     $query1="INSERT INTO owner (ownerid,ownername,owneremail,ownerphone) VALUES ('$val','$_POST[ownername]','$_POST[owneremail]','$_POST[ownerphone]')";

     $query2="INSERT INTO manager(managername,manageremail,managerphone) VALUES ('$_POST[manname]','$_POST[manemail]','$_POST[manphone]')";

     $query3="INSERT INTO reservationmanager(ownerid,resname,resemail,resphone,citylife,nightlife,destination,food,heritage) VALUES ('$val','$_POST[resmanname]','$_POST[resmanemail]','$_POST[resmanphone]','$_POST[citylife]','$_POST[nightlife]','$_POST[destination]','$_POST[food]','$_POST[heritage]')";


    
      

      if(isset($_POST['change']))
      {
         $query5 = "INSERT INTO propertydetails (user_id,ownerid,property_name,propertytype,chainname,establishment,currency,description) VALUES ('$session_user','$val','$_POST[pname]','$_POST[ptype]','$_POST[chain]','$_POST[establishment]','$_POST[currency]','$_POST[description]')";
      }
      else
      {

         $query5 = "INSERT INTO propertydetails (user_id,ownerid,property_name,propertytype,chainname,establishment,currency,checkin,checkout,description) VALUES ('$session_user','$val','$_POST[pname]','$_POST[ptype]','$_POST[chain]','$_POST[establishment]','$_POST[currency]','$_POST[intime]','$_POST[outtime]','$_POST[description]')";
      }


     $query4="INSERT INTO address (ownerid,property_id,street,city,state,country,zipcode) VALUES ('$val','$largenumber','$_POST[street]','$_POST[city]','$_POST[state]','$_POST[country]','$_POST[zpcode]')";

   

      if ( mysqli_query($con, $query1) && mysqli_query($con, $query2) && mysqli_query($con, $query3)  &&mysqli_query($con, $query5) && mysqli_query($con, $query4)) 
     {?>
      <script>window.location="pd_dashboard.php"</script>
      <?php
     } 
      else
      {
    echo "Error: " .'sql'. "<br>" . mysqli_error($con);
      }
     
    mysqli_close($con);

   	}
   	?>
