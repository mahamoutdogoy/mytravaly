<?php
session_start();
 include'Property_DB.php';
 if(isset($_REQUEST['print']))
 {
 	
 	 $imgContent=$_FILES['image']['tmp_name'];
 	 $imgContent=addslashes(file_get_contents($imgContent));


 	$sql="INSERT INTO agreement
 	(property_id,effective_date,hotel_name,state,location,if_to_hotelName,if_to_address,individual_Name,designation,signature) 
 	VALUES ('121','$_REQUEST[effective_date]','$_REQUEST[Hotel_name]','$_REQUEST[state_name]','$_REQUEST[head_office_address]','$_REQUEST[if_to_hotel_Name]','$_REQUEST[if_to_address]','$_REQUEST[attention]','$_REQUEST[designation]','$imgContent') ";
 	mysqli_query($con,$sql) or die(mysqli_error($con));
 	

 	$query=mysqli_query($con,"select max(agreement_id) as id from agreement") or die(mysqli_error());
 	$value=mysqli_fetch_assoc($query);
 	$path="location:agreement.php";
 	$_SESSION['agreement_id']=$value['id'];
 	//echo $_SESSION['agreement_id'];
 	header($path);
 	require_once('Property_DB.php');
}
?>