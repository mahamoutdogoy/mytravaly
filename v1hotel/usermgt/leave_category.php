<?php session_start(); ?>
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


	<script>
	</script>

</head>
<body>
	<!--Header part-->

	<?php
		include"mtsidebar.php";
	?>

	<!--Create User form-->
	<div class="col-md-9">
			<?php
		include"user_header1.php";
	?>
<div class="modal" id="catModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<div class="modal-header" style='background:#f15025;color:white'>
				<div class="modal-title"><h3 "> <i class="far fa-edit"></i> Create Category</h3></div>
				<button class='close' data-dismiss='modal' style='margin-left: 40%'>&times;</button>
				<hr>
			</div>
      <div class="modal-body">
				<form method="POST" class="col-md-12">
					<table class="table table-lg">
					<tr >
						<td><label for="" >Category Name </label></td>
						<td><input type="text" name="catname" class="form-control mx-auto" required placeholder="Category name" ></td>
					</tr>
					<tr >
						<td><label for="" >Leave policy  </label></td>
						<td><textarea type="text" name="catpolicy" rows="8" class="form-control mx-auto" required placeholder="Category policy" ></textarea></td>
					</tr>
					<tr >
						<td><label for="" >Maximum in a year</label></td>
						<td><input type="number" name="maxdays" class="form-control mx-auto" required placeholder="Maximum in a year"></td>
					</tr>
				</table>
					<div class="form-group" class="text-center" style="margin-left: 50%">
						<input type="submit" name="createCat" value="Create" class=" btn btn-success">
					</div>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal" style='background:#f15025;color:white'>Close</button>
      </div>

    </div>
  </div>
</div>
		<button button type="button" class="btn btn-warning" data-toggle="modal" data-target="#catModal" data-backdrop='static' data-keyboard='false' style="margin: 20px;"><i class="fas fa-plus"></i> Create New Category</button>
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
								$sel_sql = "SELECT * FROM leave_category ORDER BY catid DESC";
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