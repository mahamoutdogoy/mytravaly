<?php 

 if(!isset($_SESSION['user']))
{
    // not logged in
    header('Location:../index.php');
    exit();
}
 ?>
