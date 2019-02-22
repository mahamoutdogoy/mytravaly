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

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


</head>
<style>
	


</style>
<body>
	<!--Header part-->
	<?php
		include"user_header2.php";
	?>
	<div class="row">
	<?php
		include"sidebar.php";
	?>
	<div class="container">
		<div class="row">
			<div class="card col-md-8" style="margin-left: 40px;" >
				<div class="card-header">
					<i class="far fa-list-alt"></i> Password Change</div>	
				<div class="card-body">
					<form action="" method="post">
							<table class="table">

							<tr><td><label for="">Current Password </label></td>
							<td><input type="password" id="curpassid" name="curpass" class="form-control"  required placeholder="Current"></td><td><i class="fas fa-eye-slash" style="margin-left: -40px;margin-top: 10px;" onclick="return showhide1();"></i></td></tr>
							<tr>
							<td><label for="">New Password </label></td>
							<td><input id="newpassid" type="password" name="newpass" class="form-control" required placeholder="New"></td><td><i class="fas fa-eye-slash" style="margin-left: -40px;margin-top: 10px;" onclick="return showhide2();"></i></td></tr>
							<tr><td><label for="">Confirme Password</label></td>
							<td><input id="confpassid" type="password" name="confpass" class="form-control" required placeholder="Confirme"></td><td><i class="fas fa-eye-slash" style="margin-left: -40px;margin-top: 10px;" onclick="return showhide3();"></i></td></tr>
						</table>
						<input type="submit" name="chgPass" value="Change" class="btn btn-success" style="margin: 20px 0 0 150px;">
					</form>
				</div>
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

<?php
	if (isset($_POST['chgPass'])) {
		$curpass = mysqli_real_escape_string($con, strip_tags($_POST['curpass']));
		$newpass = mysqli_real_escape_string($con, strip_tags($_POST['newpass']));
		$confpass = mysqli_real_escape_string($con, strip_tags($_POST['confpass']));
		$pw_sql = "SELECT passwd from users WHERE userid=7";
		$pw_run = mysqli_query($con, $pw_sql);
		$pw_row = mysqli_fetch_assoc($pw_run);

		if ($curpass!==$pw_row['passwd']) {
			echo "<script>alert('The entered password does not match with your current password, please check again!!!')</script>";
		}elseif ($newpass!==$confpass) {
			echo "<script>alert('Your new and confirmation passwords do not match, please try again!!!')</script>";
		}else{
			$pw_sql = "UPDATE users SET passwd='$confpass' WHERE userid=7";
			if($pw_run = mysqli_query($con, $pw_sql)){
				echo "<script>alert('Yes you success changed your password!!!')</script>";
			}else echo "<script>alert('Ooops something went wrong please try again')</script>";
		}
	}


?>

<script>
	function showhide1() {
		var pass1 = document.getElementById('curpassid').type;
		if (pass1=='password') {
			document.getElementById('curpassid').type='text';
		}else{
			document.getElementById('curpassid').type='password';
		}
	}
	function showhide2() {
		var pass1 = document.getElementById('newpassid').type;
		if (pass1=='password') {
			document.getElementById('newpassid').type='text';
		}else{
			document.getElementById('newpassid').type='password';
		}
	}
	function showhide3() {
		var pass1 = document.getElementById('confpassid').type;
		if (pass1=='password') {
			document.getElementById('confpassid').type='text';
		}else{
			document.getElementById('confpassid').type='password';
		}
	}
</script>