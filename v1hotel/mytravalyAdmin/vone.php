<?php
session_start();
 include("../../connect.php");
 $sql = "select image from users where userid=".$_SESSION['user']['userid'];
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);

 $image = $row['image'];
$image_src = "images/".$image;
?>




