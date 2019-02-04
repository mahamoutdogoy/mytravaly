<?php	
	function sendOTP($email,$otp) {
		require('phpmailer/class.phpmailer.php');
		require('phpmailer/class.smtp.php');
	
		$message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
		
$mail = new PHPMailer(true);                                 // Passing `true` enables exceptions

   $mail->SMTPAuth = true; // There was a syntax error here (SMPTAuth)
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Mailer = "smtp";
$mail->Port = 587;
$mail->Username = "mahamatabdallah98@gmail.com";
$mail->Password = "624145791";
    //Recipients
    $mail->setFrom('mahamatabdallah98@gmail.com', 'mahamat');				//SET "FROM" EMAIL AND NAME. 
	// IT SHOULD BE LIKE THIS, $mail->setFrom('info@hackerrahul.com', 'HackerRahul');
    
	
	$mail->addAddress($to);            							// Add a recipient

    //Content
    $mail->isHTML(true);                                      // Set email format to HTML
    $mail->Subject = $subject;								 // Subject of the Email
    $mail->Body    = $body;									// Body of the Email

		
		return $result;
	}
?>