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
	<link rel="stylesheet" href="main.css">

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
		<div class="row">
			<div class="card col-md-12">
				<div class="card-header"><h3><i class="far fa-edit"></i> Apply For Leave</h3></div>	
					<form action="">
						<div class="card-body">
						<div class="form-inline">
							<label for="">Select a date</label>
							<input type="text" placeholder="leave_date" required readonly class="dpicker" width= "250" style="margin: 0 0 0 20px; background: white;">
						</div>
						<div class="form-inline" style="margin: 20px 0 0 0;">
							<label for="">Leave Category</label>
							<select name="" id="" style="margin-left: 20px; height: 40px; width: 210px;">
								<option value="">Select a Category</option>
								<option value="">Annual leave</option>
								<option value="">Weakly leave</option>
								<option value="">Special leave</option>
								<option value="">Casual leave</option>
							</select>
						</div>						
						<div class="form-inline" style="margin-top: 20px;">
							<label for="">Description </label>
							<textarea name="desc" id="" cols="30" rows="5" placeholder="describe your leave cause" style="margin-left: 20px;"></textarea>
						</div>
						</div>
						<div class="card-footer">
						<div class="inline" style="margin: 20px 0 0 150px;">
							<button class="btn btn-success">Save</button>
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