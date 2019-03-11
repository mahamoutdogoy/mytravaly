<?php


$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'mytravaly'; 


$conn = mysqli_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');
if(!$conn)
{
echo "ould not establish the connection ".mysqli_connect_error();
}
 
?>