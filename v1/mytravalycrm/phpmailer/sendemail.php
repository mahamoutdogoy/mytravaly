<?php
function send_mail($to,$subject,$body)
{
	require_once("class.phpmailer.php");

	$mail = new PHPMailer();

	$mail->IsSMTP();                                      // set mailer to use SMTP
	$mail->Host = "mytravaly.com";  // specify main and backup server
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Username = "no_reply@mytravaly.com";  // SMTP username
	$mail->Password = "Ey[d}G+cT2KS"; // SMTP password

	$mail->From = "no_reply@mytravaly.com";
	$mail->FromName = "MyTravaly.com";

	$mail->AddAddress($to);                  // name is optional

	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
	//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
	$mail->IsHTML(true);                                  // set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $body;
	
	if(!$mail->Send())
	{
	   echo "Message could not be sent. <p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}

	return "Message has been sent";
}
?>