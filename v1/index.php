	<?php
session_start();

include"connect.php";
if(isset($_POST['Login'])){
	$empid=mysqli_real_escape_string($con,$_POST['empid']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	if(empty($email)&&empty($password)){
	$error= 'Fields are Mandatory';
	}else{
   $result=mysqli_query($con,"SELECT * FROM mt WHERE empid='$empid' AND password='$password'");
   $row=mysqli_fetch_assoc($result);
   $count=mysqli_num_rows($result);
   if($count==1){
	
	$_SESSION['user']=array(
	 'empid'=>$row['empid'],	
	 'username'=>$row['username'],
	 
	 'email'=>$row['email'],
	 
	 'password'=>$row['password'],

	
	 );
	header('location:mytravalyAdmin/mt.php');
	 
   }
   /*}else{
   $error='Your PassWord or Email is not Found';
   }*/
  }
  }
  ?>





<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <link rel="icon" type="image/png" sizes="192x192"  href="fav.png"> -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Mt.css">
	<title>Admin Login</title>

	<style type="text/css">
		.h
		{
			text-align: center;
			
			color: white;
			font-size: 60px;
		}

	</style>
</head>
<body style="background-color: #ff6f56; height: 100vh">

    
	<div class="container" style="display: flex; flex-direction: column; justify-content: center; height: 100%;">
		<center><h1 class="h">MT ENJOYER</h1></center>
		<div style="background-color: white; padding: 3%; border-radius: 15px;">
			<h1 class="text-center text-uppercase">Login</h1>
			<form action="" method="post">
			<!--	<label for="department">
					Department
				</label>
				<select id="department" name="department" required class="form-control custom-select">
					<option value="" style="display: none;">Choose Department</option>
					<option value="bod">Board of Directors</option>
					<option value="marketing">Marketing and Sales</option>
					<option value="customerService">Customer Service</option>
					<option value="technology">Technology</option>
					<option value="finance">Finance</option>
					<option value="hr">Human Resource</option>
					<option value="operation">Operations</option>
					<option value="investorRelation">Investor Relations</option>
				</select>
				<br>
				<br>-->
				<label for="employeeId">
					User Name
				</label>
				<input type="text" name="empid" class="form-control" required>
				<br>
				
				<label for="password">
					Password
				</label>
				<input type="password" name="password" class="form-control" required>
				<br>
				<input type="submit" name="Login" value="Login" class="form-control text-uppercase text-white font-weight-bold" style="background-color: #20b288;">
				<br>
				<a href="forgotPassword.php">Forgot password?</a><br>

				New joinee? Proceed to <a href="MtSignup.php">Signup page</a>
			</form>
		</div>
	</div>
</body>


</html>
