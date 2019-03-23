<?php
include('connect.php');
include 'config.php';
  if(isset($_POST) & !empty($_POST)){
    $input = $_POST['input'];
    $pass = rand(9999, 99999);
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
      //$password = $r['password'];
      $username = $r['username'];

      echo $usql = "UPDATE `users` SET passwd=" .$pass. ",forgot_status=0 WHERE username='$username'";
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
        $mail->Body    = "Your Password is $pass";
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

<html>
<head>
<title></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >
<script   src="https://code.jquery.com/jquery-3.1.1.js" ></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
	<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Reset Your Password</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="input" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
      </form>
</div>
</body>
</html>