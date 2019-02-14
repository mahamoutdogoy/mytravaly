
<?php
if(isset($_POST['submit']))
{
	$cid=$_REQUEST['cid'];
	include("../dbConnect.php");
	
		$task=mysqli_real_escape_string($conn, strip_tags($_POST['task']));
		$priority=mysqli_real_escape_string($conn, strip_tags($_POST['priority']));
		$assignto=mysqli_real_escape_string($conn, strip_tags($_POST['assignto']));
		$description=mysqli_real_escape_string($conn, strip_tags($_POST['description']));
		$remarks=mysqli_real_escape_string($conn, strip_tags($_POST['remarks']));
		$duedate=mysqli_real_escape_string($conn, strip_tags($_POST['duedate']));
		
	mysqli_query($conn,"insert into task_details (ClientId,Task,Priority,AssignTo,Status,Description,Remarks,DueDate)
	values ('$cid','$task','$priority','$assignto','NOT YET STARTED','$description','$remarks','$duedate')") or die(mysqli_error($conn));
	echo "<script>alert('added');</script>";
	$url="location:task.php?cid=".$cid;
	mysqli_close($conn);
	
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
      function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
<script type="text/javascript">

function myfunction() {
          
          var x = document.getElementById("priority").value;
          var date=new Date();
          
          if(x=="Hot")
          {
              date.setDate(date.getDate()+1);
              getD();
          }
          else if(x=="Warm")
          {
            date.setDate(date.getDate()+3);
            getD();
          }
          else if(x=="Cold")
          {
            date.setDate(date.getDate()+7);
            getD();
          }

          function getD(){
                
                var todaydate = date;
                var day = todaydate.getDate();
                var month = todaydate.getMonth() + 1;
                var year = todaydate.getFullYear();
                var datestring =  year + "/" + month + "/" + day;
                document.getElementById("duedate").value = datestring;
          }
          //getDate();
      }
</script>
<style>
	select,input[type=text] {
			width:200px;
			border-radius: 5px;
			height: 30px;
			border: solid 1px;
		}
		td{
			font-weight: bold;
			font-family: times;
		}
</style>
   
</head>
<body>
	<form action='' method='post'>

	<?php  include("../dbConnect.php");
			include("header.php")?>
   
   <br><br>
   <!--Sidebar and form section -->
   <div class="row">

       <!--Sidebar section -->
        <div class="col-md-3"  >
            <?php include("sidebar.php"); ?>
        </div>


		<!-- task details div-->
		<div class="col-md-5">
				
			<table cellpadding="10px" align="center">
			<tr>
				<td>
					<label class="" for="task" >Task </label>
				</td>
				<td>
					<select id="task" name="task" required>
						<option value="" disabled selected>--select--</option>
                        <option value="Call">Call</option>
                        <option value="Email">Email</option>
                        <option value="Message">Message</option>
                        <option value="Product Demo">Product Demo</option>
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
                           
                            	$emp_list=mysqli_query($conn,"select name,email from employee") or die(mysqli_error($conn));
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
				<td  align="left"> <input type="submit"  id="submit" class=" btn btn-success "  style="width:100px;" name="submit" value="Save" ></td>
				<td> <?php $path="task.php?cid=".$_REQUEST['cid'] ; ?>
				<input type='button' class='btn btn-success' value='Back' style="width:100px;" onclick="window.location='<?php echo($path); ?>'" />
			
			</td>
			</tr>
       
		</table>
	</div>
	<!-- client Profile-->
	<div class="col-md-3" >
		<?php include("Client_profile.php"); ?>
	</div>
	</div>
	

	</form>
</body>
</html>

