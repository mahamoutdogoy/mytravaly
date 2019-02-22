<html>
<head>
	<title>Completed Tasks</title>
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
    <style type="text/css">
		
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
	<?php
	include("../dbConnect.php"); ?>
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
	
		<div class="col-md-6">
			<?php
				$task_list=mysqli_query($conn,"select TaskId,Task,DueDate,AssignTo,Priority,Status from task_details where ClientId='".$_REQUEST['cid']."' and ( Status LIKE 'COMPLETED' or Status LIKE '%Closed%' )")or die(mysqli_error($conn)); ?>
			<!-- back button -->
			<div>
			
				<?php $path="window.location='task.php?cid=".$_REQUEST['cid']."'"; ?>
				<i class="fas fa-chevron-circle-left  fa-2x" style="color: #5bc0de" onclick=<?php echo $path; ?> ></i>
			</div>
			
			<!--top click here to section-->
		
		<div class='alert alert-info alert-dismissible'>
  			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
 		 	<strong><a href="task.php?cid=<?php echo $_REQUEST['cid'] ; ?>" >Click Here</a> To View Pending Task</strong>
		</div>
	
			<table style='width:500px'>
	
			<?php 
				while($row2=mysqli_fetch_assoc($task_list))
				{ ?>
				<tr>
					<td style='width:30%'>Task</td>
					<td style='width:70%'><?php echo $row2['Task']; ?></td>
				</tr>
				<tr>
					<td>Due Date</td>
					<td><?php echo $row2['DueDate'] ?></td>
				</tr>
				<tr>
					<td>Assign To</td>
					<td><?php echo $row2['AssignTo'] ?></td>
				</tr>
				<tr>
					<td>Priority</td>
					<td><?php echo $row2['Priority']; ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><?php echo $row2['Status']; ?> </td>

				</tr>
				<tr><td colspan="2"><br><hr> </td></tr>
				
			
					<?php } 
						
							//onclick="javascript:history.back(-1);"
						?>

				</table>
						
		</div>
		<!-- client profile -->
		<div class="col-md-4">
			<?php include("Client_profile.php"); ?>
		</div>
	</div>

</form>

</body>
</html>