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

		<!--Listing the Existing Users-->
		<div class="card">
			<div class="card-header">
				<h3><i class="fas fa-user-alt"> </i>List of existing Users</h3>
				<hr>
			</div>
			<div class="card-body">
				<table class="table-hover table-sm table-bordered text-center" style="width: 100%">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Email</th>
							<th>UserName</th>
							<th>Designation</th>
							<th >Status</th>
							<th>Privileges</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Abdallah</td>
							<td>abd@abd.com</td>
							<td>Abib</td>
							<td>Admin</td>
							<td><a href="#" class="btn btn-success btn-sm btn-block">active</a></td>
							<td>
								<div class="dropdown">
								  <button class="btn btn-primary dropdown-toggle btn-sm btn-block" data-toggle="dropdown">privileges</button>
								  <div class="dropdown-menu">
								    <div class="dropdown-item">ResMail  <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Property <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">PMS <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Profit Maker <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Accounts <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Social Media <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Reports <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Marketplace <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">User Management <input type="checkbox" class="float-right"></div>
								  </div>
								</div>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Abdallah</td>
							<td>abd@abd.com</td>
							<td>Abib</td>
							<td>Admin</td>
							<td><a href="#" class="btn btn-danger btn-sm btn-block">inactive</a></td>
							<td>
								<div class="dropdown">
								  <button class="btn btn-primary dropdown-toggle btn-sm btn-block" data-toggle="dropdown">privileges</button>
								  <div class="dropdown-menu">
								    <div class="dropdown-item">ResMail  <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Property <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">PMS <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Profit Maker <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Accounts <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Social Media <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Reports <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Marketplace <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">User Management <input type="checkbox" class="float-right"></div>
								  </div>
								</div>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Abdallah</td>
							<td>abd@abd.com</td>
							<td>Abib</td>
							<td>Admin</td>
							<td><a href="#" class="btn btn-success btn-sm btn-block">active</a></td>
							<td>
								<div class="dropdown">
								  <button class="btn btn-primary dropdown-toggle btn-sm btn-block" data-toggle="dropdown">privileges</button>
								  <div class="dropdown-menu">
								    <div class="dropdown-item">ResMail  <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Property <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">PMS <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Profit Maker <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Accounts <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Social Media <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Reports <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Marketplace <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">User Management <input type="checkbox" class="float-right"></div>
								  </div>
								</div>
							</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Abdallah</td>
							<td>abd@abd.com</td>
							<td>Abib</td>
							<td>Admin</td>
							<td><a href="#" class="btn btn-danger btn-sm btn-block">inactive</a></td>
							<td>
								<div class="dropdown">
								  <button class="btn btn-primary dropdown-toggle btn-sm btn-block" data-toggle="dropdown">privileges</button>
								  <div class="dropdown-menu">
								    <div class="dropdown-item">ResMail  <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Property <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">PMS <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Profit Maker <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Accounts <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Social Media <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Reports <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">Marketplace <input type="checkbox" class="float-right"></div>
								    <div class="dropdown-item">User Management <input type="checkbox" class="float-right"></div>
								  </div>
								</div>
							</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Abdallah</td>
							<td>abd@abd.com</td>
							<td>Abib</td>
							<td>Admin</td>
							<td><a href="#" class="btn btn-danger btn-sm btn-block">inactive</a></td>
							<td><a href="#" class="btn btn-primary btn-sm btn-block">privileges</a></td>
						</tr>
						<tr>
							<td>6</td>
							<td>Abdallah</td>
							<td>abd@abd.com</td>
							<td>Abib</td>
							<td>Admin</td>
							<td><a href="#" class="btn btn-success btn-sm btn-block">active</a></td>
							<td><a href="#" class="btn btn-primary btn-sm btn-block">privileges</a></td>
						</tr>
						<tr>
							<td>7</td>
							<td>Abdallah</td>
							<td>abd@abd.com</td>
							<td>Abib</td>
							<td>Admin</td>
							<td><a href="#" class="btn btn-success btn-sm btn-block">active</a></td>
							<td><a href="#" class="btn btn-primary btn-sm btn-block">privileges</a></td>
						</tr>
							<tr>
							<td>8</td>
							<td>Abdallah</td>
							<td>abd@abd.com</td>
							<td>Abib</td>
							<td>Admin</td>
							<td><a href="#" class="btn btn-danger btn-sm btn-block">inactive</a></td>
							<td><a href="#" class="btn btn-primary btn-sm btn-block">privileges</a></td>
						</tr>
							<tr>
							<td>9</td>
							<td>Abdallah</td>
							<td>abd@abd.com</td>
							<td>Abib</td>
							<td>Admin</td>
							<td><a href="#" class="btn btn-danger btn-sm btn-block">inactive</a></td>
							<td><a href="#" class="btn btn-primary btn-sm btn-block">privileges</a></td>
						</tr>
							<tr>
							<td>10</td>
							<td>Abdallah</td>
							<td>abd@abd.com</td>
							<td>Abib</td>
							<td>Admin</td>
							<td><a href="#" class="btn btn-success btn-sm btn-block">active</a></td>
							<td><a href="#" class="btn btn-primary btn-sm btn-block">privileges</a></td>
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
