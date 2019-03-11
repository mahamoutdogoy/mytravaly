
<?php
	 session_start();
	include("../dbConnect.php");
?>
	

	
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 	
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 
 <script type="text/javascript">
      function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
 </script>
 <script type="text/javascript">
     
   
      function myfunction1() {
          
          var x = document.getElementById("priority1").value;
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
                document.getElementById("duedate1").value = datestring;
          }
          //getDate();
      }
           
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
	<div class="container-fluid">
	<!-- Header Section -->
   <?php  include("header.php")?>
   
   <br><br>
   <!--Sidebar and form section -->
   <div class="row">
        <!--Sidebar section -->
        <div class="col-md-2"  >
            <?php include("sidebar.php"); ?>
        </div>


	<!-- task details div-->
	<div class="col-md-5">
			<div>
			
			<?php $path="window.location='task.php?cid=".$_REQUEST['cid']."'"; ?>
				<i class="fas fa-chevron-circle-left  fa-2x" style="color: #5bc0de" onclick=<?php echo $path; ?> ></i>
		</div>
			<?php

				$task_list=mysqli_query($conn,"select Task,DueDate,AssignTo,Priority,Status,Description,Remarks from
				task_details where TaskId='".$_REQUEST['tid']."' and Status NOT LIKE '%Completed%'")or die(mysqli_error($conn));
			?>
				<form action="" method="post">
				<table cellpadding='5px' cellspacing="5px" align="center">
				<?php 
	 			while($row2=mysqli_fetch_assoc($task_list))
				{ ?>
				<tr>
				<td style='width:45%'>Task</td>
				<td style='width:55%'>
					<select name='task'   class='task' required="">
			
					<?php if($row2['Task']=='Call'){ ?>

						<option value='Call' selected='selected'>Call</option>
                    	<option value='Email' >Email</option>
                   		<option value='Message'>Message</option>
                     	<option value='Post Card'>Post Card</option>
					<?php }
					else if($row2['Task']=='Email'){ ?>
				
						<option value='Call' >Call</option>
                    	<option selected='selected' value='Email'>Email</option>
                    	<option value='Message'>Message</option>
                    	<option value='Post Card'>Post Card</option>
					<?php }
					else if($row2['Task']=='Message'){ ?>
				
						<option value='Call' >Call</option>
                	    <option  value='Email'>Email</option>
                    	<option value='Message' selected='selected'>Message</option>
                    	<option value='Post Card'>Post Card</option>
					<?php }
					else if($row2['Task']=='Post Card'){ ?>
					
						<option value='Call' >Call</option>
                	    <option  value='Email'>Email</option>
                    	<option value='Message' >Message</option>
                    	<option value='Post Card' selected='selected'>Post Card</option>
					<?php }	
					else {?>
						<option value='' disabled selected>--Select--</option>
						<option value='Call' >Call</option>
                    	<option  value='Email'>Email</option>
                    	<option value='Message'>Message</option>
						<option value='Post Card'>Post Card</option>
					<?php	} ?>
                   
            		</select>
            	</td>

					
					</tr>
					
				<tr>
					<td>Assign To</td>
					<td> <select name='assignto' class='myDropDown'>
                			<option value='' disabled selected>---select---</option>

                <?php //adding employee name to assign to drop down from database
                		$emp_list=mysqli_query($conn,"select name,email from users where hotelid='".$_SESSION['user']['hotelid']."';") or die(mysqli_error($conn));
                		
                		while ($row3=mysqli_fetch_assoc($emp_list)) {
					
							if($row2['AssignTo']==$row3['name'])
								echo "<option value='".$row3['name']."' selected='selected'>".$row3['name']."</option>";
							else	
								echo "<option value='".$row3['name']."'>".$row3['name']."</option>";
					
                		}?>		</select>	</td>
				</tr>
				<tr>
					<td>Priority</td>
					<td> <select name='priority' id="priority1"  class='priority1' onchange="myfunction1()">
			
			<?php 
				if($row2['Priority']=='Hot'){ ?>
				
					<option value='Hot' selected='selected'>Hot</option>
                    <option value='Warm'>Warm</option>
                   	<option value='Cold'>Cold</option>
				<?php } 
				else if($row2['Priority']=='Warm')
				{ ?> 
					<option value='Hot'>Hot</option>
                    <option value='Warm' selected='selected'>Warm</option>
                    <option value='Cold'>Cold</option>
				<?php }
				else if($row2['Priority']=='Cold')
				{ ?>
					<option value='Hot'>Hot</option>
                	<option value='Warm'>Warm</option>
                	<option value='Cold' selected='selected'>Cold</option>
				<?php }
				else {?>
					<option value='' disabled selected>--Select--</option>
					<option value='Hot' >Hot</option>
                    <option value='Warm'>Warm</option>
            	    <option value='Cold'>Cold</option> <?php } ?>
                   
	            	</select></td>
				</tr>
				<tr>
						<td>Due Date</td>
						<td><input type='text' name='duedate' id="duedate1" readonly value=<?php echo $row2['DueDate']; ?>   />   </td>
					</tr>
				<tr>
					<td>Status</td>
					<td>
						<select name='status' class='status' >
						<?php if($row2['Status']=="Not Yet Started")
								{ ?>
					
						
	            	    <option value='Not Yet Started' selected='selected' >Not Yet Started</option>
	            	    <option value='Ongoing'>Ongoing</option>
	                    <option value='Completed'>Completed</option>
						
					<?php	} else if($row2['Status']=="Ongoing")
							{ ?> 
					
						<option value='Not Yet Started' >Not Yet Started</option>
	                	<option value='Ongoing' selected='selected'>Ongoing</option>
	                    <option value='Completed' >Completed</option>
									
					<?php } else if($row2['Status']=="Completed")
						{ ?>
								
						<option value='Not Yet Started' >Not Yet Started</option>
	            	    <option value='Ongoing' >Ongoing</option>
	                    <option value='Completed' Selected='Selected'>Completed</option>
					
					<?php	} else 	{ ?>
					
						<option value='' disabled selected>--select--</option>
	                	<option value='Not Yet Started'>Not Yet Started</option>
	                	<option value='Ongoing' >Ongoing</option>
	                    <option value='Completed'>Completed</option>
						<?php } ?>
					</select>
					</td>
					</tr>

					<tr>
						<td>Action Description</td>
						<td>
							<?php if($row2['Description']=="") { ?>
								<textarea name='description' style='width: 200px;height: 80'></textarea></td>
							<?php } 
							else{ ?>
							<textarea name='description' style='width: 200px;height: 80'><?php echo $row2['Description']; ?>     </textarea>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<td>Remarks</td>
						<td><input type='text' name='remarks' value='<?php echo $row2['Remarks']; ?>'></td>
					</tr>
					<tr><td colspan='2' align='center'>
					<br>
						<hr>						
						<?php $path="\"javascript: form.action='edit_task_code.php?cid=".$_REQUEST['cid']."&tid=".$_REQUEST['tid']."'\""?>		
						<input type='submit' name='taskUpdate' class='btn btn-warning' draggable='true' value='Update' onclick=<?php echo $path; ?> />
						
					<hr/>
					</td>
				</tr>
					
					<?php } 
					?>
			</table>
			</form>
	</div>

	<!--end of task details-->

	<!-- Client Details Div -->
	<div class="col-md-3 item-align-right">
		
		<?php include("Client_profile.php"); ?>
	</div>
	<!-- end of client details-->
	</div>
</div>

</body>
</html>
