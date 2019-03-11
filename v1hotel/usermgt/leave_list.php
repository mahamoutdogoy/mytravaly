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


</head>
<body>
	<!--Header part-->
		<?php
		include"sidebar.php";
	 ?>
	
	<div class="col-md-9 col-lg-10">
		<?php
		include"user_header2.php";
	?>
		<a href="apply_for_leave.php" class="btn btn-warning" style="margin: 20px;"><i class="fas fa-plus"></i> Apply for a leave</a>
		<div class="card col-md-12">
				<div class="card-header"><h3><i class="fas fa-user-alt"> </i> Leave List</h3></div>	
				<div class="card-body">
					<table class="table table-striped table-bordered table-sm col-md-12">
						<thead>
							<tr>
								<th>User name</th>
								<th>Leave date</th>
								<th>Leave category</th>
								<th>Leave reason</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sel_sql ="SELECT * FROM leave_application WHERE appuserid=".$_SESSION['user']['userid']." ORDER BY appid DESC";
								$run = mysqli_query($con, $sel_sql);
								$status_txt =" ";
								$status_cls = " ";
								while ($rows = mysqli_fetch_assoc($run)) {
									$sel_cat = "SELECT * FROM leave_category WHERE catid = $rows[appcatid]";
									$run_cat = mysqli_query($con, $sel_cat);
									$cat_name =" ";
									while($rows_cat = mysqli_fetch_assoc($run_cat)){
										$cat_name = $rows_cat['catname'];
									}
									if ($rows['appstatus'] == 0) {
										$status_txt ="Pending...";
										$status_cls = "btn-warning";
									}elseif ($rows['appstatus'] == 1) {
										$status_txt ="Granted!";
										$status_cls = "btn-success";
									}else{
										$status_txt ="Rejected!";
										$status_cls = "btn-danger";
									}
									echo "<tr>
										<td>abib</td>
										<td>$rows[appdate]</td>
										<td>$cat_name</td>
										<td>$rows[appdesc]</td>
										<td> <span class='$status_cls'>$status_txt</span></tr>";
								}

							?>
						</tbody>
					</table>
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