<?php 
session_start();

      include 'sendemail.php'; 
      include 'connect.php'

?>

<?php
$success = "";
$error_message = "";

if(!empty($_POST["submit"])) {
	$result = mysqli_query($con,"SELECT * FROM user WHERE email='" . $_POST["email"] . "'");
	$count  = mysqli_num_rows($result);
	if($count>0) {
		
		$otp = rand(100000,999999);
		
			date_default_timezone_set('Asia/Kolkata');
			$result = mysqli_query($con,"INSERT INTO otp(otp,expired,at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($con);
			if(!empty($current_id)) {
				$success=1;
			}
		
	} else {
		$error_message = "Email not exists!";
	}
}

if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($con,"SELECT * FROM otp WHERE otp='" . $_POST["otp"] . "' AND expired!=1 AND NOW() <= DATE_ADD(at, INTERVAL 5 MINUTE)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($con,"UPDATE otp SET expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;	
	} else {
		$success =1;
		$error_message = "<center><h2 style=color:red>Invalid OTP!</h2></center";
	}	
}

?>




<!DOCTYPE html>
<html>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<body>

<header>
  <h3></h3>
</header>
<br>

<br>
<div class='w3-content'>
<form class="w3-container w3-border w3-round" method='POST' action=''>
	<h1 class='w3-center'>Enter Your Details To Get OTP!</h1><hr>
  <label class="text-body"><b>Your Name</b></label>
  <input class="w3-input w3-border w3-round" type="text" name='name' placeholder='Enter your Name' required>
	<br>
  <label class="text-body"><b>Your Email Address</b></label>
  <input class="w3-input w3-border w3-round" type="text" name='email' placeholder='Enter your Email' required>
  
  <input class="w3-btn w3-blue w3-round w3-margin-top" type="submit" name='submit' value='Send Mail'>
  <br><br>
  
  <?php

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		
	
		$mail_body = "Hey $name,
					<br>Here is your Email - $email<br>
					<br> YOUR OTP is $otp <br>
					<br>Thanks,<br>https://mytravaly.com";
		$mail = send_mail($email,"OTP mytravaly",$mail_body);
		if($mail == 1){
			echo '<div class="w3-panel w3-green w3-round">
				  <h3>Success!</h3>
				  <p>Your Email Has been sent. Please check your inbox!</p>
				</div>';
		}else{
			echo '<div class="w3-panel w3-round w3-red">
				  <h3>Failed!</h3>
				  <p>Try Again!<p>
				</div>';
		}
	}
?>
</form>
</div>
<br>
<footer class="w3-container w3-center w3-teal">
 
</footer>
</body>
</html>
<?php
		if(!empty($error_message)) {
	?>
	<div class="message error_message"><?php echo $error_message; ?></div>
	<?php
		}
	?>

<form name="frmUser" method="post" action="">
	<div class="tblLogin">
		<?php 
			if(!empty($success == 1)) { 
		?>
		<div class="w3-center">Enter OTP</div>
		<div class="w3-center">
			<h3 style="color:#FF6F61;">Check your email for the OTP</h3>
		</div>
		
			
		<div class="w3-center">
			<input type="text" name="otp" placeholder="One Time Password" class="login-input" required>
		</div>
		<div class="w3-center"><input type="submit" name="submit_otp" value="Submit" class="btnSubmit"></div>
		<?php 
			} else if ($success == 2) {
				header('location:../mytravalyAdmin/mt.php');
        ?>

        <div class="w3-center">
        	
                <p style="color:#FF6F61;">Welcome, You have successfully loggedin!</p>



        </div>
		
		<?php
			}
			else {
		?>
		
		<!-- <div class="tableheader">Enter Your Login Email</div>
		<div class="tablerow"><input type="text" name="email" placeholder="Email" class="login-input" required></div>
		<div class="tableheader"><input type="submit" name="submit_email" value="Submit" class="btnSubmit"></div> -->
		<?php 
			}
		?>
	</div>
</form>
</body></html>
