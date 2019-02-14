<?php
include("connect.php");


$users = 0;



$sql = "SELECT * FROM mt";
$result = mysqli_query($con,$sql);
if ($rowcount=mysqli_num_rows($result) > 0)
 {
   
    while($row = mysqli_fetch_assoc($result)) {
     $users++;
    }
} else {

}




?>