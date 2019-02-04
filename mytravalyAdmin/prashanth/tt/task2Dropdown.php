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
<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="New"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Import"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Export"/>
</div>
<div id="tog" class="alert alert-success alert-dismissible">
<input name="check_list" type="button" class="btn btn-info" value="Select All" onclick="checkAll()"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="sendmail"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Create task"/>
</div>
<div >
    <table  class="table table-striped" >
    <tr style='font-family:Britannic Bold;font-size:20;background-color: #ff6f61;'>
	<th></th>
        <th>Code</th>
        <th>Clients</th>
        <th>Task</th>
        <th>Date Opened</th>
        <th>Priority</th>
        <th>Due Date</th>
        <th>Action Description</th>
		<th>Status</th>
		<th>Assign to</th>
        <th>Remarks</th>
    </tr>
	
    <?php
        $con=mysqli_connect("localhost","root","","sb_database") or die( mysqli_connect_error());
        $task_list=mysqli_query($con,"select client_details.ClientId,FirstName,DateOpened,TaskId,Task,Priority,DueDate,AssignTo,Status,Remarks,Description from client_details join task_details on client_details.ClientId=task_details.ClientId") or die(mysqli_error());
       
        while($row = mysqli_fetch_assoc($task_list))
        {
		
            echo "<tr id=".$row['ClientId'].">
			<td><input type='checkbox' class='form-checkbox'></td>
			<td>".$row['ClientId']."</td><td>".$row['FirstName']."</td>
			<td>
			<a href='http://localhost/tt/task.php?id=".$row['ClientId']."&task=".$row['Task']."'>".$row['Task']."</td>
			<td>".$row['DateOpened']."</td>";
			
        
		echo "<td>
            <select name='priority'  class='priority'>";
			
			if($row['Priority']=='Hot'){
				
				echo "<option value=".$row['ClientId'].'/Hot'." selected='selected'>Hot</option>
                    <option value=".$row['ClientId'].'/Warm'.">Warm</option>
                    <option value=".$row['ClientId'].'/Cold'.">Cold</option>";
			}
			else if($row['Priority']=='Warm')
			{
				echo "<option value=".$row['ClientId'].'/Hot'.">Hot</option>
                    <option value=".$row['ClientId'].'/Warm'." selected='selected'>Warm</option>
                    <option value=".$row['ClientId'].'/Cold'.">Cold</option>";
			}
			else if($row['Priority']=='Cold')
			{
				echo "<option value=".$row['ClientId'].'/Hot'.">Hot</option>
                    <option value=".$row['ClientId'].'/Warm'.">Warm</option>
                    <option value='Cold' selected='selected'>Cold</option>";
			}
					else
						echo "<option value='' disabled selected>--Select--</option>
					<option value=".$row['ClientId'].'/Hot'." >Hot</option>
                    <option value=".$row['ClientId'].'/Warm'.">Warm</option>
                    <option value=".$row['ClientId'].'/Cold'.">Cold</option>";
                   
            echo " </select>
			<script>$('.priority').val=".$row['Priority'].";</script>
        </td>
        <td> 
            <label id=''>". $row['DueDate']."</label> 
        </td>
		<td>";
		if($row['Description']!='')
			echo "<input type='text' class='".$row['ClientId'].'Action'."'   name='remarks'   value='".$row['Description']."'/>";
		else
			echo "<input type='text' name='ActionDescription' class='".$row['ClientId'].'Action'."'  placeholder='Action Description'/>";
			echo "<input type='button' class='Action' text='".$row['ClientId']."' value='Update'/>
		</td>
        
        <td>
            ";
			if($row['Status']=="NOT_YET_STARTED")
			{
				//echo "<script>$('#".$row['ClientId']."').css('background',' #ff7133');</script>
				echo "<select name='status' class='status'>
                <option value=".$row['ClientId'].'/'.$row['TaskId'].'/NOT_YET_STARTED'." selected='selected' >NOT_YET_STARTED</option>
                <option value=".$row['ClientId'].'/ONGOING'.">Ongoing</option>
                
                <option value=".$row['ClientId'].'/COMPLETED'.">Completed</option>
				</select>";
			}
			else if($row['Status']=="ONGOING")
			{
				//echo "<script>$('#".$row['ClientId']."').css('background','#E0FFFF');</script>
				echo "<select name='status' class='status'>
                <option value=".$row['ClientId'].'/NOT_YET_STARTED'."  >NOT_YET_STARTED</option>
                <option value=".$row['ClientId'].'/ONGOING'." selected='selected'>Ongoing</option>
                
                <option value=".$row['ClientId'].'/COMPLETED'.">Completed</option>
				</select>";
			}
			else if($row['Status']=="COMPLETED")
			{
				//echo "<script>$('#".$row['ClientId']."').css('background','#33ff58');</script>
				echo "<select name='status' class='status'>
                <option value=".$row['ClientId'].'/NOT_YET_STARTED'.">NOT_YET_STARTED</option>
                <option value=".$row['ClientId'].'/ONGOING'.">Ongoing</option>
                
                <option value=".$row['ClientId'].'/COMPLETED'." Selected='Selected'>Completed</option>
				</select>";
			}
			else
			{
				//echo "<script>$('#".$row['ClientId']."').css('background','#9969b4');</script>
				echo "<select name='status' class='status'>
				<option value='' disabled selected>--select--</option>
                <option value=".$row['ClientId'].'/NOT_YET_STARTED'.">NOT_YET_STARTED</option>
                <option value=".$row['ClientId'].'/ONGOING'.">Ongoing</option>
                
                <option value=".$row['ClientId'].'/COMPLETED'.">Completed</option>
				</select>";
			}
			echo "
			
        </td>
		<td>";
            
                
                echo "<select name='assign_to' class='myDropDown' onchange='OnSelectionChange()'>";
                echo "<option value='' disabled selected>---select---</option>";
                 $emp_list=mysqli_query($con,"select name,email from employee") or die(mysqli_error());
                while ($row2=mysqli_fetch_assoc($emp_list)) {
					$v=$row['ClientId']."/".$row2['email']."/".$row2['name'];
					if($row['AssignTo']==$row2['name'])
						echo "<option value='$v' selected='selected'>".$row2['name']."</option>";
					else	
						echo "<option value='$v'>".$row2['name']."</option>";
					
                }
                
                echo "<option value='add' ><h3><span class='label label-default'>Add New</span></h3></option>
            </select>
        </td>
        <td>";
            if($row['Remarks']!='')
			echo "<input type='text' class='".$row['ClientId']."'   name='remarks'  placeholder='Remarks' value='".$row['Remarks']."'/>";
		else
			echo "<input type='text' class='".$row['ClientId']."'   name='remarks'  placeholder='Remarks'/>";
		
       echo " <input type='button' class='remarks' text='".$row['ClientId']."' value='Update'/>
		
        </td>
    </tr>";
    
    }
    ?>
    
    </table>
    </div>
</form>

</body>
</html>
<!-- script for assign to new with sending notification  mail -->
    <script>
            $(document).ready(function(){
            $('.myDropDown').change(function(){
                //Selected value
                var inputValue = $(this).val();
				var string1=inputValue.split("/");
				var id=string1[0];
				var eid=string1[1];
				var ename=string1[2];
                alert("Sending a Mail To "+ename+" : "+eid);

                //Ajax for calling php function
                $.post('lead_table_data_operation.php', {lead_id:id,email:eid,name:ename}, function(data){
					
                    alert('Mail Sent Successfully...');
					location.reload();
                    //do after submission operation in DOM
                });
            });
        });
    </script>
	
	<!-- script for changing priority -->

	<script>
		$(document).ready(function(){
            $('.priority').change(function(){
                //Selected value
                var inputValue = $(this).val();
				var string1=inputValue.split("/");
				var id=string1[0];
				var priority=string1[1];
				alert('Priority changed to '+priority);
                //Ajax for calling php function
                $.post('lead_table_data_operation.php', {lead_id:id , prty:priority}, function(data){
					
					alert('Priority changed to '+priority+'  Successfully...');
					location.reload();
                    //do after submission operation in DOM
                });
            });
        });
	</script>
	
	<!-- script for showing pop-up menu for send mail and add task  -->

<script>
var tog = $("#tog").hide();
       $('.form-checkbox').change(function () {
           $(tog).toggle($('.form-checkbox:checked').length > 0);
       }).change();
</script>

<!-- script for select all check box -->

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
     } else {
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

<!-- script for updating status and changeing color  according to that  -->

<script>
		$(document).ready(function(){
			$(".status").change(function(){
				var selected_status_value=$(this).val();
				var str=selected_status_value.split("/");
				
				var id=str[0];
                var tid=str[1];
                var selected_status=str[2];
				alert("status Updating to "+str);
				
				
				/* if(selected_status=="NOT_YET_STARTED")
				{
					$(this).closest('tr').css('background',' #ff7133');
				}
				else if(selected_status=="COMPLETED")
				{
					$(this).closest('tr').css('background','#33ff58');
				}
				else if(selected_status=="ONGOING")
				{
					$(this).closest('tr').css('background','#E0FFFF');
				} */
				$.post('lead_table_data_operation.php', {lead_id:id ,taskid:tid, status:selected_status}, function(data){
					
					alert('Status Updated  Successfully...');
					location.reload();
                    //do after submission operation in DOM
                });
			});
		});
	</script>
	
	<!-- script for Updating Remarks -->

<script>
$(document).ready(function(){
    $('.remarks').click(function(){
        var id=$(this).attr("text");
		var text=$('input.'+id).val();
        alert('Updating Remarks');
		$.post('lead_table_data_operation.php', {lead_id:id , text:text}, function(data){
					
					alert('Remarks Updated  Successfully...');
					location.reload();
                    //do after submission operation in DOM
                });
		
    });
});
    </script>
	<script>
$(document).ready(function(){
    $('.Action').click(function(){
        var id=$(this).attr("text");
		var text=$('input.'+id+'Action').val();
        alert('Updating Action Description');
		$.post('lead_table_data_operation.php', {lead_id:id , action:text}, function(data){
					
					alert('Action Description Updated  Successfully...');
					location.reload();
                    //do after submission operation in DOM
                });
		
    });
});
    </script>