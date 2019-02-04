
<?php
if(isset($_POST['submit']))
{
	$cid=$_REQUEST['cid'];
	$con2=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
	mysqli_query($con2,"insert into task_details (ClientId,Task,Priority,AssignTo,Status,Description,Remarks,DueDate) values ('$cid','$_POST[task]','$_POST[priority]','$_POST[assignto]','NOT_YET_STARTED','$_POST[description]','$_POST[remarks]','$_POST[duedate]')") ;
	echo "<script>alert('added');</script>";
	$url="location:http://localhost/tt/task.php?cid=".$cid;
	mysqli_close($con2);
	
	header($url);
}
?>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script type="text/javascript">
function myfunction() {
  var x = document.getElementById("priority").value;
  var date=new Date();
  if(x=="Hot")
  {
 date.setDate(date.getDate()+1)
  document.getElementById("duedate").value=date;
  getD();
}
else if(x=="Warm")
{
  date.setDate(date.getDate()+3)
  document.getElementById("duedate").value=date;
  getD();
}
else if(x=="Cold")
{
  date.setDate(date.getDate()+7)
  document.getElementById("duedate").value=date;
  getD();
}
function getD(){
  var todaydate = date;
  var day = todaydate.getDate();
  var month = todaydate.getMonth() + 1;
  var year = todaydate.getFullYear();
  var datestring = day + "/" + month + "/" + year;
  document.getElementById("duedate").value = datestring;
 }
getDate();}
</script>
<style>
	input {
		width: 170px;
		border-radius: 5px;
	}
	select{
		width: 170px;
		border-radius: 5px;
	}
</style>
   
</head>
<body>
	<form action='' method='post'>
<table cellpadding="20"><tr>
	

<?php
	
	$con=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
	$list=mysqli_query($con,"select FirstName,LastName,Email,Phone from client_details where ClientId='".$_REQUEST['cid']."';")or 
	die(mysqli_error($con));
	$row=mysqli_fetch_assoc($list);

echo "
	<td style='width:40%' valign='top'><table cellpadding=10><tr>
	<td>
	<input type='button' class='btn btn-warning btn-sm' value='Edit Profile'/>
	
	</td></tr>
	<tr>
	<td>


	<img src='http://localhost/tt/img/profile.png' height='70px' width='70px' radius=50></img>

	</td>
	<td><b style='font-size:25'>".$row['FirstName'].' '.$row['LastName']."</b>
</td>
	</tr>
	<tr>
	<td>Phone No</td><br>
	<td><b>".$row['Phone']."</b></td>
	</tr>
	<tr>
	<td>Email</td>
	<td><span style='color:blue'>".$row['Email']."</span></td>
	</tr>
	<tr><td colspan=2><br>
	<input type='button' class='btn btn-info' name='send_mail' value='Send Mail'/>
				
	</td>
	</tr>
</table></td>";
?><td>
		<table cellpadding="10px" >
			<tr>
				<td>
					<label class="" for="task" >Task </label>
				</td>
				<td>
					<select id="task" name="task" required>
						<option value="" disabled selected>--select</option>
                          <option value="Call">Call</option>
                           <option value="Email">Email</option>
                           <option value="Message">Message</option>
                    </select>
				</td>
			</tr>
			<tr>
				<td>
					<label class=" " for="priority" >Priority </label>
				</td>
				<td>
					<select id="priority" placeholder="Add" required name="priority" onchange="myfunction()">
                            <option value="" disabled selected>--select--</option>
                            <option value="Hot" >Hot</option>
                            <option value="Warm">Warm</option>
                            <option value="Cold">Cold</option>
                    </select>
				</td>
			</tr>
			<tr>
				<td>
					<label class="" for="Duedate">Due date  </label>
				</td>
				<td>
					<input type="text" name="duedate" id="duedate" placeholder="Duedate"  readonly="">
				</td>
			</tr>
			<tr>
				<td>
					<label class="" for="assignto">Assign to </label>
				</td>
				<td>
					<select id="task" name="assignto" required>
                            <option value='' disabled selected>---select---</option>
                              <?php
                           
                            	$emp_list=mysqli_query($con,"select name,email from employee") or die(mysqli_error($con));
                            	while ($row3=mysqli_fetch_assoc($emp_list)) {
                               		 echo "<option value='".$row3['name']."'>".$row3['name']."</option>";
                               		}
                            ?>
                           
                            </select>
				</td>
			</tr>
			<tr>
				<td>
					<label class="" for="status">Status </label>
				</td>
				<td>
					<input type="text" list="status" name="status" value="NOT YET STARTED"  readonly />
				</td>
			</tr>
			<tr>
				<td>
					<label class="" for="description" >Description </label>
				</td>
				<td>
					<input type="text" name="description" id="Description" >
				</td>
			</tr>
			<tr>
				<td>
					<label class="" for="remarks" >Remarks</label>
				</td>
				<td>
					<input type="text" name="remarks" id="remarks"  >
				</td>
			</tr>
			<tr>
				<td><td  align="left"> <input type="submit"  id="submit" class=" btn btn-success "  style="width:100px;" name="submit" value="Save" ></td>
				<td></td>
			</tr>
       
		</table>
	</td>
</tr>
</table>

	</form>
</body>
</html>

