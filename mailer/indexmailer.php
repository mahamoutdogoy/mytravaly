<?php include 'sendemail.php'; ?>
<!DOCTYPE html>
<html>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<header class="w3-container w3-center w3-teal">
  <h3></h3>
</header>
<br>

<br>
<div class='w3-content'>
<form class="w3-container w3-border w3-round" method='POST' action=''>
	<h1 class='w3-center'>Enter Your Details!</h1><hr>
  <label class="w3-text-teal"><b>Your Name</b></label>
  <input class="w3-input w3-border w3-round" type="text" name='name' placeholder='Enter your Name' required>
	<br>
  <label class="w3-text-teal"><b>Your Email Address</b></label>
  <input class="w3-input w3-border w3-round" type="text" name='email' placeholder='Enter your Email' required>
  
  <input class="w3-btn w3-blue w3-round w3-margin-top" type="submit" name='submit' value='Send Mail'>
  <br><br>
  
  <?php

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$otp = rand(100000,999999);
	
		$mail_body = "Hey $name,
					<br>Here is your Email - $email<br> yeessssssssssssssss<br>
					<br> YOUR OTP is $otp <br>
					<br>Thanks,<br>https://mytravaly.com";
		$mail = send_mail($email,"Send Email | mytravaly",$mail_body);
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
