<?php
 
if($_POST['tid'] )
    {
    
    include('../dbConect.php');
  
    mysqli_query($conn,"delete from task_details where TaskId='$_POST[tid]'") or die(mysql_error($conn));
    mysqli_close($conn);

  }

  else if ($_POST['taskid'] && $_POST['email'] && $_POST['name'])
  {
    include('../dbConect.php');
    include('../phpmailer/sendemail.php');
    mysqli_query($conn,"update task_details set AssignTo='$_POST[name]' where TaskId='$_POST[taskid]';")or die(mysqli_error($conn));
    mysqli_close($conn);
    $email=$_POST['email'];
    send_mail($email,"new notification ","hi there \n You have new task to do... Thank You " )or die("mail not sent)");
  }
 

?>