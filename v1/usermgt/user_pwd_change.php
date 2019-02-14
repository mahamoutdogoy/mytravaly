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
					<form action="">
						<div class="form-inline">
							<label for="">Current Password &nbsp; &nbsp;&nbsp;</label>
							<input type="password" class="form-control" style="margin: 0 0 20px 20px;" required placeholder="Current">
						</div>
						<div class="form-inline">
							<label for="">New Password &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</label>
							<input type="password" class="form-control" style="margin: 0 0 20px 20px;" required placeholder="New">
						</div>
						<div class="form-inline">
							<label for="">Confirme Password</label>
							<input type="password" class="form-control" style="margin: 0 0 20px 20px;" required placeholder="Confirme">
						</div>
						<input type="submit" name="createHol" value="Change" class="btn btn-success" style="margin: 20px 0 0 150px;">
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