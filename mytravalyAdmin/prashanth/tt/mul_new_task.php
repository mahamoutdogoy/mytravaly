
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script >
	
$(document).ready(function(){
    $('.client').click(function(){
        var id=$(this).attr("text");
        alert(id);
        $('#'+id).prop( "disabled", true );
        $('#'+id).closest('div').hide();
    });
});

</script>

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
	<form action='mul_new_task_code.php' method='post'>
<table cellpadding="20"><tr><td>
	

<?php
	
	$con=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());


		if(!empty($_POST['client_check_list']))
		{
			
			$no_clients=sizeof($_POST['client_check_list']);
			echo "<table><tr><td><b style='font-size:18px'>Selected Clients :</b></td></tr><tr><td ><hr>";
			$i=0;
			foreach($_POST['client_check_list'] as $selected)
			{

				$list=mysqli_query($con,"select FirstName,LastName from client_details where ClientId='".$selected."';") or 
				die(mysqli_error($con));
				$row=mysqli_fetch_assoc($list);
				echo "<div><input type='checkbox' name='list[]' hidden value='$selected' id='$i' checked/><p class='close client' text='".$i."' data-dismiss='alert' aria-label='close'>&times;</p>".$row['FirstName']." ".$row['LastName']." <hr/></div>";
				$i++;
			}

		}
		else {
		echo "<script>
				alert('Oops!  You Are Not Selected Any Clients ....');
				document.location='leadtablepage.php'
				</script>";
		}
	

?>
</td></tr>
</table>

</td>
<td>
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
					<label class="" for="remarks" >Remarks</label>
				</td>
				<td>
					<input type="text" name="remarks" id="remarks"  >
				</td>
				
			
				<td>
					<label class="" for="description" >Description </label>
				</td>
				<td>
					<input type="text" name="description" id="Description" >
				</td>
			</tr>
			<tr>
				<td colspan="2" ></td>
				<td>
					<label class="" for="status">Status </label>
				</td>
				<td  >
					<input type="text" list="status" name="status" value="NOT YET STARTED"  readonly />
				</td>
			</tr>
			<tr>
				<td colspan="4" align="center"> <input type="submit"  id="submit" class=" btn btn-success "  style="width:100px;" name="submit" value="Save" ></td>
				
			</tr>
       
		</table>
	</td>
</tr>
</table>

	</form>
</body>
</html>
