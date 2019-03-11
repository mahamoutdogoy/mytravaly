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
		include"user_header1.php";
	?>
	<div class="row">
		<?php
		include"sidebar.php";
	 ?>
	
	<div class="container">
		<div class="card col-md-12">
				<div class="card-header"><h3><i class="fas fa-user-alt"> </i> Leave List</h3></div>	
				<div class="card-body">
					<table class="table table-striped table-bordered table-sm col-md-12">
						<thead class="text-center">
							<tr>
								<th>User name</th>
								<th style="width: 100px;">Leave date</th>
								<th>Leave category</th>
								<th>Leave reason</th>
								<th>Status</th>
								<th style="width: 125px;">Action</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sel_sql ="SELECT * FROM leave_application ORDER BY appid DESC";
								$run = mysqli_query($con, $sel_sql);
								$status_txt = " ";
								$status_cls = " ";
								while ($rows = mysqli_fetch_assoc($run)) {
									$grant_cls =" ";
									$reject_cls =" ";
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
										$grant_cls ="disabled";
									}else{
										$status_txt ="Rejected!";
										$status_cls = "btn-danger";
										$reject_cls ="disabled";
									}
									echo "<tr>
										<td>abib</td>
										<td>$rows[appdate]</td>
										<td>$cat_name</td>
										<td>$rows[appdesc]</td>
										<td><span class='$status_cls'>$status_txt</span></td>
										<td>
											<a href='leave_list_admin.php?grantid=$rows[appid]' class='btn btn-success btn-sm $grant_cls'>Grant</a><a href='leave_list_admin.php?rejectid=$rows[appid]' class='btn btn-warning btn-sm $reject_cls'>Reject</a>
										</td>
										<td><a href='leave_list_admin.php?delid=$rows[appid]' class='btn btn-danger btn-sm' onclick = 'return del_conf();'>Delete</a></td>
									</tr>";
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

<!--Deleting a record from Leave Application table -->
<?php
	if(isset($_GET['delid'])){
		$del_sql = "DELETE FROM leave_application WHERE appid = '$_GET[delid]'";
		if (mysqli_query($con, $del_sql)){?>
			<script>window.location = "leave_list_admin.php";</script>
			<?php
		}
	}
?>

<!--Granting leave to a user -->
<?php
	if(isset($_GET['grantid'])){
		$grant_sql = "UPDATE leave_application SET appstatus = 1 WHERE appid = '$_GET[grantid]'";
		if (mysqli_query($con, $grant_sql)){?>
			<script>window.location = "leave_list_admin.php";</script>
			<?php
		}
	}
?>

<!--Rejecting leave of a user -->
<?php
	if(isset($_GET['rejectid'])){
		$grant_sql = "UPDATE leave_application SET appstatus = 2 WHERE appid = '$_GET[rejectid]'";
		if (mysqli_query($con, $grant_sql)){?>
			<script>window.location = "leave_list_admin.php";</script>
			<?php
		}
	}
?>