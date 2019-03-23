<?php
  $server = "localhost";
  $user = "root";
  $pwd = "";
  $db = "mytravaly";

  $con = mysqli_connect($server,$user,$pwd,$db);
  mysqli_query($con, "SET SESSION sql_mode = ''");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forgot password</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<style>
body{
	background: #f15025;
}
#passr {
	width: 500px;
	height: 300px;
	margin: 200px auto;
	background: #fff;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
	display: none;
	  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}

#passf {
	width: 700px;
	height: 400px;
	margin: 200px auto 0;
	background: #fff;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
	  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}
input[type=submit] {
	margin-top: 10px;
	font-weight: bold;
	font-size: 1.3em;
	padding-bottom: 25px;
}
label{
	text-align: left;
	font-weight: bold;
}
h1 i {
	color: green;
}

</style>

<body>
	<div id="passf">
		<h1>Password reinitialization</h1>
		<p>Type the new password for your <b>mytravaly</b> account</p>
		<form action="" method="post">
			<label for="">New password</label>
			<input type="password" name="pfnewpass" class="form-control" placeholder="new password" required>
			<label for="">Confirm the password</label>
			<input type="password" name="pfconfpass" class="form-control" placeholder="confirm password" required>
			<input type="submit" name="pfcsubmit" class=" btn btn-info form-control" value="Change password">
		</form>
	</div>
	
	<div id="passr" class="card r">
		<h1>Password has been changed<i class="far fa-check-circle"></i></h1>
		<p>Your password has been successfully changed! Use your new password to <a href="#">login</a></p>
	</div>
	
</body>
</html>

<?php
	if (isset($_POST['pfcsubmit'])) {
		$newpass = mysqli_real_escape_string($con, strip_tags($_POST['pfnewpass']));
		$confpass = mysqli_real_escape_string($con, strip_tags($_POST['pfconfpass']));
		if ($newpass == $confpass) {
			echo "<script>
				document.getElementById('passf').style.display = 'none';
				document.getElementById('passr').style.display = 'block';
				</script>";
		}
	}
?>