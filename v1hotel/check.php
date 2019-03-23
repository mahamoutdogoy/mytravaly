<?php
require_once('connect.php');
$username = $_POST['username'];
$usernamesql = "SELECT * FROM `users` WHERE username='$username'";
		$usernameres = mysqli_query($connect, $usernamesql);
		$count = mysqli_num_rows($usernameres);
		if($count == 1){
			 echo  "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> User Name Not Availabe";
		}else{
			echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> User Name Availabe";
		}
?>