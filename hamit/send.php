<?php
include 'sendemail.php';
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
