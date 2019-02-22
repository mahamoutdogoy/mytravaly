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
	
	<!--<link href="alertifyjs/css/alertify.css" rel="stylesheet">
	<link href="alertifyjs/css/themes/default.css" rel="stylesheet" id="toggleCSS">
	<script src="alertifyjs/alertify.min.js"></script>-->


	<script>
	</script>

	<style>
	input[type=checkbox]{
		width: 70px;
	}
</style>

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
			<a href="create_user.php" class="btn btn-warning" style="margin: 20px;"><i class="fas fa-plus"></i> Create New User</a>

			<!--Listing the Existing Users-->
			<div class="card">
				<div class="card-header">
					<h3><i class="fas fa-user-alt"> </i> List of existing Users</h3>
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
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sel_sql = "SELECT * FROM users";
							$run=mysqli_query($con, $sel_sql);
							$p_sel_sql = "SELECT * FROM privileges";
							$p_run=mysqli_query($con, $p_sel_sql);
							$c = 0;
							$id=0;
							while ($rows = mysqli_fetch_assoc($run)) {
								$c++;
								$active_txt = "Inactive";
								$active_cls = "btn-danger";
								if ($rows['status'] == 1) {
									$active_txt = "Active";
									$active_cls = "btn-success";
								}
								echo "<tr>
								<td>$c</td>
								<td>$rows[name]</td>
								<td>$rows[email]</td>
								<td>$rows[username]</td>
								<td>$rows[role]</td>
								<td><a href='all_users.php?activeid=$rows[userid]' class='btn $active_cls btn-sm btn-block'>$active_txt</a></td>
								<td>
								<button class='btn btn-primary btn-sm btn-block' data-toggle='modal' data-target='#prev_modal$rows[userid]' data-backdrop='static' data-keyboard='false'>privileges
								</button>
								<div  class='modal' id='prev_modal$rows[userid]'>
								<div class='modal-dialog modal-dialog-centered' >
								<div class='modal-content mx-auto'>
								<div class='modal-header' style='background:#f15025;color:white'>
								<div class='modal-title' style='margin-left: 30%'><h5>User privileges</h5></div>
								<button class='close' data-dismiss='modal'>&times;</button>
								</div>
								<div class='modal-body'>
								<form action='' method='post'> 
								<table class='table table-condensed table-borderless'>";
								$p_run=mysqli_query($con, $p_sel_sql);
								while ($p_rows = mysqli_fetch_assoc($p_run)) {
									$chk = ' ';
									$parr=explode(',',$rows['privilege']);
									for ($i=0; $i < (sizeof($parr)-1) ; $i++) { 
																# code...
										if($parr[$i]==$p_rows['preid']){
											$chk = 'checked';
										}
									}

									echo "<tr><td class='float-left'><label for='resmail'>$p_rows[prename]</label></td><td class='float-right border border-warning'><input type='checkbox' id='chid' name='chkbx$p_rows[preid]' $chk onclick='return set_userid($p_rows[preid],$rows[userid]);'></td></tr>";

								}			 
								echo "</table><input id='idp$rows[userid]' value='' type='hidden' name='ppreid'><input type='hidden' value='$rows[userid]' name='uprid'>
								<input type='submit' class='btn btn-success btn-lg' value='Submit' name='modal_sub'>
								</form>
								</div>
								<div class='modal-footer'>
								<button class='btn' data-dismiss='modal' style=' background: #f15025; color:white'>Close</button>
								</div>
								</div>
								</div>
								</div>
								</td>
								<td><a href='all_users.php?delid=$rows[userid]' class='btn btn-danger btn-sm	 btn-block' onclick = 'return del_conf();'>delete</a></td>
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

<!--Associating user with privileges -->
<?php	
if (isset($_POST['modal_sub'])) {
	$userid = $_POST['uprid'];
	$preid= $_POST['ppreid'];
	if (isset($_POST['chkbx'.$preid])) {
		$up_sql = "UPDATE users SET privilege = CONCAT(privilege,'$preid,') WHERE userid = $userid";
		if(mysqli_query($con, $up_sql)){?>
		<script>window.location = "all_users.php";</script>
		<?php
	}}else{
		$ur_sql = "SELECT privilege FROM users WHERE userid=$userid";
		$ur_run = mysqli_query($con,$ur_sql);
		$ur_rows = mysqli_fetch_assoc($ur_run);
		$prvs=explode(',',$ur_rows['privilege']);
		$count = count($prvs) - 1;
		for ($i=0 ; $i < $count; $i++ ) { 
			if ($prvs[$i]==$preid) {
				array_splice($prvs,$i,1);
			}
		}
		$prv=implode(',',$prvs);
		if(mysqli_query($con,"UPDATE users set privilege='$prv' WHERE userid=$userid")){?>
		<script>window.location = "all_users.php";</script>
		<?php
}}}
?>


<!--Deleting a record from Users table -->
<?php
if(isset($_GET['delid'])){
	$del_sql = "DELETE FROM users WHERE userid = '$_GET[delid]'";
	if (mysqli_query($con, $del_sql)){?>
		<script>window.location = "all_users.php";</script>
		<?php
	}
}
	//$chk_sql = "SELECT userid, preid,  FROM users u, privileges p, have_previleges hp WHERE u.userid=hp.puserid AND p.preid=hp.ppreid";
	//$chk_run = mysqli_query($con, $chk_sql);
?>

<!--Activating or deactivating a user -->
<?php
if(isset($_GET['activeid'])){
	$sel_active ="SELECT * FROM users WHERE userid = '$_GET[activeid]'";
	$run_active = mysqli_query($con, $sel_active);
	while ($active_rows = mysqli_fetch_assoc($run_active)) {
		if ($active_rows['status'] == 0) {
			$grant_sql = "UPDATE users SET status = 1 WHERE userid = '$_GET[activeid]'";
			if (mysqli_query($con, $grant_sql)){?>
				<script>window.location = "all_users.php";</script>
				<?php
			}
		}else{
			$grant_sql = "UPDATE users SET status = 0 WHERE userid = '$_GET[activeid]'";
			if (mysqli_query($con, $grant_sql)){?>
				<script>window.location = "all_users.php";</script>
				<?php
			}
		}
	}
}
?>

<script>
	function set_userid(id,id2){
		document.getElementById('idp'+id2).value=id;
		//alert(d);
	}
</script>