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


</head>
<script>
	function punch() {
	  var x = document.getElementById("in_out");
	  if (x.innerHTML === "Punch out") {
	  	var d = new Date();
		var h = d.getHours();
		var m = d.getMinutes();
		var n = h+":"+m
	    return confirm("It is "+n+" and you are punching out");
	  } 
	}
</script>
<style>
		input[type=checkbox]{
			width: 70px;
		}
	</style>
<body>
	<!--Header part-->

	<?php
	 include '../mytravalyAdmin/myheader.php';
		include"sidebar.php";
	?>
	<div class="col-md-9 col-lg-10">
		<?php
		include"user_header2.php";
	?>

		<div class="row">
			<div class="card col-md-4" style="margin-left: 20px;" >
				<div class="card-header">
					<i class="far fa-list-alt"></i> Punch In/Out</div>	
				<div class="card-body">
					<form method="POST"> 
						<?php
							$psql ="SELECT punchin FROM users WHERE userid=".$_SESSION['user']['userid']; //session
							$prun =mysqli_query($con, $psql);
							$prows = mysqli_fetch_assoc($prun);
							$pch='';
							if ($prows['punchin']==0) {
								$pch="Punch in";
							}else{
								$pch="Punch out";
							}
							echo "<button type='submit' name='punchinout' onclick='return punch();' id='in_out' class='btn btn-success btn-block'>$pch</button>";
						?>
					</form>
				</div>
			</div>
			<div class="card col-md-4" style="margin-left: 40px;">
				<div class="card-header"><i class="fas fa-user-alt"> </i> TimesSheet</div>	
				<div class="card-body">
					<form action="report.php" method="post">
					<div class="form-group">
					<label for="">From</label>
					<input name="datefrom" type="date" value="<?php echo date('Y-m-d');?>" style="margin: 20px;">
					</div>
					<div class="form-group">
					<label for="">To</label>
					<input name="dateto" type="date" value="<?php echo date('Y-m-d');?>" style="margin: 0 0 20px 35px;">
					<input type="submit" name="report" class="btn btn-primary">
					</div></form>
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

<?php
	if(isset($_POST['punchinout'])){
		$thisdate;
		$sel_p ="SELECT punchin FROM users WHERE userid = ".$_SESSION['user']['userid']; //session
		$run_p = mysqli_query($con, $sel_p);
		$p_rows = mysqli_fetch_assoc($run_p);
		if ($p_rows['punchin'] == 0) {
			$attdate = date('Y-m-d');
			$timein = date('H:i');
			$sel_att1 ="SELECT *  FROM attendance WHERE attuserid = ".$_SESSION['user']['userid']; //session
			$run_att1 = mysqli_query($con, $sel_att1);
			$a=mysqli_fetch_assoc($run_att1);
			if(gettype($a)!="NULL"){

			$sel_att ="SELECT MAX(attdate) AS attdate FROM attendance WHERE attuserid = ".$_SESSION['user']['userid']; //session
			$run_att = mysqli_query($con, $sel_att);
			while($att_rows = mysqli_fetch_assoc($run_att)){
				$thisdate=$att_rows['attdate'];	
				$diff =(strtotime($attdate)-strtotime($att_rows['attdate']));
			}
			

			$days = $diff/(60*60*24);
			
			if ($days > 1) {
				$monthdate = date('Y-m-d', strtotime($attdate.' -'.$days.' day'));
				
				$sel_hol ="SELECT holdate FROM holidays WHERE holdate BETWEEN '$monthdate' AND '$attdate'";
				
				
                 //session
				$sel_app ="SELECT appdate FROM leave_application WHERE (appdate BETWEEN '$monthdate' AND '$attdate') AND (appuserid =".$_SESSION['user']['userid'] ." AND appstatus=1)"; 
				
				
				$prevdate = date('Y-m-d', strtotime($attdate.' -1 day'));
				while ($prevdate!=$thisdate) {
					$run_app = mysqli_query($con, $sel_app);
					while ($app_rows = mysqli_fetch_assoc($run_app)) {
						if ($prevdate==$app_rows['appdate']) {
							goto inc;
						}else{
							goto hol;
						}
					}
					hol:{
					$run_hol = mysqli_query($con, $sel_hol);
					while ($hol_rows = mysqli_fetch_assoc($run_hol)) {
						if ($prevdate==$hol_rows['holdate']) {
							goto inc;
						}else{
							goto week;
						}
					}}
					week: {
					$weekend = date("l", strtotime($prevdate));
					if ($weekend=="Sunday" || $weekend=="Saturday" ) {
						goto inc;
					}else{
						$atab_ins = "INSERT INTO attendance(attuserid, attdate, attstatus) VALUES (".$_SESSION['user']['userid'].",'$prevdate', 'Absent')"; //session
						mysqli_query($con, $atab_ins);
						goto inc;

					}}
					inc:
					$prevdate = date('Y-m-d', strtotime($prevdate.' -1 day'));
				}
			}}

			$at_ins = "INSERT INTO attendance(attuserid, timein, attdate, attstatus) VALUES (".$_SESSION['user']['userid'].",'$timein', '$attdate', 'Present')"; //session
			mysqli_query($con, $at_ins);
			$punchin_sql = "UPDATE users SET punchin = 1 WHERE userid = ".$_SESSION['user']['userid']; //session
			if (mysqli_query($con, $punchin_sql)){?>
				<script>window.location = "attendance.php";</script>
				<?php
			}
		}else{
			$attdate = date('Y-m-d');
			$timeout = date('H:i');
			$atid_run=mysqli_query($con,"SELECT MAX(attid) AS maxid FROM attendance WHERE attuserid=".$_SESSION['user']['userid']); //session
			$atid_rows = mysqli_fetch_assoc($atid_run);
			$atid = $atid_rows['maxid'];
			$at_up = "UPDATE attendance SET timeout='$timeout' WHERE attid=$atid";
			mysqli_query($con, $at_up);
			$punchin_sql = "UPDATE users SET punchin = 0 WHERE userid =".$_SESSION['user']['userid']; //session
			if (mysqli_query($con, $punchin_sql)){?>
				<script>window.location = "attendance.php";</script>
				<?php
			}
		}
	}
?> 