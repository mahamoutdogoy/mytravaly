<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		include"user_header2.php";
	?>
	<div class="row">
	<?php
		include"sidebar.php";
	?>
	<div class="container">
			<div class='row'>
		<?php
			$sel_sql = "SELECT * FROM holidays ORDER BY holid DESC";
			$run=mysqli_query($con, $sel_sql);
			$c = 0;
			while ($rows = mysqli_fetch_assoc($run)) {
				$c++;
				echo "
					<div class='col-md-4'>
						<div class='card ml-2 mb-2'>
							<div class='card-header'><h5><i class='far fa-calendar-alt font-weight-bold'></i> $rows[holdate] </h5></div>	
							<div class='card-body text-center font-weight-bold'>
								$rows[holtitle]
							</div>
						</div>
					</div>";
			}
		?>
		</div>
	</div>
	</div>


	<!--Footer part-->
	<?php
		//include"footer.php";
	?>
</body>
</html>