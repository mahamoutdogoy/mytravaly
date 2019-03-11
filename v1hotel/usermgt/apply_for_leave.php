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
		include"sidebar.php";
	?>
	<div class="col-md-9 col-lg-10">
		<?php
		include"user_header2.php";
	?>
			<div class="card col-md-12">
				<div class="card-header"><h3><i class="far fa-edit"></i> Apply For Leave</h3></div>	
					<form action="" method="post">
						<div class="card-body">
						<div class="form-inline">
							<label for="">Select a date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							<input type="text" name="leave_date" placeholder="leave_date" required readonly class="dpicker" width= "250" style="margin: 0 0 0 20px; background: white;">
						</div>
						<div class="form-inline" style="margin: 20px 0 0 0;">
							<label for="">Leave Category &nbsp;&nbsp;&nbsp;&nbsp;</label>
							<select name="leavecat" id="" style="margin-left: 20px; height: 40px; width: 225px;" required>
								<option value="">Select a Category</option>
								<?php
									$sel_sql = "SELECT catname FROM leave_category";
									$run = mysqli_query($con, $sel_sql);
									while ($rows = mysqli_fetch_assoc($run)) {
										# code...
										echo "<option value='$rows[catname]'>$rows[catname]</option>";
									}
								?>
							</select>
						</div>						
						<div class="form-inline" style="margin-top: 20px;">
							<label for="">Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							<textarea name="leavedesc" id="" cols="30" rows="5" placeholder="describe your leave cause" style="margin-left: 20px;" required></textarea>
						</div>
						<div class="inline" style="margin: 20px 0 0 150px;">
							<input type="submit" name="createApp" value="Save" class="btn btn-success">
							<button class="btn btn-default">Cancel</button>
						</div>
						</div>
					</form>
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

<!--Inserting data into the Leave appliction table -->
<?php
  if(isset($_POST['createApp'])){
    $appdate = mysqli_real_escape_string($con, strip_tags($_POST['leave_date']));
    $leavecat = mysqli_real_escape_string($con, strip_tags($_POST['leavecat']));
    $leavedesc = mysqli_real_escape_string($con, strip_tags($_POST['leavedesc']));
    $status = 0;
    $time = strtotime("$appdate");
	$newformat = date('Y-m-d',$time);
    $sel_catid = "SELECT * FROM leave_category WHERE catname = '$leavecat'";
    $run_catid = mysqli_query($con, $sel_catid);
    $catid;
    if ($catid_rows = mysqli_fetch_assoc($run_catid)) {
    	$catid = $catid_rows['catid'];
    }
    $ins_sql = "INSERT INTO leave_application (appdesc, appcatid, appdate, appstatus, appuserid) VALUES ('$leavedesc', '$catid', '$newformat', '$status',".$_SESSION['user']['userid'].")";
    if (mysqli_query($con, $ins_sql)){?>
      <script>window.location = "apply_for_leave.php";</script>
      <?php
    }
  }
?>