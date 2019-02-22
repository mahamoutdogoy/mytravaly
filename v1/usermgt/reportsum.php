<?php  include"red.php"; ?>
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
				<div class="card-header"><h3><i class="fas fa-user-alt"> </i> Attendance list from <?php if (isset($_POST['datefromsum'])) {
					echo $_POST['datefromsum'];
				} ?> to <?php if (isset($_POST['datetosum'])) {
					echo $_POST['datetosum'];
				}?></h3></div>	
				<div class="card-body">
					<table class="table table-sm col-md-12">
						<thead>
							<tr>
								<th>User name</th>
								<th class="float-right">Total hours</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (isset($_POST['reportsum'])) {
									$rpt_sql = "SELECT attuserid FROM attendance WHERE (attdate BETWEEN '$_POST[datefromsum]' AND '$_POST[datetosum]') AND (attuserid IN (SELECT userid from users)) GROUP BY attuserid";
									$rpt_run = mysqli_query($con, $rpt_sql);
									while ($rpt_rows = mysqli_fetch_assoc($rpt_run)) {
										$totalhour = date('00:00:00');
										$sum_sel="SELECT * FROM attendance WHERE attuserid=$rpt_rows[attuserid] AND attstatus = 'Present'";
										$sum_run = mysqli_query($con, $sum_sel);
										while ($sum_rows = mysqli_fetch_assoc($sum_run)) {
											$timein = date($sum_rows['timein']);
											$timeout = date($sum_rows['timeout']);
											$datetime1 = new DateTime($timein);
											$datetime2 = new DateTime($timeout);
											$interval = $datetime1->diff($datetime2);

											$work = $interval->format('%H:%I:%S');

											$h=date('H', strtotime($work));
											$i=date('i', strtotime($work));
											$s=date('s', strtotime($work));

											$totalhour = date('H:i:s',strtotime('+'.$h.' hours +'.$i.' minutes +'.$s.' seconds',strtotime($totalhour)));
											
										}
										$sumu_sel="SELECT username FROM users WHERE userid=$rpt_rows[attuserid]";
										$sumu_run = mysqli_query($con, $sumu_sel);
										$sumu_rows = mysqli_fetch_assoc($sumu_run);
										echo "<tr>
												<td>$sumu_rows[username]</td>
												<td class='float-right'>$totalhour</td>
											</tr>";
									}
								}								

							?>
							
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