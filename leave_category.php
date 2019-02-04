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
				<h3 "> <i class="fas fa-user-alt"></i> Create Category</h3>
				<hr>
			</div>
			<div class="card-body">
				<form action="POST" style="margin-left: 20%" class="col-md-8">
					<div class="form-group form-inline">
						<label for="" style="float: left;">Category Name &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  </label><div class="clearfix"></div>
						<input type="text" name="user" class="form-control mx-auto" required placeholder="Category name" style="width: 75%;">
					</div>
					<div class="form-group  form-inline">
						<label for="" >Maximum in a year &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; </label>
						<input type="number" name="email" class="form-control mx-auto" required placeholder="Maximum in a year" style="width: 75%;">
					</div>
				</div>
				<div class="footer">
					<div class="form-group" class="text-center" style="margin-left: 50%">
						<input type="submit" name="createUser" value="Create" class=" btn btn-success">
					</div>
				</form>
				</div>
		</div>
		<div class="card" style="margin-top: 25px;">
				<div class="card-header"><h3><i class="fas fa-user-alt"> </i> Leave Types List</h3></div>	
				<div class="card-body">
					<table class="table table-sm col-md-12">
						<thead>
							<tr>
								<th>No</th>
								<th>Type</th>
								<th>Maximun days in a year</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Annual</td>
								<td>30</td>
								<td>Delete</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Weekly</td>
								<td>2</td>
								<td>Delete</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Casual</td>
								<td>10</td>
								<td>Delete</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Personal</td>
								<td>5</td>
								<td>Delete</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Government</td>
								<td>10</td>
								<td>Delete</td>
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
