<?php
	
    require_once('../dbConnect.php');

    $filename=$_FILES['file']['tmp_name'];
    if(isset($_POST['submit']))
           {
            $file = fopen($filename, "r");
            $count = 0;                                         
            while (($emapData = fgetcsv($file,10000, ",")) !== FALSE)
                {

             
                  $count++;                                      
                  if($count>0)
                  {             
                                  
                      $sql = "INSERT into client_details (FirstName,LastName,CompanyName,LeadSource,Email,DOB,Phone,DateOpened) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";

                      mysqli_query($conn,$sql) or die(mysqli_error($conn));
                      $list_id=mysqli_query($conn,"select max(ClientId) from client_details;");
                      $cid=mysqli_fetch_array($list_id);

                      $sql1=" INSERT into task_details (ClientId,Task,Priority,AssignTo,Status,Description,Remarks,DueDate) values ('$cid[0]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','$emapData[13]','$emapData[14]')";
                      mysqli_query($conn,$sql1) or die(mysqli_error($conn));
                  }                                              // add this line
                }
            echo "<script>alert('Data Saved Successful');</script>";
            header("location:index.php");
            //echo "<script>setTimeout(\"location.href = 'http://www.google.co.in';\",10);</script>";
          }
?>