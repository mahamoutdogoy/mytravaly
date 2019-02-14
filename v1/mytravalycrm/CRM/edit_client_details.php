<?php
	session_start();
	$_SESSION['cid']=$_REQUEST['cid'];

	include("../dbConnect.php");
?>
<html>
<head>
	<title>Edit Client Profile</title>
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
		
		select,input[type=text],input[type=date],input[type=number] {
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
	<form action='edit_client_details_code.php' method='post'>
		<?php
	include("../dbConnect.php"); ?>
	<!-- Header Section -->
   <?php  include("header.php")?>
   
   <br><br>
   <!--Sidebar and form section -->
   <div class="row">
        <!--Sidebar section -->
        <div class="col-md-3"  >
            <?php include("sidebar.php"); ?>
        </div>

        <div class="col-md-6">
		<table cellpadding="20">
	
			<?php
			
			$list=mysqli_query($conn,"select FirstName,LastName,Email,Phone,DOB,CompanyName from client_details where ClientId='".$_REQUEST['cid']."';")or die(mysqli_error($conn));
			$row=mysqli_fetch_assoc($list);
			?>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="fname" value=<?php echo $row['FirstName']?>></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="lname" value=<?php echo $row['LastName']?>></td>
			</tr>
			<tr>
				<td>Phone No</td>
				<td><input type="number" name="pno" value=<?php echo $row['Phone']?>></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value=<?php echo $row['Email']?>></td>
			</tr>
			<tr>
				<td>Date of Birth </td>
				<td><input type="date" name="dob" value=<?php echo $row['DOB']?>></td>
			</tr>
			<tr>
				<td>Company Name</td>
				<td><input type="text" name="cname" value=<?php echo $row['CompanyName'] ?>></td>
			</tr>

			<tr>
				<td align="right"><input type="submit" style="width: 100px" class="btn btn-warning" name="update" value="Update"></td>
				<?php $path="task.php?cid=".$_REQUEST['cid']; ?> 
				<td ><input type="button" name="" style="width: 100px" class="btn btn-success " onclick="window.location='<?php echo($path); ?>'" value='Back'></td>
			</tr>
		</table>
	</div>
</div>
</form>
</body>
</html>
