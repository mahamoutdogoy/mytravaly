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

<script>
	function v_func() {
		var x = document.getElementById("indiv_report");
  		var x2 = document.getElementById("summary_report");
   		if (window.getComputedStyle(x2).display === "block") {
    	x2.style.display = "none";
  		}
  		if (window.getComputedStyle(x).display === "none") {
    		x.style.display = "block";
  		}
	}
	function v_func1() {
		var x = document.getElementById("indiv_report");
  		var x2 = document.getElementById("summary_report");
   		if (window.getComputedStyle(x).display === "block") {
    	x.style.display = "none";
  		}
  		if (window.getComputedStyle(x2).display === "none") {
    		x2.style.display = "block";
  		}
	}

	//punch in/out function
	function punch() {
	  var x = document.getElementById("in_out");
	  if (x.innerHTML === "Punch in") {
	    x.innerHTML = "Punch out";
	  } else {
	    x.innerHTML = "Punch in";
	  }
	}
</script>


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
		<div class="alert alert-info">Abib is present today</div>
		<div class="alert alert-info">10 Users are still not present</div>
		<div class="card">
			<div class="card-header">
				<h4>Welcome</h4>
			</div>
			<div class="card-body">
				<h2>Welcome to the User Management Dashboard Mahamat</h2>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-4">
			<div class="card" style="height: 260px;">
					<div class="card-header">
						<i class="far fa-list-alt"></i> Punch In/Out</div>	
					<div class="card-body">
						<button onclick="punch();" id="in_out" class="btn btn-success btn-block">Punch in</button>
					</div>
			</div>
			</div>
			<div class="col-md-4">
			<div class="card ml-2" style="height: 260px;" >
					<div class="card-header">
						<i class="far fa-list-alt"></i> Attendance Reports</div>	
					<div class="card-body">
						<div class="dropdown">
							<button class="btn btn-warning dropdown-toggle btn-block" data-toggle="dropdown">Reports</button>
							<div class="dropdown-menu">
								<a onclick="v_func();" href="#" class="dropdown-item">Individual Report </a>
								<a onclick="v_func1();" href="#" class="dropdown-item">Summary Report</a>
							</div>
						</div>
					</div>
			</div>
			</div>
			<div class="col-md-4" id="indiv_report" style="display: none;">
			<div class="card ml-2">
					<div class="card-header">
						<i class="far fa-list-alt"></i> Individual Report</div>	
					<div class="card-body">
						<div class="form-group">
						<label for="">From</label><input type="date" value="<?php echo date('Y-m-d');?>" style="margin: 0 0 20px 20px;">
						</div>
						<div class="form-group">
						<label for="">To</label>
						<input type="date" value="<?php echo date('Y-m-d');?>" style="margin: 0 0 20px 35px;">
						</div>
						<div class="form-inline">
						<label for="">User</label>
							<select name="" id="" style="margin-left: 20px; height: 40px;">
								<option value="">Select a user</option>
								<option value="">Abib</option>
								<option value="">dogoy</option>
							</select>
						<a href="report.php" class="btn btn-primary ml-2">Report</a>
						</div>
						

					</div>
			</div>
			</div>
			<div class="col-md-4" id="summary_report" style="display: none;">
			<div class="card ml-2">
					<div class="card-header">
						<i class="far fa-list-alt"></i> Summary Report</div>	
					<div class="card-body">
						<div class="form-group">
						<label for="">From</label><input type="date" value="<?php echo date('Y-m-d');?>" style="margin: 0 0 20px 20px;">
						</div>
						<div class="form-group">
						<label for="">To</label>
						<input type="date" value="<?php echo date('Y-m-d');?>" style="margin: 0 0 20px 35px;">
						<a href="report.php" class="btn btn-primary ml-5">Report</a>
						</div>

					</div>
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