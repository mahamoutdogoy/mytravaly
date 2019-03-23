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
		include '../mytravalyAdmin/myheader.php';
		include"../mytravalyAdmin/mtsidebar.php";
		?>

		<!--Create User form-->
		<div class="col-md-9 col-lg-10">
			<?php
	include"user_header1.php";
	?>
			<a href="create_user.php" class="btn btn-warning" style="margin: 20px;"><i class="fas fa-plus"></i> Create New User</a>
			<a  class="btn btn-warning" onclick="return userfunc();" style="margin: 20px;">Inhouse users</a>
			<a  class="btn btn-warning" onclick="return customfunc();" style="margin: 20px;">Guests</a>
			<a  class="btn btn-warning" onclick="return hotelfunc();" style="margin: 20px;">Hoteliers</a>
			<a  class="btn btn-warning" onclick="return guestfunc();" style="margin: 20px;">Customers</a>

			<!--Listing the Existing Users-->
			<div id="inhouseusers"  class="card">
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
								<div class='modal-title' style='margin-left: 30%'><h5>User privileges($rows[name])</h5></div>
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

									echo "<tr><td class='float-left'><label for='resmail'>$p_rows[prename]</label></td><td class='float-right border border-warning'><input type='checkbox' id='chid' name='chkbx$rows[userid][]' value='$p_rows[preid]' $chk></td></tr>";

								}			 
								echo "</table><input type='hidden' value='$rows[userid]' name='uprid'>
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

			<div id="customusers" class="card" style="display: none;">
				<div class="card-header">
					<h3><i class="fas fa-user-alt"> </i> List of Guests</h3>
					<hr>
				</div>
				<div class="card-body">
					<table class="table-hover table-sm table-bordered text-center" style="width: 100%">
						<thead class="thead-light">
							<tr>
								<th>No</th>
								<th>Guest Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Check_in</th>
								<th >Check_out</th>
								<th>Amount</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sel_sql_guest = "SELECT * FROM reservation WHERE hotel_id=1";
								$run_guest=mysqli_query($con, $sel_sql_guest);
								$c = 0;
								while ($guest_rows = mysqli_fetch_assoc($run_guest)) {
									$c++;
									echo "<tr>
									<td>$c</td>
									<td>$guest_rows[guestName]</td>
									<td>$guest_rows[email]</td>
									<td>$guest_rows[phoneNo]</td>
									<td>$guest_rows[check_in]</td>
									<td>$guest_rows[check_out]</td>
									<td>$guest_rows[total]</td>
									<td><a href='all_users.php?guest_delid=$guest_rows[folio_id]' class='btn btn-danger btn-sm	 btn-block' onclick = 'return del_conf();'>delete</a></td></tr>";
								}

							?>
						</tbody>
					</table>
				</div>
			</div>

			<div id="hotelusers" class="card" style="display: none;">
                <div class="card-header">
                    <h3><i class="fas fa-user-alt"> </i> List of existing Hoteliers</h3>
                    <hr>
                </div>
                <div class="card-body">
                    <table class="table-hover table-sm table-bordered text-center" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Hotelier Name</th>
                                <th>Email</th>
                                <th>Property name</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Privileges</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sel_sql_hot = "SELECT * FROM user ORDER BY userid DESC";
                                $run_hot=mysqli_query($con, $sel_sql_hot);
                                $ph_sel_sql = "SELECT * FROM privileges";
                                $c = 0;
                                while ($hot_rows = mysqli_fetch_assoc($run_hot)) {
                                    $c++;
                                    $active_txt = "Inactive";
                                    $active_cls = "btn-danger";
                                    if ($hot_rows['status'] == 1) {
                                        $active_txt = "Active";
                                        $active_cls = "btn-success";
                                    }
                                    echo "<tr>
                                    <td>$c</td>
                                    <td>$hot_rows[fname]</td>
                                    <td>$hot_rows[email]</td>
                                    <td>$hot_rows[property]</td>
                                    <td>$hot_rows[country]</td>
                                    <td><a href='all_users.php?hot_activeid=$hot_rows[userid]' class='btn $active_cls btn-sm btn-block'>$active_txt</a></td>
                                    <td><a href='all_users.php?hot_delid=$hot_rows[userid]' class='btn btn-danger btn-sm     btn-block' onclick = 'return del_conf();'>delete</a></td>
                                        
                                        <td>
                                <button class='btn btn-primary btn-sm btn-block' data-toggle='modal' data-target='#prevh_modal$hot_rows[userid]' data-backdrop='static' data-keyboard='false'>privileges
                                </button>
                                <div  class='modal' id='prevh_modal$hot_rows[userid]'>
                                <div class='modal-dialog modal-dialog-centered' >
                                <div class='modal-content'>
                                <div class='modal-header' style='background:#f15025;color:white'>
                                <div class='modal-title mx-auto'><h5>Hotelier privileges($hot_rows[fname])</h5></div>
                                <button class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                <form action='' method='post'>
                                <table class='table table-condensed table-borderless'>";
                                $ph_run=mysqli_query($con, $ph_sel_sql);
                                while ($ph_rows = mysqli_fetch_assoc($ph_run)) {
                                    $chk = ' ';
                                    $parr=explode(',',$hot_rows['privilege']);
                                    for ($i=0; $i < (sizeof($parr)-1) ; $i++) {
                                                                # code...
                                        if($parr[$i]==$ph_rows['preid']){
                                            $chk = 'checked';
                                        }
                                    }

                                    echo "<tr><td class='float-left'><label for='resmail'>$ph_rows[prename]</label></td><td class='float-right border border-warning'><input type='checkbox' id='chid' name='chkbx$hot_rows[userid][]' value='$ph_rows[preid]' $chk></td></tr>";

                                }            
                                echo "</table><input type='hidden' value='$hot_rows[userid]' name='uphrid'>
                                <input type='submit' class='btn btn-success btn-lg' value='Grant' name='modal_subh'>
                                </form>
                                </div>
                                </div>
                                </div>
                                </div>
                                </td>
                                    </tr>";
                                }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

			<div id="guestusers" class="card" style="display: none;">
				<div class="card-header">
					<h3><i class="fas fa-user-alt"> </i> List of Customers</h3>
					<hr>
				</div>
				<div class="card-body">
					<table class="table-hover table-sm table-bordered text-center" style="width: 100%">
						<thead class="thead-light">
							<tr>
								<th>No</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<form action='' method='post'>
							<?php
								$sel_sql_cust = "SELECT * FROM mt_user";
								$run_cust=mysqli_query($con, $sel_sql_cust);
								$c = 0;

								while ($cust_rows = mysqli_fetch_assoc($run_cust)) {
									$c++;
									echo "<tr><td>$c</td>
									<td> <input class='border-0' type='text' name='fname$cust_rows[id]' value='$cust_rows[first_name]'></td>
									<td> <input class='border-0' type='text' name='lname$cust_rows[id]' value='$cust_rows[last_name]'></td>
									<td><input class='border-0' type='text' name='email$cust_rows[id]' value='$cust_rows[email]'></td>
									<td><input class='border-0' type='text' name='mobile$cust_rows[id]' value='$cust_rows[mobile]'></td>
									<td><input type='submit' name='edit'class='btn btn-info btn-sm btn-block' value='Edit' onclick='return clicedit($cust_rows[id]);'> </td>
									<td><a href='all_users.php?cust_delid=$cust_rows[id]' class='btn btn-danger btn-sm	 btn-block' onclick = 'return del_conf();'>delete</a></td></tr>";
								}

							?>
							<input type="hidden" name="custname" id="custid" value="">
							</form>
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
	$prev='';
	if (isset($_POST['chkbx'.$userid])) {
		foreach ($_POST['chkbx'.$userid] as $key) {
			# code...
			$prev = $prev.$key.',';
		}}
		$up_sql = "UPDATE users SET privilege = '$prev' WHERE userid = $userid";
		if(mysqli_query($con, $up_sql)){?>
		<script>window.location = "all_users.php";</script>
		<?php
	}}
?>

<!--Associating hotelier with privileges -->
<?php    
if (isset($_POST['modal_subh'])) {
    $userid = $_POST['uphrid'];
    $prev='';
    if (isset($_POST['chkbx'.$userid])) {
        foreach ($_POST['chkbx'.$userid] as $key) {
            # code...
            $prev = $prev.$key.',';
        }}
        $uph_sql = "UPDATE user SET privilege = '$prev' WHERE userid = $userid";
        if(mysqli_query($con, $uph_sql)){?>
        <script>window.location = "all_users.php";</script>
        <?php
    }}
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
	
	//Deleting a record from reservation table 
if(isset($_GET['guest_delid'])){
	$del_sql_guest = "DELETE FROM reservation WHERE folio_id = '$_GET[guest_delid]'";
	if (mysqli_query($con, $del_sql_guest)){?>
		<script>window.location = "all_users.php";</script>
		<?php
	}
}

//Deleting a record from mt_user table 
if(isset($_GET['cust_delid'])){
	$del_sql_cust = "DELETE FROM mt_user WHERE id = '$_GET[cust_delid]'";
	if (mysqli_query($con, $del_sql_cust)){?>
		<script>window.location = "all_users.php";</script>
		<?php
	}
}

//Editing a record from mt_user table 

if(isset($_POST['edit'])){
	$custname = $_POST['custname'];
		$fname = $_POST["fname$custname"];
		$lname = $_POST["lname$custname"];
		$femail = $_POST["email$custname"];
		$fmobile = $_POST["mobile$custname"];
	
	$edit_sql_cust = "UPDATE mt_user SET first_name = '$fname', last_name='$lname', email = '$femail', mobile = '$fmobile' WHERE id = '$custname'";
	if (mysqli_query($con, $edit_sql_cust)){?>
		<script>window.location = "all_users.php";</script>
		<?php
	}
}
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

//Activating or deactivating a hotelier 
if(isset($_GET['hot_activeid'])){
	$sel_active_hot ="SELECT status FROM user WHERE userid = '$_GET[hot_activeid]'";
	$run_active_hot = mysqli_query($con, $sel_active_hot);
	while ($hot_active_rows = mysqli_fetch_assoc($run_active_hot)) {
		if ($hot_active_rows['status'] == 0) {
			$hot_grant_sql = "UPDATE user SET status = 1 WHERE userid = '$_GET[hot_activeid]'";
			if (mysqli_query($con, $hot_grant_sql)){?>
				<script>window.location = "all_users.php";</script>
				<?php
			}
		}else{
			$hot_grant_sql = "UPDATE user SET status = 0 WHERE userid = '$_GET[hot_activeid]'";
			if (mysqli_query($con, $hot_grant_sql)){?>
				<script>window.location = "all_users.php";</script>
				<?php
			}
		}
	}
}
?>

<script>function clicedit(id){
	document.getElementById('custid').value=id;
}
</script>