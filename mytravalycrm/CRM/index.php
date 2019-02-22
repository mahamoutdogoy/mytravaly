
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );

    </script>
</head>
<body>
    <div class="container-fluid">
    <?php include("header.php"); ?>

     <!--end of  header section -->

     <br><br>
     
     <div class="row">
        <!-- Sidebar section -->
        <div class="col-xl-2"  >
            <?php include("sidebar.php"); ?>
        </div>
        <!-- end of Sidebar section -->
        <div class="col-md-10">
            
            <form action="" method="post">
            <!-- Search button and new button section-->
            <div class="input-group float-right col-md-6" >
                 
                             
                
                 <input type="button" class='btn btn-info' style="width: 100px" value="New" onclick="window.location='enq_form.php'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="button" class='btn btn-success' style="width: 100px" value="Import" onclick="window.location='import.php'" >&ensp;
            </div>
        
        <br><br>
        <!-- Hidden Send Mail And Add Task section-->
        <div id="tog" class="alert alert-success alert-dismissible">
           
            <input type="submit" name="sendmail" value="Send Mail" onclick="javascript: form.action='sendMail.php'" class="btn btn-info btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Create task" name="addtask" onclick="javascript: form.action='mul_new_task.php'" class="btn btn-success btn-sm" >
        </div>
        <!--End of Hidden Send Mail And Add Task section-->
      
    <!-- table order by due-date which is 5(the index of due-date) in dtata-order limiting to 10 data-page-length -->
    <table id="myTable" class="display" width="100%" data-page-length="10" data-order="[[ 5, &quot;asc&quot; ]]">
        <thead>
           <tr style='font-family:Roboto;font-size:16;background-color:#f15025;color: #fff'>
                <th data-orderable="false"> <input type="checkbox" class='form-checkbox' name="" onclick="checkAll()"  /></th>
                <th>Code</th>
                <th>Clients</th>
                <th data-orderable="false">Task</th>
                <th data-orderable="false">Priority</th>
                <th>Due Date</th>
                <th data-orderable="false">Action Description</th>
                <th>Status</th>
                <th data-orderable="false">Assign to</th>
                <th data-orderable="false">Remarks</th></tr>
        </thead>
      <!--  <tfoot>
            <tr style='font-family:Roboto;font-size:16;background-color:#f15025;color: #fff'>
               <th></th>
                <th>Code</th><th>Clients</th><th>Task</th><th>Priority</th><th>Due Date</th><th>Action Description</th><th>Status</th><th>Assign to</th><th>Remarks</th></tr>
        </tfoot>-->
        <tbody>
            <?php include("../dbConnect.php");
                $query=mysqli_query($conn,"select * from client_details");
                while($row=mysqli_fetch_assoc($query))
                {
                        $task=mysqli_query($conn,"select * from task_details where ClientId=".$row['ClientId']." and  Status NOT LIKE '%Completed%' and Status NOT LIKE '%Closed%' group by ClientId  order by DueDate ") ; 
                        $row2 = mysqli_fetch_assoc($task); 
                        if($temp=mysqli_num_rows($task)>0)

                        {
                            echo "<tr>

                            <td>
                            <input type='checkbox' class='form-checkbox' name='client_check_list[]' value='".$row2['ClientId']."' id='".$row2['ClientId']."'></td>
                            <td>".$row2['ClientId']."</td>
                            <td>".$row['FirstName']."</td>";

                         
                            if($row2['Task']=='Call'){

                                echo " <td><a href='task.php?cid=".$row2['ClientId']."'><img src='img/phone.png' height='35px' width='35px'></a></td>";
                            }
                            else if($row2['Task']=='Email'){

                                echo " <td><a href='task.php?cid=".$row2['ClientId']."'><img src='img/email.png' height='35px' width='35px'></a></td>";
                            }
                            else if($row2['Task']=='Message'){

                                echo " <td><a href='task.php?cid=".$row2['ClientId']."'><img src='img/msg.png' height='35px' width='35px'></a></td>";
                            }
                            else if($row2['Task']=="Post Card")
                            {
                                echo " <td><a href='task.php?cid=".$row2['ClientId']."'><img src='img/gallery.png' height='35px' width='35px'></a></td>";
                            }
                            else
                            {
                                echo " <td><a href='new_task.php?cid=".$row2['ClientId']."'><img src='img/add.png' height='35px' width='35px'></a></td>";
                            }

                            //priority column
                             if($row2['Priority']!='' && $row2['Priority']!="Set Priority")
                                 echo "<td>".$row2['Priority']."</td>";
                            else
                                echo "<td><a href='edit_task.php?cid=".$row2['ClientId']."&tid=".$row2['TaskId']."'>Set priority</a></td>";

                            //Due Date column
                             if($row2['DueDate']!='' )
                                 echo "<td>".$row2['DueDate']."</td>";
                            else
                                echo "<td><a href='edit_task.php?cid=".$row2['ClientId']."&tid=".$row2['TaskId']."'>----/--/--</a></td>";

                            //action description column
                            if($row2['Description']!='' && $row2['Description']!="Add Description")
                                 echo "<td>".$row2['Description']."</td>";
                            else
                                echo "<td><a href='edit_task.php?cid=".$row2['ClientId']."&tid=".$row2['TaskId']."'>Add Description</a></td>";

                            //status column
                             if($row2['Status']!='')
                                 echo "<td><a href='edit_task.php?cid=".$row2['ClientId']."&tid=".$row2['TaskId']."'>".$row2['Status']."</a></td>";
                            else
                                echo "<td><a href='edit_task.php?cid=".$row2['ClientId']."&tid=".$row2['TaskId']."'>Set Status</a></td>";

                            //assign To
                            echo "<td>";
                            echo "<select name='assign_to' style='width:100px' class='myDropDown'>";
                            echo "<option value='' disabled selected>---select---</option>";
                             $emp_list=mysqli_query($conn,"select name,email from employee") or die(mysqli_error($conn));
                            while ($row3=mysqli_fetch_assoc($emp_list))
                            {
                                $v=$row2['TaskId']."/".$row3['email'].'/'.$row3['name'];
                               
                                if($row2['AssignTo']==$row3['name'])
                                    echo "<option value='$v' selected='selected'>".$row3['name']."</option>";
                                else    
                                    echo "<option value='$v'>".$row3['name']."</option>";
                    
                            }

                           echo "</td>";

                            //remarks column
                            if($row2['Remarks']!='')
                                 echo "<td>".$row2['Remarks']."</td>";
                            else
                                echo "<td><a href='edit_task.php?cid=".$row2['ClientId']."&tid=".$row2['TaskId']."'>Remarks</a></td>";

                            echo "</tr></tr>";
                        }
                        else
                        {
                            echo "<tr>

                                    <td>
                                        <input type='checkbox' class='form-checkbox' name='client_check_list[]' value='".$row['ClientId']."' id='".$row['ClientId']."'></td>
                                    <td>".$row['ClientId']."</td>
                                    
                                    <td>".$row['FirstName']."</td>
                                    
                                    <td><a href='new_task.php?cid=".$row['ClientId']."'><img src='img/add.png' height='35px' width='35px'></a></td>
                                    <td></td>
                                    <td>xxxx-xx-xx</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>";


                        }
                } 
                ?>
        </tbody>
    </table>

</form>
</div>
</div>
</div>
</body>
</html>

 
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
                var r=confirm("Are You Sure! \nAssign Task To "+ename+" !");
    
                if (r == true) {
               

                    //Ajax for calling php function
                    $.post('jquery_called_function.php', {taskid:tid,email:eid,name:ename}, function(data){
                        
                        alert('Task Assign Successfully...');
                        location.reload();
                        //do after submission operation in DOM
                    });

                }
                else
                {
                   location.reload();
                }
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
    <!--script for check all chechboxes -->
    <script>
        var isChecked = false;
        function checkAll() {
                var checkboxes = document.getElementsByTagName('input');
                 if (isChecked) {
                     for (var i = 0; i < checkboxes.length; i++) {
                         if (checkboxes[i].type == 'checkbox') {
                             checkboxes[i].checked = true;
                         }
                     }
                 } 
                 else {
                     for (var i = 0; i < checkboxes.length; i++) {
                         console.log(i)
                         if (checkboxes[i].type == 'checkbox') {
                             checkboxes[i].checked = false;
                         }
                     }
                 }
            isChecked = !isChecked;
         }
</script>