
<?php
	session_start();

	$_SESSION['tid']=$_REQUEST['tid'];
	$_SESSION['cid']=$_REQUEST['cid'];

	
	include("../dbConnect.php");



	if(isset($_POST['update']))
	{
		//updating  task Details
		$task=mysqli_real_escape_string($conn, strip_tags($_POST['task']));
		$priority=mysqli_real_escape_string($conn, strip_tags($_POST['priority']));
		$assignto=mysqli_real_escape_string($conn, strip_tags($_POST['assignto']));
		$status=mysqli_real_escape_string($conn, strip_tags($_POST['status']));
		$description=mysqli_real_escape_string($conn, strip_tags($_POST['description']));
		$remarks=mysqli_real_escape_string($conn, strip_tags($_POST['remarks']));
		$duedate=mysqli_real_escape_string($conn, strip_tags($_POST['duedate']));
		
		mysqli_query($conn,"update task_details set Task='$task',Priority='$priority',AssignTo='$assignto',
			Status='$status',Description='$description',Remarks='$remarks',DueDate='$duedate'
			where TaskId='$_SESSION[tid]'") or die(mysqli_error($conn));

		$query="SELECT email FROM `employee` WHERE name='".$assignto."'";
		$list=mysqli_query($conn,$query)  or die(mysqli_error($conn));
		$email=mysqli_fetch_assoc($list) or die(mysqli_error($conn));

		mail($email['email'],"new notification ","hi there \nYou have new task to do... Thank You " );
	
		$url="location:task.php?cid=".$_SESSION['cid']."&tid=".$_SESSION['tid'];
		
		header($url);
	
	}


?>
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 	
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 
 <script type="text/javascript">
    /*  function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
 </script>
 <script type="text/javascript">
     
    /*  var images = [], x = -1;
          images[0] = "img/bk.png";
          images[1] = "img/bk1.png";
          images[2]="img/bk2.png";
          
      
          function displayNextImage() {
              x = (x === images.length - 1) ? 0 : x + 1;
              document.getElementById("img").src = images[x];
          }

          
          function startTimer() {
              setInterval(displayNextImage, 1000);
          }

          */
      //function for date calculation
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
<body onload="startTimer()">
	<form action='' method='post'>
	<!-- Header Section -->
   <?php  include("header.php")?>
   
   <br><br>
   <!--Sidebar and form section -->
   <div class="row">
        <!--Sidebar section -->
        <div class="col-md-3"  >
            <?php include("sidebar.php"); ?>
        </div>


	<!-- task details div-->
	<div class="col-md-5">
		<!--<div class="row">
			<!--<div>
				<?php// $path="window.location='task.php?cid=".$_REQUEST['cid']."'"; ?>
				<img src="img/bk2.png" style="height: 50px;width: 50px;" onmouseover="this.src='img/bk1.png'" onmouseout="this.src='img/bk2.png'" onclick="<?php// echo $path;?>" />
				
			</div>
		</div>-->
			
			<?php

				$task_list=mysqli_query($conn,"select Task,DueDate,AssignTo,Priority,Status,Description,Remarks from
				task_details where TaskId='".$_REQUEST['tid']."' and Status!='COMPLETED'")or die(mysqli_error($conn));
			?>
	
				<table cellpadding='5px' cellspacing="5px" align="center">
				<?php 
	 			while($row2=mysqli_fetch_assoc($task_list))
				{ ?>
				<tr>
				<td style='width:45%'>Task</td>
				<td style='width:55%'>
					<select name='task'   class='task'>
			
					<?php if($row2['Task']=='Call'){ ?>

						<option value='Call' selected='selected'>Call</option>
                    	<option value='Email' >Email</option>
                   		<option value='Message'>Message</option>
                     	<option value='Product Demo'>Product Demo</option>
					<?php }
					else if($row2['Task']=='Email'){ ?>
				
						<option value='Call' >Call</option>
                    	<option selected='selected' value='Email'>Email</option>
                    	<option value='Message'>Message</option>
                    	<option value='Product Demo'>Product Demo</option>
					<?php }
					else if($row2['Task']=='Message'){ ?>
				
						<option value='Call' >Call</option>
                	    <option  value='Email'>Email</option>
                    	<option value='Message' selected='selected'>Message</option>
                    	<option value='Product Demo'>Product Demo</option>
					<?php }
					else if($row2['Task']=='Product Demo'){ ?>
					
						<option value='Call' >Call</option>
                	    <option  value='Email'>Email</option>
                    	<option value='Message' >Message</option>
                    	<option value='Product Demo' selected='selected'>Product Demo</option>
					<?php }	
					else {?>
						<option value='' disabled selected>--Select--</option>
						<option value='Call' >Call</option>
                    	<option  value='Email'>Email</option>
                    	<option value='Message'>Message</option>
						<option value='Product Demo'>Product Demo</option>
					<?php	} ?>
                   
            		</select>
            	</td>

					
					</tr>
					<tr>
						<td>Due Date</td>
						<td><input type='text' name='duedate' id="duedate" readonly value=<?php echo $row2['DueDate']; ?>   />   </td>
					</tr>
				<tr>
					<td>Assign To</td>
					<td> <select name='assignto' class='myDropDown'>
                			<option value='' disabled selected>---select---</option>
                <?php 
                		$emp_list=mysqli_query($conn,"select name,email from employee") or die(mysqli_error($conn));
                		
                		while ($row3=mysqli_fetch_assoc($emp_list)) {
					
							if($row2['AssignTo']==$row3['name'])
								echo "<option value='".$row3['name']."' selected='selected'>".$row3['name']."</option>";
							else	
								echo "<option value='".$row3['name']."'>".$row3['name']."</option>";
					
                		}?>			</td>
				</tr>
				<tr>
					<td>Priority</td>
					<td> <select name='priority' id="priority"  class='priority' onchange="myfunction()">
			
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
				<td>Status</td>
				<td>
					<select name='status' class='status' >
					<?php if($row2['Status']=="NOT YET STARTED")
							{ ?>
				
					
            	    <option value='NOT YET STARTED' selected='selected' >Not Yet Started</option>
            	    <option value='ONGOING'>Ongoing</option>
                    <option value='COMPLETED'>Completed</option>
					
				<?php	} else if($row2['Status']=="ONGOING")
						{ ?> 
				
					<option value='NOT YET STARTED' >Not Yet Started</option>
                	<option value='ONGOING' selected='selected'>Ongoing</option>
                    <option value='COMPLETED' >Completed</option>
								
				<?php } else if($row2['Status']=="COMPLETED")
					{ ?>
							
					<option value='NOT YET STARTED' >Not Yet Started</option>
            	    <option value='ONGOING' >Ongoing</option>
                    <option value='COMPLETED' Selected='Selected'>Completed</option>
				
				<?php	} else 	{ ?>
				
					<option value='' disabled selected>--select--</option>
                	<option value='NOT YET STARTED'>Not Yet Started</option>
                	<option value='ONGOING' >Ongoing</option>
                    <option value='COMPLETED'>Completed</option>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Action Description</td>
				<td><textarea name='description' style='width: 200px;height: 80'><?php echo $row2['Description']; ?>     </textarea></td>
			</tr>
			<tr>
				<td>Remarks</td>
				<td><input type='text' name='remarks' value='<?php echo $row2['Remarks']; ?>'></td>
			</tr>
			<tr><td colspan='2' align='center'>
			<br>
				<hr>								
				<input type='submit' name='update' class='btn btn-warning' value='Update' />

			<?php echo "<a href='task.php?cid=".$_REQUEST['cid']."&tid=".$_REQUEST['tid']."'>
				<input type='button' ' class='btn btn-success' value='Go Back'/>
			</a>
			
			<hr/></td></tr>";
			
			} 
			?>
	</table>
	</div>

	<!--end of task details-->
	<!-- Client Details Div -->
	<div class="col-md-3" >
		<?php include("Client_profile.php"); ?>
	</div>
	<!-- end of client details-->
	

</div>
</form>
</body>
</html>