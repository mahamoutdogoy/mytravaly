<?php
//session_start();// Starting Session
include("../connect.php");
$users= $_SESSION["userid"];// Storing Session
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query("select * from users where studid = '$users'");

$row = mysql_fetch_assoc($ses_sql);
$my_id=$row['userid'];

$my_file=$row['file'];

if(!isset($my_fname)){
mysqli_close($con); // Closing Connection
//header('Location: usertbl.php'); // Redirecting To Home Page
}
?>
