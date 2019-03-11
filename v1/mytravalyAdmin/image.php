<?php
//session_start();
include 'vone.php';
include("../connect.php");


if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  
  $extensions_arr = array("jpg","jpeg","png","gif");

 
  if( in_array($imageFileType,$extensions_arr) ){
 
    
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image = $name;
 
      $query = "UPDATE users SET image='$image' WHERE userid=".$_SESSION['user']['userid'];
       // $query = "insert into users(image) values ('$name') where userid=2" ;
   
    mysqli_query($con,$query);
  
  
    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
  }
 
}
?>
