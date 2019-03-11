
<?php include('Connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="my-travaly-admin-login.css">
		<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
	  <link href="pidie-0.0.8.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="Mt.css">

	<title>Admin Signup</title>
<style>
.container{
	margin-top:350px;
}
</style>

</head>
<body style="background-color: #ff6f56; height: 80vh">
	<div class="container" style="display: flex; flex-direction: column; justify-content: center; height: 0%;">
		<div style="background-color: white; padding: 3%; border-radius: 15px;">
			<h4 class="text-center text-uppercase">Sign_Up</h4>
			<form method="post" action="MtSignup.php">

				<label for="employee">
					Employee Name
				</label>
				<input type="text" name="Name" class="form-control" required>
				<br>
				<label for="userId">
					Official Email
				</label>
				<input type="email" name="Email" class="form-control" required>
				<br>


<label for="Mobile">
	Mobile
</label>
<input type= "text" id="Mobile" name="Mobile" pattern= "/^+91(7\d|8\d|9\d)\d{9}$/

" class="form-control" required >

			<br>

				<label for="Password">
					New Password
				</label>
				<input type="password" name="Password" class="form-control" required>
				<br>

				<label for="passwordConfirmation">
					Confirm Password
				</label>
				<input type="password" name="C_Password" class="form-control" required>
				<br>
        <label>
        	<input type="checkbox" checked="checked" name="remember" style="margin-bottom:20px" /> Remember Me
        </label>

				<input type="submit" name="Sign_up" value="Sign-up" class="form-control text-uppercase text-white font-weight-bold" style="background-color: #20b288;">
				<br>
				New Employee? Proceed to <a href="NewJoiningForm.php">filled the Form</a> after signing up
<br />
			If you are	Already employee Proceed to <a href="MtLogin.php">Sign In</a>
			</form>
		</div>
	</div>
<body>
</html>
