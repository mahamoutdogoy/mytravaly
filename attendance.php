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
			<div class="card col-md-4" style="margin-left: 40px;" >
				<div class="card-header">
					<i class="far fa-list-alt"></i> Punch In/Out</div>	
				<div class="card-body">
					<button class="btn btn-success">Punch in</button>
				</div>
			</div>
			<div class="card col-md-4" style="margin-left: 40px;">
				<div class="card-header"><i class="fas fa-user-alt"> </i> Member Activity</div>	
				<div class="card-body">
					<div class="form-group">
					<label for="">Date</label><input type="date" value="<?php echo date('Y-m-d');?>" style="margin: 20px;">
					</div>
					<div class="form-group">
					<label for="">To</label>
					<input type="date" value="<?php echo date('Y-m-d');?>" style="margin: 0 0 20px 35px;">
					<a href="report.php" class="btn btn-primary">My Report</a>
					</div>
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