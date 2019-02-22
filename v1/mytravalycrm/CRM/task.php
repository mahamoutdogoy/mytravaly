<?php
 include"red.php";
	session_start();

	if(isset($_SESSION['cid']))
	{
		unset($_SESSION['cid']);
	}
	
	$_SESSION['cid']=$_REQUEST['cid'];
?>
<!DOCTYPE html>
<html>


<head>
	<title>Tasks</title>
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


	

<div class="container-fluid">
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
	
		<div class="col-md-6" >
			
		<?php 
			$task_list=mysqli_query($conn,"select TaskId,Task,DueDate,AssignTo,Priority,Status from task_details where ClientId='".$_REQUEST['cid']."' and Status NOT LIKE '%Completed%' and Status NOT LIKE '%Closed%' order by DueDate")or die(mysqli_error($conn)); ?>
		<div>
				
				<i class="fas fa-chevron-circle-left  fa-2x" style="color: #5bc0de" onclick="window.location='index.php'" ></i>
				
			</div>
		<!--top click here to section-->
			<div class='alert alert-info alert-dismissible'>
	  			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	 		 	<strong><a href="completed_task.php?cid=<?php echo $_REQUEST['cid'] ; ?>" >Click Here</a> To View Completed Task</strong>
			</div>
		<form action="" method="post">
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
					<td><?php echo $row2['Status']; ?></td>
				</tr>
				<tr>	
					<td colspan='2' align='right'>
					<br>
					<?php $path="product_demo.php?cid=".$_REQUEST['cid']; ?>
					
						<img src='img/Post Card (1).png' onclick="window.location='<?php echo $path;?>'" height='40px' width='40px' title='Product Demo'/>
					
					<?php $path="edit_task.php?cid=".$_REQUEST['cid']."&tid=".$row2['TaskId']; ?>
						
						<input type='button' class='btn btn-warning' onclick="window.location='<?php echo $path;?>'" value='Edit' text='".$row2['TaskId']." title='Edit Task''/>
						
			
						<input type='button' class='btn btn-danger id' text='<?php echo $row2['TaskId']; ?>' value='Close Task' onclick='d_task();' title='Close Task'/>
						</td>
					</tr>
			<?php } ?>

				</table>
				</form>
						
		</div>

		<div class="col-md-4">
			<?php include("Client_profile.php"); ?>
		</div>
	</div>
</div>
	

</body>
</html>
<script>
	$(document).ready(function(){
    $('.id').click(function(){
        var tid=$(this).attr("text");
		var r=confirm("Are You Sure! \n You Will Not Be Able TO Recover This Task!");
		
	if (r == true) {
	  $.post('jquery_called_function.php', { tid:tid}, function(data){
						
						alert('Task Closed Successfully...');
						location.reload();
	                    //do after submission operation in DOM
	                });
	}
	 
		
	});
});
	</script>
	