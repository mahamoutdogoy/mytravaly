<?php
	 $host = 'localhost';
    $user = 'root';                     
    $pass ='';                            
    $db = 'mytravaly';                              
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
                      $sql = "INSERT into client_details (FirstName,LastName,CompanyName,LeadSource,Email,Task,DOB,Status,Phone,Priority,DueDate,AssignTo,Dateopen,Remarks,Description) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','$emapData[13]','$emapData[14]')";
                      mysqli_query($con,$sql);
                  }                                              
                }
            echo "<script>alert('Data Saved Successful');</script>";
            
          }
?>