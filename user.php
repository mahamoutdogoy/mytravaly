<?php
session_start();
if(empty($_SESSION['user'])){
 header('location:user.php');
}
if($_SESSION['user']['role']=='admin'){
 header('location:admin.php');
}
if($_SESSION['user']['role']=='manager'){
 header('location:moderator.php');
}
?>
<h1>Wellcome to <?php echo $_SESSION['user']['fname'];?> Page</h1>
 
 
<link rel="stylesheet" href="style.css" type="text/css"/>
<div id="profile">
<h2>User name is: <?php echo $_SESSION['user']['fname'];?> and Your Role is :<?php echo $_SESSION['user']['role'];?></h2>
<div id="logout"><a href="logout.php">Please Click To Logout</a></div>
</div>