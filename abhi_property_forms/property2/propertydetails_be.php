<?php

    session_start();
  $session_user=$_SESSION['user']['userid'];
	  include 'Property_DB.php';

  	if(isset($_POST['submit']))
   	{
      
      $keywords="";


      if(isset($_POST['citylife']))
      {
        $keywords="$_POST[citylife],";
      }


      if(isset($_POST['nightlife']))
      {
        $keywords=$keywords."$_POST[nightlife],";
      }

      if(isset($_POST['destination']))
      {
        $keywords=$keywords."$_POST[destination],";
      }

      if(isset($_POST['food']))
      {
        $keywords=$keywords."$_POST[food],";
      }

       if(isset($_POST['heritage']))
      {
        $keywords=$keywords."$_POST[heritage],";
      }
      
      

      
      $largenumber=$_SESSION['largestNumber'];

      $ownerid=$_SESSION['ownerid'];

      
      //error_reporting(0);

      $imgContent=$_FILES['pimage']['tmp_name'];
      $imgContent=addslashes(file_get_contents($imgContent));
      

     
       
     $query1="INSERT INTO owner (ownerid,property_id,ownername,owneremail,ownerphone) VALUES ('$ownerid','$_SESSION[largestNumber]','$_POST[ownername]','$_POST[owneremail]','$_POST[ownerphone]')";

     $query2="INSERT INTO manager(managername,manageremail,managerphone) VALUES ('$_POST[manname]','$_POST[manemail]','$_POST[manphone]')";

     $query3="INSERT INTO reservationmanager(ownerid,resname,resemail,resphone,keywords) VALUES ('$ownerid','$_POST[resmanname]','$_POST[resmanemail]','$_POST[resmanphone]','$keywords')";


    
      

      if(isset($_POST['change']))
      {
         $query5 = "INSERT INTO propertydetails (user_id,ownerid,property_name,star,property_image,propertytype,chainname,establishment,currency,description) VALUES ('$session_user','$ownerid','$_POST[pname]','$_POST[star]','$imgContent',$_POST[ptype]','$_POST[chain]','$_POST[establishment]','$_POST[currency]','$_POST[description]')";
      }
      else
      {

         $query5 = "INSERT INTO propertydetails (user_id,ownerid,property_name,star,property_image,propertytype,chainname,establishment,currency,checkin,checkout,description) VALUES ('$session_user','$ownerid','$_POST[pname]','$_POST[star]','$imgContent','$_POST[ptype]','$_POST[chain]','$_POST[establishment]','$_POST[currency]','$_POST[intime]','$_POST[outtime]','$_POST[description]')";
      }


     $query4="INSERT INTO address (ownerid,property_id,street,city,state,country,zipcode,map_address) VALUES ('$ownerid','$largenumber','$_POST[street]','$_POST[city]','$_POST[state]','$_POST[country]','$_POST[zpcode]','$_POST[map_address]')";

   

      if ( mysqli_query($con, $query1) && mysqli_query($con, $query2) && mysqli_query($con, $query3)  && mysqli_query($con, $query5) && mysqli_query($con, $query4)) 
     {?>
      <script>window.location="pd_dashboard.php"</script>
      <?php
     } 
      else
      {
    echo "Error: " .'sql'. "<br>" . mysqli_error($con);
      }
     
    mysqli_close($con);

   	require_once('Property_DB.php');
 
   }
   	?>
