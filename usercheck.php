<?php
//session_start();// Starting Session
include("connect.php");



$sql="select * from user";
$result=mysqli_query($con,$sql);

$row=mysqli_fetch_assoc($result);


mysqli_free_result($result);
$my_id=$row['userid'];
$my_fname =$row['fname'];
$my_lname =$row['lname'];
$my_property=$row['property'];
$my_email =$row['email'];
$my_country=$row['country'];
$my_file=$row['image'];

/*if(!isset($my_fname)){
mysqli_close($con); */// Closing Connection
//header('Location: usertbl.php'); // Redirecting To Home Page
/*}*/
?>


