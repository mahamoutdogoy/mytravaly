
<?php
session_start();
include("connect.php");
if(isset($_POST['save']))
{
   $new_password = $_POST['pass'];
   $new_cpassword = $_POST['cpass'];

 $useremail=$_SESSION['user'];
$sql=mysqli_query($con,"update user password='$new_password',cpassword='$new_cpassword' where email='$useremail'");

$num=mysqli_fetch_array($sql);
if($num>0)
{
 $_SESSION['msg1']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg1']="Old Password not match !!";
}
}
?>

