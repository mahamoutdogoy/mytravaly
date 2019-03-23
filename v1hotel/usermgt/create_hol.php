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

	<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />


</head>

<body>
	<!--Header part-->
	<?php
		include"user_header1.php";
	?>
	<div class="row">
	<?php
		include"../mytravalyAdmin/mtsidebar.php";
	?>
	<div class="container">
		<div class="row">
			<div class="card col-md-12">
				<div class="card-header"><h3><i class="far fa-edit"></i> Add New Holiday</h3></div>	
				<div class="card-body">
					<form action="" method="post">
						<div class="col-md-6 float-left">
						<div class="form-inline">
							<label for="">Select a date</label>
							<input type="text" name="hol_date" placeholder="hol_date" required readonly class="dpicker" width= "250" style="margin: 0 0 0 20px; background: white;">
						</div>
						<div class="form-inline mt-4" >
							<label for="">Holiday Title</label>
							<input type="text" name="hol_title" placeholder="Holiday Title" required style="margin: 0 0 0 22px; width: 230px;">
						</div>
							<input type="submit" name="createHol" value="Create" class="btn btn-success" style="margin: 20px 0 0 150px;">
						</div>
						<div class="col-md-4 float-right"></div>
						<a href="all_hol.php" class="btn btn-info">Show all Holidays</a>
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

<script>
    $('.dpicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>

<?php
	if(isset($_POST['createHol'])){
		$hol_date = mysqli_real_escape_string($con, strip_tags($_POST['hol_date']));
		$hol_title = mysqli_real_escape_string($con, strip_tags($_POST['hol_title']));
		//$new_date = date_format($hol_date,"Y/m/d");
		$time = strtotime("$hol_date");
		$newformat = date('Y-m-d',$time);
		//echo "$new_date";
		$ins_sql = "INSERT INTO holidays (holdate, holtitle) VALUES ('$newformat', '$hol_title')";
		if (mysqli_query($con, $ins_sql)){
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}
?>