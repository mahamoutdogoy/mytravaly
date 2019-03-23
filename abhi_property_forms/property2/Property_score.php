<?php
include 'Property_DB.php';
$res=mysqli_query($con,"select property_score from property_score");
$res1=mysqli_fetch_array($res);
echo $res1[0]."hi";
$status=$res1[0]+1;
mysqli_query($con,"update property_score set property_score='$status'");
?>