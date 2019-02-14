<?php
	 $host = 'localhost';
    $user = 'root';                     //Your Cloud 9 username
    $pass ='';                                  //Remember, there is NO password by default!
    $db = 'mytravaly';                                  //Your database name you want to connect to
    $port = 3306;
    $con = mysqli_connect($host, $user, $pass, $db, $port)or die(mysqli_error($con));
    $filename=$_FILES['file']['tmp_name'];
    if(isset($_POST['submit']))
           {
            $file = fopen($filename, "r");
            $count = 0;                                         
            while (($emapData = fgetcsv($file,10000, ",")) !== FALSE)
                {
                  $count++;                                      
                  if($count>1)
                  {                                 
                      $sql = "INSERT into client_details (FirstName,LastName,CompanyName,LeadSource,Email,DOB,Phone,DateOpened) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[6]','$emapData[8]','$emapData[12]')";
                      mysqli_query($con,$sql) or die(mysqli_error($con));
                      $list_id=mysqli_query($con,"select max(ClientId) from client_details;");
                      $cid=mysqli_fetch_array($list_id);
                      $sql1=" INSERT into task_details (ClientId,Task,Priority,AssignTo,Status,Description,Remarks,DueDate) values ('$cid[0]','$emapData[5]','$emapData[9]','$emapData[11]','$emapData[7]','$emapData[13]','$emapData[14]','$emapData[10]')";
                      mysqli_query($con,$sql1) or die(mysqli_error($con));
                  }                                              // add this line
                }
            echo "<script>alert('Data Saved Successful');</script>";
            //echo "<script>setTimeout(\"location.href = 'http://www.google.co.in';\",10);</script>";
          }
?>