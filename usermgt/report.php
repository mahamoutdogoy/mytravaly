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
<body>
	<!--Header part-->
	<?php
		include"user_header1.php";
	?>
	<div class="row">
		<?php
		include"sidebar.php";
	 ?>
	
	<div class="container">
		<div class="card col-md-12">
				<div class="card-header"><h3><i class="fas fa-user-alt"> </i> Attendance list from to</h3></div>	
				<div class="card-body">
					<table class="table table-sm col-md-12">
						<thead>
							<tr>
								<th>Date</th>
								<th>Time in</th>
								<th>Time out</th>
								<th>Working hour</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>01-0-2019</td>
								<td>01-0-2019 05:40:00</td>
								<td>01-0-2019 05:40:12</td>
								<td>00:00:12</td>
								<td>Present</td>
							</tr>
							<tr>
								<td>01-0-2019</td>
								<td>01-0-2019 05:40:00</td>
								<td>01-0-2019 05:40:12</td>
								<td>00:00:12</td>
								<td>Present</td>
							</tr>
							<tr>
								<td></td>
								<td>01-0-2019 05:40:00</td>
								<td>01-0-2019 05:40:12</td>
								<td>00:00:12</td>
								<td>Present</td>
							</tr>
							<tr>
								<td></td>
								<td>01-0-2019 05:40:00</td>
								<td>01-0-2019 05:40:12</td>
								<td>00:00:12</td>
								<td>Present</td>
							</tr>
							<tr>
								<td>01-05-2019</td>
								<td>01-0-2019 05:40:00</td>
								<td>01-0-2019 05:40:12</td>
								<td>00:00:12</td>
								<td></td>
							</tr>
							<tr>
								<td>01-0-2019</td>
								<td></td>
								<td></td>
								<td></td>
								<td>Absent</td>
							</tr>
							<tr>
								<td>01-0-2019</td>
								<td>01-0-2019 05:40:00</td>
								<td>01-0-2019 05:40:12</td>
								<td>00:00:12</td>
								<td>Holiday</td>
							</tr>
							<tr>
								<td>01-0-2019</td>
								<td>01-0-2019 05:40:00</td>
								<td>01-0-2019 05:40:12</td>
								<td>00:00:12</td>
								<td>Present</td>
							</tr>
							<tr>
								<td></td>
								<td>01-0-2019 05:40:00</td>
								<td>01-0-2019 05:40:12</td>
								<td>00:00:12</td>
								<td>Present</td>
							</tr>
							<tr>
								<td></td>
								<td>01-0-2019 05:40:00</td>
								<td>01-0-2019 05:40:12</td>
								<td>00:00:12</td>
								<td>Present</td>
							</tr>
							<tr>
								<td>01-05-2019</td>
								<td>01-0-2019 05:40:00</td>
								<td>01-0-2019 05:40:12</td>
								<td>00:00:12</td>
								<td></td>
							</tr>
							
						</tbody>
					</table>
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