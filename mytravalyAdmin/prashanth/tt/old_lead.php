<html>
<head>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

 

</head>
<body>
    <form>
        <div style="width:70%"  align='right'>
            <input type="button" class='btn btn-info' value="New" onclick="window.location='http://localhost/tt/enq_form.php'" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" class='btn btn-success' value="Import"/>
        </div>

        <div id="tog" class="alert alert-success alert-dismissible">
            
            <input type="submit" value="sendmail" class="btn btn-info"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Create task" class="btn btn-success"/>
        </div>

        <div style="width:70%">
        <table  class="table table-striped" >
            <tr style='font-family:Britannic Bold;font-size:20;background-color: #ff6f61;'>
	           <th></th>
                <th>Code</th><th>Clients</th><th>Task</th><th>Priority</th><th>Due Date</th><th>ActionDescription</th><th>Status</th><th>Assign to</th><th>Remarks</th></tr>
	
            <?php
                $con=mysqli_connect("localhost","root","","sb_database") or die( mysqli_connect_error());
                $task_list=mysqli_query($con,"select ClientId,FirstName from client_details") or die(mysqli_error());
       
                while($row = mysqli_fetch_assoc($task_list))
                {
                     echo "<tr>

                            <td><input type='checkbox' class='form-checkbox' name='sendmail' value='".$row['ClientId']."' id='".$row['ClientId']."'></td>
                            <td>".$row['ClientId']."</td>
                            <td>".$row['FirstName']."</td>";

                            $query=mysqli_query($con,"select Status from task_details where ClientId=".$row['ClientId']." and Status!='COMPLETED'");

                            if($hastask=mysqli_num_rows($query)>0)
                            {

                            

                            $task_type_list=mysqli_query($con,"select * from task_details where ClientId=".$row['ClientId']." and Status!='COMPLETED' order by DueDate LIMIT 1;");
                            while($t=mysqli_fetch_assoc($task_type_list))
                                $task=$t;
                            
                            //task column
                            
                            if($task['Task']=='Call'){

                                echo " <td><a href='http://localhost/tt/task.php?cid=".$row['ClientId']."&tid=".$task['TaskId']."&task=".$task['Task']."'><img src='http://localhost/tt/img/phone.png' height='35px' width='35px'></td>";
                            }
                            else if($task['Task']=='Email'){

                                echo " <td><a href='http://localhost/tt/task.php?cid=".$row['ClientId']."&tid=".$task['TaskId']."&task=".$task['Task']."'><img src='http://localhost/tt/img/gmai.png' height='35px' width='35px'></td>";
                            }
                            else if($task['Task']=='Message'){

                                echo " <td><a href='http://localhost/tt/task.php?cid=".$row['ClientId']."&tid=".$task['TaskId']."&task=".$task['Task']."'><img src='http://localhost/tt/img/message.png' height='35px' width='35px'></td>";
                            }
                            else
                            {
                                echo " <td><a href='http://localhost/tt/task.php?cid=".$row['ClientId']."&tid=".$task['TaskId']."&task=".$row['Task']."'><img src='http://localhost/tt/img/add.png' height='35px' width='35px'>add Task</td>";
                            }

                            //priority column
                             if($task['Priority']!='')
                                 echo "<td>".$task['Priority']."</td>";
                            else
                                echo "<td><a href='http://localhost/tt/edit_task.php?cid=".$row['ClientId']."&tid=".$task['TaskId']."'>set priority</a></td>";

                            //Due Date column
                             if($task['DueDate']!='')
                                 echo "<td>".$task['DueDate']."</td>";
                            else
                                echo "<td><a href='http://localhost/tt/edit_task.php?cid=".$row['ClientId']."&tid=".$task['TaskId']."'>Due Date</a></td>";

                            //action description column
                            if($task['Description']!='')
                                 echo "<td>".$task['Description']."</td>";
                            else
                                echo "<td><a href='http://localhost/tt/edit_task.php?cid=".$row['ClientId']."&tid=".$task['TaskId']."'>Action Description</a></td>";

                            //status column
                             if($task['Status']!='')
                                 echo "<td><a href='http://localhost/tt/edit_task.php?cid=".$row['ClientId']."&tid=".$task['TaskId']."'>".$task['Status']."</a></td>";
                            else
                                echo "<td><a href='http://localhost/tt/edit_task.php?cid=".$row['ClientId']."&tid=".$task['TaskId']."'>Status</a></td>";

                            //assign To
                            echo "<td>";
                            echo "<select name='assign_to' style='width:170px' class='myDropDown'>";
                            echo "<option value='' disabled selected>---select---</option>";
                             $emp_list=mysqli_query($con,"select name,email from employee") or die(mysqli_error($con));
                            while ($row3=mysqli_fetch_assoc($emp_list)) {
                             $v=$task['TaskId']."/".$row3['email'].'/'.$row3['name'];
                            if($task['AssignTo']==$row3['name'])
                             echo "<option value='$v' selected='selected'>".$row3['name']."</option>";
                            else    
                                echo "<option value='$v'>".$row3['name']."</option>";
                    
                }

                           echo "</td>";

                            //remarks column
                            if($task['Remarks']!='')
                                 echo "<td>".$task['Remarks']."</td>";
                            else
                                echo "<td><a href='http://localhost/tt/edit_task.php?cid=".$row['ClientId']."&tid=".$task['TaskId']."'>Remarks</a></td>";

                            echo "</tr>";
                        }

                        else
                        {
                            echo " <td><a href=''><img src='http://localhost/tt/img/add.png' height='35px' width='35px'></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td></tr>
                            ";
                        }
                        

                }
            ?>
        </table>
    </div>
</form>
</body>
</html>        

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
                alert("Sending a Mail To "+ename+" : "+eid);

                //Ajax for calling php function
                $.post('demo.php', {taskid:tid,email:eid,name:ename}, function(data){
                    
                    alert('Mail Sent Successfully...');
                    location.reload();
                    //do after submission operation in DOM
                });
            });
        });
    </script>