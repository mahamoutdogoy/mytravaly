<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mytravaly</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="main.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


	<script>
		$(document).ready(function(){
		    $('[data-toggle="popover"]').popover();   
		});
	</script>

</head>
<body>
	<!--Header part-->
	<?php
		include"header.php";
		include"sidebar.php";
	?>

	<!--Create User form-->
	<div class="container">
		<h2 class="text-center">Create New User
		<button class="btn btn-warning btn-lg" data-toggle="modal" data-target="#user_mod" data-backdrop="static" data-keyboard="false">+</button></h2>
		<hr>
		<div id="user_mod" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">New User Details
						<button class="btn close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form action="POST" style="background: #F4F4ED;">
							<div class="form-group form-inline">
								<label for="" style="float: left;">Name &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  </label><div class="clearfix"></div>
								<input type="text" name="user" class="form-control mx-auto" required placeholder="name" style="width: 75%;">
							</div>
							<div class="form-group  form-inline">
								<label for="" >Email &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; </label>
								<input type="email" name="email" class="form-control mx-auto" required placeholder="email address" style="width: 75%;">
							</div>
							<div class="form-group form-inline">
								<label for="" >userName  &nbsp;&nbsp; &nbsp;&nbsp;</label>
								<input type="text" name="uname" class="form-control mx-auto" required placeholder="user name" style="width: 75%;">
							</div>
							<div class="form-group form-inline">
								<label for="" >Password &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</label>
								<input type="password" name="pwd" class="form-control mx-auto" required placeholder="password" style="width: 75%;">
							</div>
							<div class="form-group form-inline">
								<label for="" >Designation &nbsp;&nbsp;</label>
								<input type="text" name="desg" class="form-control mx-auto" required placeholder="designation" style="width: 75%;">
							</div>
							<div class="form-group form-inline">
								<label for="" >Mobile &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;;&nbsp;</label>
								<input type="number" name="num" class="form-control mx-auto" required placeholder="mobile number" style="width: 75%;">
							</div>
							<div class="form-group">
								<input type="submit" name="createUser" value="Create User" class="form-control btn btn-success">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		

		<!--Listing the Existing Users-->
		<h4 class="text-center">List of existing Users</h4>
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

	<!--Footer part-->
	<?php
		include"footer.php";
	?>
</body>
</html>