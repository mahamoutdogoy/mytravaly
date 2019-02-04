<?php
session_start();

include('connect.php');
include('checkuser.php');
if(isset($_POST))
{	    $imgFile = $_FILES['ufile']['name'];

		$tmp_dir = $_FILES['ufile']['tmp_name'];
		$imgSize = $_FILES['ufile']['size'];
		if($imgFile)
		{
			$upload_dir = 'uploaded/';
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
			$userprofile = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$user['file']);
					move_uploaded_file($tmp_dir,$upload_dir.$userprofile);
				}
				else
				{
					$errMSG = "Sorry, Your File Is Too Large To Upload. It Should Be Less Than 5MB.";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF Extension Files Are Allowed.";		
			}	
		}
		else
		{
			$userprofile=$_POST['old_slider'];
		}
	
   //$new_photo = $_POST['ufile'];
   

   $sql = "UPDATE user SET file='$userprofile' WHERE userid='$users_check'";

$result=mysql_query($sql);
if($result)
{
	header("location:userprofile.php");
} 

mysql_close($con);
}
?>
