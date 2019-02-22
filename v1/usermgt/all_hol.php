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
		include"sidebar.php";
	?>
	<div class="container">

		<div class="modal" id="holModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<div class="modal-header" style='background:#f15025;color:white'>
				<div class="modal-title"><h3> <i class="far fa-edit"></i> Create Category</h3></div>
				<button class='close' data-dismiss='modal' style='margin-left: 40%'>&times;</button>
				<hr>
			</div>
      <div class="modal-body">
				<form method="POST" class="col-md-12">
					<table class="table table-lg">
					<tr >
						<td><label for="">Select a date</label></td>
						<td><input type="text" name="hol_date" placeholder="hol_date" required readonly class="dpicker" width= "250" style="background: white;"></td>
					</tr>
					<tr >
						<td><label for="">Holiday Title</label></td>
						<td><input class="form-control" type="text" name="hol_title" placeholder="Holiday Title" required></td>
					</tr>
				</table>
					<div class="form-group text-center mx-auto">
						<input type="submit" name="createHol" value="Create" class="btn btn-success">
					</div>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal" style='background:#f15025;color:white'>Close</button>
      </div>

    </div>
  </div>
</div>
		<button button type="button" class="btn btn-warning" data-toggle="modal" data-target="#holModal" data-backdrop='static' data-keyboard='false' style="margin: 20px;"><i class="fas fa-plus"></i> Create New Holiday</button>


			<div class='row'>
		<?php
			$sel_sql = "SELECT * FROM holidays ORDER BY holid DESC";
			$run=mysqli_query($con, $sel_sql);
			while ($rows = mysqli_fetch_assoc($run)) {
				echo "
					<div class='col-md-4'>
						<div class='card ml-2 mb-2'>
							<div class='card-header'><h5><i class='far fa-calendar-alt font-weight-bold'></i> $rows[holdate] <a href='all_hol.php?delid=$rows[holid]' class='btn btn-warning btn-lg float-right' onclick = 'return del_conf();'>X</a></h5></div>	
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

<?php
	if(isset($_GET['delid'])){
		$del_sql = "DELETE FROM holidays WHERE holid = '$_GET[delid]'";
		if (mysqli_query($con, $del_sql)){?>
			<script>window.location = "all_hol.php";</script>
			<?php
		}
	}
?>


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