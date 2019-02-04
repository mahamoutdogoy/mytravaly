<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/var/www/html/vendor/autoload.php';
$mail = new PHPMailer(TRUE);
try {
	$mail->setFrom('no_reply@mytravaly.com', 'Sender');
	$mail->addAddress('ashimapanjwani@gmail.com', 'Receiver');
	$mail->Subject = 'Hi there';
	$mail->Body = 'This is the first mail that I\'m sending using PHP.';
	$mail->isSMTP();
	$mail->Host = 'mytravaly.com';
	$mail->Port = 587;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Username = 'admin@mytravaly.com';
	$mail->Password = 'I5^rIqPmg-xN';
	// $mail->SMTPOptions = array(
	// 	'ssl' => array(
	// 	'verify_peer' => false,
	// 	'verify_peer_name' => false,
	// 	'allow_self_signed' => true
	// 	)
	// );
	$mail->send();
	echo "Email sent.";
}
catch (Exception $e)
{
	echo $e->errorMessage();
}
catch (\Exception $e)
{
	echo $e->getMessage();
}
?>




