<?php
	session_start();

	if(isset($_SESSION['cid']))
	{
		unset($_SESSION['cid']);
	}
	
	$_SESSION['cid']=$_REQUEST['cid'];
?>
<html lang="en">
<head>
  <title> New Task </title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  
  <link rel="stylesheet" type="text/css" href="main.css">
  
  <script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
  </script>

  <style type="text/css">
		/*input[type=button],input[type=submit]{
			background-color:#f15025;
			color:#fff;
			font-weight:bold
		}*/
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
		textarea{
			border-radius: 5px;
			height: 30px;
			border: solid 1px;
		}

	</style>
  

</head>
<body >
  <!--<div class="text-center" style="width:85%"></div> -->
  <!-- Header Section -->
   <div class="container-fluid">
   <?php  include("header.php")?>
   	
   <br><br>
   <!--Sidebar and form section -->
   <div class="row">
        <!--Sidebar section -->
        <div class="col-md-3"  >
            <?php include("sidebar.php"); ?>
        </div>
        <!--form section-->
        <div class="col-md-5">
	         <div>
	        
	        	<i class="fas fa-chevron-circle-left  fa-2x" style="color: #5bc0de" onclick="window.location='index.php'" ></i>
	        
	      	</div>
		<!--adding task -->
			
           	<div class="container p-5">
		   		<form action="" method="post">
		   			<?php include("../dbConnect.php"); ?>
		       	<div  class="form-group">
					<label class="" for="task" >Task </label>
					<select id="task" name="task" class=" float-right" required >
						<option value="" disabled selected>--select--</option>
		                <option value="Call">Call</option>
		                <option value="Email">Email</option>
		                <option value="Message">Message</option>
		                <option value="Post Card">Post Card</option>
		            </select>
				</div>

				<div  class="form-group">
					<label class=" " for="priority" >Priority </label>
						<select class=" float-right"  id="priority"  required name="priority"  onchange="myfunction()">
			                <option value="" disabled selected>--select--</option>
			                <option value="Hot" >Hot</option>
			                <option value="Warm">Warm</option>
				            <option value="Cold">Cold</option>
				        </select>
				</div>
				<div  class="form-group">
					<label class="" for="Duedate">Due date  </label>
					<input type="text" class=" float-right" name="duedate" id="duedate" placeholder="Duedate"  readonly="" />
				</div>
				<div  class="form-group" >
					<label class="" for="assignto">Assign to </label>
						<select id="task" class=" float-right" name="assignto" required>
			                <option value='' disabled selected>---select---</option>
				            <?php
				                           
						      	$emp_list=mysqli_query($conn,"select name,email from employee") or die(mysqli_error($conn));
				                while ($row3=mysqli_fetch_assoc($emp_list)) {
				                	 echo "<option value='".$row3['name']."'>".$row3['name']."</option>";
				                }
				            ?>
				                           
				        </select>
				</div>
				<div  class="form-group">
					<label class="" for="status">Status </label>
					<input type="text" list="status" class=" float-right" name="status" value="Not Yet Started"  readonly />
				</div>
				<div  class="form-group">
					<label class="" for="description" >Description </label>
					<input type="text" class=" float-right" name="description" id="Description" />
				</div>
				<div  class="form-group">
					<label class="" for="remarks" >Remarks</label>
					<input type="text" class=" float-right" name="remarks" id="remarks"  />
				</div>
							<!--<div  class="form-group" align="center">
								 <input type="submit"  id="submit" class=" btn btn-success "  style="width:100px;" name="submit" value="Save" >
							</div>-->
		       
				
		  					 <!-- Modal footer -->
				<div class="modal-footer">
					<input type="submit" name="addtask" value="Add" class="btn btn-success" style="width: 100px" onclick="javascript: form.action='add_new_task_code.php'" />
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
				</form>
		  	</div>
		</div>
		<div class="col-md-4">        
	 
	<table cellpadding=10>
		<tr>
		<?php 
			$list=mysqli_query($conn,"select FirstName,LastName,Email,Phone from client_details	where ClientId='".$_REQUEST['cid']."';")or die(mysqli_error($conn));
			$row=mysqli_fetch_assoc($list); ?>
			<td>	<input type='button' class='btn btn-warning btn-sm' value='Edit Profile' data-toggle="modal" data-target="#EditModal" />	</td>
		</tr>
		<tr>
			<td>	<img src='img/profile.png' height='70px' width='70px' radius=50>	</td>
			<td> <b style='font-size:25'><?php echo $row['FirstName'].' '.$row['LastName']; ?> </b> </td>
		</tr>
		<tr>
			<td>Phone No</td><br>
			<td><b><?php echo $row['Phone']; ?></b></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><label id="eid"> <span style='color:blue' id="email"><?php echo $row['Email']; ?> </span> </label></td>
		</tr>
		
	</table>	
	</div>
	</div>
	</div>
	</body>
	</html>
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