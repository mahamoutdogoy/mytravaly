<?php
include('connect.php');
include 'config.php';
  if(isset($_POST) & !empty($_POST)){
    $input = $_POST['input'];
    $pass = rand(999, 99999);
    $sql = "SELECT * FROM `users` WHERE ";
      if(filter_var($input, FILTER_VALIDATE_EMAIL)){
        $sql .= "email='$input'";
      }else{
        $sql .= "username='$input'";
      }
    $res = mysqli_query($connect, $sql);
    
    $count = mysqli_num_rows($res);
    if($count == 1){
      
      
      $r = mysqli_fetch_assoc($res);
     
      $username = $r['username'];

       $usql = "UPDATE `users` SET passwd=" .$pass. ", forgot_status=0 WHERE username='$username'";
      $result = mysqli_query($connect, $usql);
      if($result){
        require 'mailpass/PHPMailerAutoload.php';


        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = $smtphost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpuser;
        $mail->Password = $smtppass;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('dogoymytravaly@gmail.com', 'mytravaly');
        $mail->addAddress($input, 'mytravaly'); 

        $mail->Subject = 'Your New Password is';
        $mail->Body    = "Your Password is <span>$pass</span>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
      }else{
        echo "failed to updated password";
      }
      
    }

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forgot password</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<style>
body{
	background: #f15025;
}
#passr {
	width: 400px;
	height: 200px;
	margin: 200px auto;
	background: #fff;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
	display: none;
}

#passf {
	width: 400px;
	height: 300px;
	margin: 200px auto 0;
	background: #fff;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
}
#passc {
	width: 400px;
	height: 350px;
	margin: 200px auto;
	background: #fff;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
	display: none;
}
input[type=submit] {
	margin-top: 10px;
	font-weight: bold;
	font-size: 1.3em;
	padding-bottom: 25px;
}

h1 i {
	color: green;
}
</style>

<body>
	<div id="passf">
		<h1>Password reinitialization</h1>
		<p>To reinitialize your password, type the email address you use to login to <b>mytravaly</b></p>
		<form action="" method="post">
			<input type="email" name="input" id="inputEmail" class="form-control" placeholder="email address" required>
			<input type="submit"  name="pfsubmit" class=" btn btn-info form-control" value="Get reinitialization link">
		</form>
	</div>
	<div id="passc">
		<h1>Reinitialize your password</h1>
		<p>Your wanted to reinitialized your password for <b>mytravaly</b> account. If that ici the case click below to change it</p>
		<form action="" method="post" target="_blank">
			<input type="submit" name="prsubmit" class="btn btn-info form-control mb-2" value="Choose a new password">
		</form>
		<p>If you've not required any password change or if your not whilling to change anymore, please ignore it.</p>
	</div>

	<div id="passr">
		<h1>Email has been sent<i class="far fa-check-circle"></i></h1>
		<p>Check your inbox to get instructions on your password reinitialization</p>
	</div>
	
</body>
</html>

<!-- <?php
	if (isset($_POST['pfsubmit'])) {
		$email = mysqli_real_escape_string($con, strip_tags($_POST['pfemail']));

		echo "<script>
			document.getElementById('passf').style.display = 'none';
			document.getElementById('passr').style.display = 'block';
			</script>";
	}
?> -->
