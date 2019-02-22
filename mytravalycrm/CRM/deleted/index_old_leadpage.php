
<html>
<head>
    <title>CRM Lead</title>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        


            <style>
        input[type=submit],input[type=button] {
            width:100px;
            }

    </style>
 
    

</head>
<body>
    <!-- header section -->
<div class="container-fluid">
	<?php include("header.php"); ?>

     <!--end of  header section -->

     <br><br>
     
     <div class="row">
        <!-- Sidebar section -->
        <div class="col-md-3"  >
            <?php include("sidebar.php"); ?>
        </div>
        <!-- end of Sidebar section -->
        <div class="col-md-9">
            
            <form action="" method="post">
            <!-- Search button and new button section-->
    		<div class="input-group float-right col-md-8"  >
			     
                 <input type="text" style="border-radius:5px" aria-label="Text input with segmented dropdown button" placeholder="Enter Name To Search" >
			     <div class="input-group-append">
			         <button type="button" style="border-radius:5px" class="btn btn-outline-secondary">
			             <img src="img/search.png" style="height:20px;width=20px;" /></button>
			         <button type="button" style="border-radius:5px" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			             <span class="sr-only">Toggle Dropdown</span>
			         </button>
			
			     </div>
			
                &ensp;&ensp;
			     <input type="button" class='btn btn-info' value="New" onclick="window.location='enq_form.php'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="button" class='btn btn-success' value="Import" onclick="window.location='csv.php'" >&ensp;
		    </div>
		
        <br><br>
		<!-- Hidden Send Mail And Add Task section-->
        <div id="tog" class="alert alert-success alert-dismissible">
            
            <input type="submit" name="sendmail" value="Send Mail" onclick="javascript: form.action='sendMail.php'" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Create task" name="addtask" onclick="javascript: form.action='mul_new_task.php'" class="btn btn-success" >
        </div>
        <!--End of Hidden Send Mail And Add Task section-->
      
        <!-- Lead Grid Table -->
        <div >
            <table   class="table table-striped" >
            <tr style='font-family:Roboto;font-size:16;background-color:#f15025;color: #fff'>
               <th></th>
                <th>Code</th><th>Clients</th><th>Task</th><th>Priority</th><th>Due Date</th><th>Action Description</th><th>Status</th><th>Assign to</th><th>Remarks</th></tr>
    
            <?php
                include('../dbConnect.php');

                //code for page limiting
                $task_list=mysqli_query($conn,"select ClientId from client_details") or die(mysqli_error($conn));
                 $data_per_page = 7;//no of client list to show 
                 $records = mysqli_num_rows($task_list);
                  $no_of_page = ceil($records / $data_per_page);
                if(!isset($_GET['page']) || $_GET['page']<=0){
                    $page = 1;
                }else{
                        $page = $_GET['page'];
                }
                 $page_limit_data = ($page - 1) * $data_per_page;

                 //Retrieving details
                $query=mysqli_query($conn,"select * from task_details where  Status!='COMPLETED' group by ClientId  order by DueDate LIMIT " . $page_limit_data . "," . $data_per_page) ;
                while($row=mysqli_fetch_assoc($query))
                {
                        $client=mysqli_query($conn,"select FirstName from client_details where ClientId=".$row['ClientId']) ;
                        $clientname = mysqli_fetch_assoc($client); 
                        if($temp=mysqli_num_rows($client)>0)

                        {
                            echo "<tr>

                            <td>
                            <input type='checkbox' class='form-checkbox' name='client_check_list[]' value='".$row['ClientId']."' id='".$row['ClientId']."'></td>
                            <td>".$row['ClientId']."</td>
                            <td>".$clientname['FirstName']."</td>";

                         
                            if($row['Task']=='Call'){

                                echo " <td><a href='task.php?cid=".$row['ClientId']."&tid=".$row['TaskId']."&task=".$row['Task']."'><img src='img/phone.png' height='35px' width='35px'></a></td>";
                            }
                            else if($row['Task']=='Email'){

                                echo " <td><a href='task.php?cid=".$row['ClientId']."&tid=".$row['TaskId']."&task=".$row['Task']."'><img src='img/email.png' height='35px' width='35px'></a></td>";
                            }
                            else if($row['Task']=='Message'){

                                echo " <td><a href='task.php?cid=".$row['ClientId']."&tid=".$row['TaskId']."&task=".$row['Task']."'><img src='img/msg.png' height='35px' width='35px'></a></td>";
                            }
                            else if($row['Task']=="Post Card")
                            {
                                echo " <td><a href='task.php?cid=".$row['ClientId']."'><img src='img/gallery.png' height='35px' width='35px'></a></td>";
                            }
                            else
                            {
                                echo " <td><a href='new_task.php?cid=".$row['ClientId']."'><img src='img/add.png' height='35px' width='35px'></a></td>";
                            }

                            //priority column
                             if($row['Priority']!='')
                                 echo "<td>".$row['Priority']."</td>";
                            else
                                echo "<td><a href='edit_task.php?cid=".$row['ClientId']."&tid=".$row['TaskId']."'>set priority</a></td>";

                            //Due Date column
                             if($row['DueDate']!='')
                                 echo "<td>".$row['DueDate']."</td>";
                            else
                                echo "<td><a href='edit_task.php?cid=".$row['ClientId']."&tid=".$row['TaskId']."'>Due Date</a></td>";

                            //action description column
                            if($row['Description']!='')
                                 echo "<td>".$row['Description']."</td>";
                            else
                                echo "<td><a href='edit_task.php?cid=".$row['ClientId']."&tid=".$row['TaskId']."'>Action Description</a></td>";

                            //status column
                             if($row['Status']!='')
                                 echo "<td><a href='edit_task.php?cid=".$row['ClientId']."&tid=".$row['TaskId']."'>".$row['Status']."</a></td>";
                            else
                                echo "<td><a href='edit_task.php?cid=".$row['ClientId']."&tid=".$row['TaskId']."'>Status</a></td>";

                            //assign To
                            echo "<td>";
                            echo "<select name='assign_to' style='width:100px' class='myDropDown'>";
                            echo "<option value='' disabled selected>---select---</option>";
                             $emp_list=mysqli_query($conn,"select name,email from employee") or die(mysqli_error($conn));
                            while ($row3=mysqli_fetch_assoc($emp_list))
                            {
                                $v=$row['TaskId']."/".$row3['email'].'/'.$row3['name'];
                               
                                if($row['AssignTo']==$row3['name'])
                                    echo "<option value='$v' selected='selected'>".$row3['name']."</option>";
                                else    
                                    echo "<option value='$v'>".$row3['name']."</option>";
                    
                            }

                           echo "</td>";

                            //remarks column
                            if($row['Remarks']!='')
                                 echo "<td>".$row['Remarks']."</td>";
                            else
                                echo "<td><a href='edit_task.php?cid=".$row['ClientId']."&tid=".$row['TaskId']."'>Remarks</a></td>";

                            echo "</tr></tr>";
                        }
                }

               /* $client=mysqli_query($conn,"select ClientId,FirstName from client_details where ClientId not in (select ClientId from task_details where  Status='COMPLETED' group by ClientId)") or die(mysqli_error($conn));
                while($row=mysqli_fetch_assoc($query))
                {
                 
                         echo " <td><a href='new_task.php?cid=".$row['ClientId']."'><img src='img/add.png' height='35px' width='35px'></a></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td></tr>
                            ";
                    }
                       */ 

                
               
            ?>
        </table>
        
    </div>
    <div align="right">
        <label class="btn btn-danger">Number of Clients : <?php echo $records; ?> / Total Pages : <?php echo $no_of_page; ?></label>
        <input type="number" id='pageno' style="width:60px" placeholder="Pg no">
        <input type="button" id="search" style="width:70px" class="btn btn-info" value="Search"/>
             <?php if($page==1)
                                {
                                    $nextpage=$page+1;
                                    echo "<button class='btn btn-warning' style='width:70px'>$page</button>
									<a href='index.php?page=$nextpage'>
									<input type='button' style='width:70px' value='Next' class='btn btn-success'/>
									</a>&nbsp;&nbsp;&nbsp; &nbsp;  " ;
                                }
								else if($page== $no_of_page)
								{
									$prevpage=$page-1;
                                    echo "<a href='index.php?page=$prevpage'>
									<input type='button' style='width:70px' value='Prev' class='btn btn-success'/>
									</a>
									<button class='btn btn-warning' style='width:70px'>$page</button>
									</b>&nbsp;&nbsp;&nbsp; &nbsp;  " ;
                                
								}
                                else {
                                    $nextpage=$page+1;
                                    $prevpage=$page-1;
                                    echo "<a href='index.php?page=$prevpage'>
									<input type='button' style='width:70px' value='Prev' class='btn btn-success'/>
									</a>
									<button class='btn btn-warning' style='width:70px'>$page</button>
									</b><a href='index.php?page=$nextpage'>
									<input type='button'style='width:70px' value='Next' class='btn btn-success'/></a>&nbsp;&nbsp;&nbsp; &nbsp;  " ;
                                }


            ?>
        </div>


</form>
</div>
</div>
</div>
</body>
</html>   
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  

<!-- script for showing pop-up menu for send mail and add task  -->

<script>
var tog = $("#tog").hide();
       $('.form-checkbox').change(function () {
           $(tog).toggle($('.form-checkbox:checked').length > 0);
       }).change();
</script>

<!-- script for assign to new with sending notification  mail -->
<script>
            $(document).ready(function(){
            $('.myDropDown').change(function(){
                //Selected value
                var inputValue = $(this).val();
                var string1=inputValue.split("/");
                var tid=string1[0];
                var eid=string1[1];
                var ename=string1[2];
                alert("Sending a Mail To "+ename+" : "+eid );

                //Ajax for calling php function
                $.post('jquery_called_function.php', {taskid:tid,email:eid,name:ename}, function(data){
                    
                    alert('Mail Sent Successfully...');
                    location.reload();
                    //do after submission operation in DOM
                });
            });
        });
    </script>
    <script >
         $(document).ready(function(){
        $('#search').click(function()
        {
            var id=$('#pageno').val();
            
            window.location='index.php?page='+id;
        });
    });
    </script>