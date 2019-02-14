<?php

if($_POST['tid'] )
    {
    
    
    $con2=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
    mysqli_query($con2,"delete from task_details where TaskId='$_POST[tid]'") or die(mysql_error($con2));
    mysqli_close($con2);

  }
  else if ($_POST['taskid'] && $_POST['email'] && $_POST['name']){
    $con2=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
    mysqli_query($con2,"update task_details set AssignTo='$_POST[name]' where TaskId='$_POST[taskid]';")or die(mysqli_error($con2));
    mysqli_close($con2);
    mail($_POST['email'],"new notification ","hi there \n You have new task to do... Thank You " )or die("mail not sent)");
  }
 

?>