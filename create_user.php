<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mytravaly</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="main.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


	<script>
	</script>

</head>
<body>
	<!--Header part-->
	<?php
		include"user_header1.php";
	?>
	<div class="row">
	<?php
		include"sidebar.php";
	?>

	<!--Create User form-->
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h3> <i class="fas fa-user-alt"></i>Create New User</h3>
				<hr>
			</div>
			<div class="card-body">
				<form action="POST" style="background: #F4F4ED;">
					<div class="form-group form-inline">
						<label for="" style="float: left;">Name &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  </label><div class="clearfix"></div>
						<input type="text" name="user" class="form-control mx-auto" required placeholder="name" style="width: 75%;">
					</div>
					<div class="form-group  form-inline">
						<label for="" >Email &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; </label>
						<input type="email" name="email" class="form-control mx-auto" required placeholder="email address" style="width: 75%;">
					</div>
					<div class="form-group form-inline">
						<label for="" >userName  &nbsp;&nbsp; &nbsp;&nbsp;</label>
						<input type="text" name="uname" class="form-control mx-auto" required placeholder="user name" style="width: 75%;">
					</div>
					<div class="form-group form-inline">
						<label for="" >Password &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</label>
						<input type="password" name="pwd" class="form-control mx-auto" required placeholder="password" style="width: 75%;">
					</div>
					<div class="form-group form-inline">
						<label for="" >Designation &nbsp;&nbsp;</label>
						<input type="text" name="desg" class="form-control mx-auto" required placeholder="designation" style="width: 75%;">
					</div>
					<div class="form-group form-inline">
						<label for="" >Mobile &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;;&nbsp;</label>
						<input type="number" name="num" class="form-control mx-auto" required placeholder="mobile number" style="width: 75%;">
					</div>
					<div class="form-group">
						<input type="submit" name="createUser" value="Create User" class="form-control btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>

	<!--Footer part-->
	<?php
		//include"footer.php";
	?>
</body>
</html>
