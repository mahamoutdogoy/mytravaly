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


	<script>
	</script>

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

	<!--Create User form-->
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h3 "> <i class="far fa-edit"></i> Create Category</h3>
				<hr>
			</div>
			<div class="card-body">
				<form method="POST" style="margin-left: 20%" class="col-md-8">
					<div class="form-group form-inline">
						<label for="" style="float: left;">Category Name &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  </label><div class="clearfix"></div>
						<input type="text" name="catname" class="form-control mx-auto" required placeholder="Category name" style="width: 75%;">
					</div>
					<div class="form-group form-inline">
						<label for="" style="float: left;">Leave policy &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  </label><div class="clearfix"></div>
						<input type="text" name="catpolicy" class="form-control mx-auto" required placeholder="Category policy" style="width: 75%;">
					</div>
					<div class="form-group  form-inline">
						<label for="" >Maximum in a year &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; </label>
						<input type="number" name="maxdays" class="form-control mx-auto" required placeholder="Maximum in a year" style="width: 75%;">
					</div>
				</div>
				<div class="footer">
					<div class="form-group" class="text-center" style="margin-left: 50%">
						<input type="submit" name="createCat" value="Create" class=" btn btn-success">
					</div>
				</form>
				</div>
		</div>
		<div class="card" style="margin-top: 25px;">
				<div class="card-header"><h3><i class="fas fa-user-alt"> </i> Leave Types List</h3></div>	
				<div class="card-body">
					<table class="table table-sm col-md-12 table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Type</th>
								<th>Leave policy</th>
								<th>Max days in year</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
								<?php
								$sel_sql = "SELECT * FROM leave_category";
								$run=mysqli_query($con, $sel_sql);
								$c = 0;
								while ($rows = mysqli_fetch_assoc($run)) {
									$c++;
									echo "<tr>
									<td>$c</td>
									<td>$rows[catname]</td>
									<td>$rows[catpolicy]</td>
									<td>$rows[catdays]</td>
									<td><a class='btn btn-sm btn-danger' href='leave_category.php?delid=$rows[catid]' onclick = 'return del_conf();'>Delete</a></td>
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
<!--inserting data into the leave categoty table -->
<?php
	if(isset($_POST['createCat'])){
		$catname = mysqli_real_escape_string($con, strip_tags($_POST['catname']));
		$policy = mysqli_real_escape_string($con, strip_tags($_POST['catpolicy']));
		$maxdays = mysqli_real_escape_string($con, strip_tags($_POST['maxdays']));
		$ins_sql = "INSERT INTO leave_category (catname, catpolicy, catdays) VALUES ('$catname', '$policy', '$maxdays')";
		if (mysqli_query($con, $ins_sql)){
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}
?>

<!--Deleting a record from leave categoty table -->
<?php
	if(isset($_GET['delid'])){
		$del_sql = "DELETE FROM leave_category WHERE catid = '$_GET[delid]'";
		if (mysqli_query($con, $del_sql)){?>
			<script>window.location = "leave_category.php";</script>
			<?php
		}
	}
?>