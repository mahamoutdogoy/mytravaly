<?php
  $con=mysqli_connect("localhost","root","","mytravaly")or die(mysqli_connect_error());
if($_POST['tid'] )
    {
    
    
  
    mysqli_query($con,"delete from task_details where TaskId='$_POST[tid]'") or die(mysql_error($con));
    mysqli_close($con);

  }

  else if ($_POST['taskid'] && $_POST['email'] && $_POST['name'])
  {
   
    include('../phpmailer/sendemail.php');
   
    mysqli_query($con,"update task_details set AssignTo='$_POST[name]' where TaskId='$_POST[taskid]';")or die(mysqli_error($con));
    mysqli_close($con);
    $email=$_POST['email'];
    send_mail($email,"new notification ","hi there \n You have new task to do... Thank You " )or die("mail not sent)");
  }
 

?>