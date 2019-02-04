<?php
session_start();
include"connect.php";
if(empty($_SESSION['user'])){
 header('location:index.php');
}
if($_SESSION['user']['role']=='user'){
 header('location:user.php');
}
if($_SESSION['user']['role']=='manager'){
 header('location:moderator.php');
}
?>
<h1>Hi, <?php echo $_SESSION['user']['fname'];?> Page</h1>
 
 
<link rel="stylesheet" href="style.css" type="text/css"/>
<div id="profile">
<h2>User name is: <?php echo $_SESSION['user']['fname'];?> and Your Role is :<?php echo $_SESSION['user']['role'];?></h2>
<div id="logout"><a href="logout.php">Please Click To Logout</a></div>
</div>