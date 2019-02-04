<?php
	session_start();
	$_SESSION['cid']=$_REQUEST['cid'];
?>


<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body>
	<form action='edit_client_details_code.php' method='post'>
		<table cellpadding="20">
	

		<?php
		$con=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
		$list=mysqli_query($con,"select FirstName,LastName,Email,Phone,DOB,CompanyName from client_details where ClientId='".$_REQUEST['cid']."';")or die(mysqli_error($con));
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
			<td align="right"><input type="submit" name="update" value="Update"></td>
			<td align=""><input type="button" name="" value='Back'></td>
		</tr>
		</table>


</form>
</body>
</html>
