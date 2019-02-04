<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/Exception.php";
include_once "PHPMailer/SMTP.php";

function send_mail($to,$subject,$body){
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


$mail = new PHPMailer(true);                                 // Passing `true` enables exceptions

   $mail->SMTPAuth = true; // There was a syntax error here (SMPTAuth)
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Mailer = "smtp";
$mail->Port = 587;
$mail->Username = "dogoymytravaly@gmail.com";
$mail->Password = "mytravaly";
    //Recipients
    $mail->setFrom('dogoymytravaly@gmail.com', 'mytravaly');				//SET "FROM" EMAIL AND NAME. 
	// IT SHOULD BE LIKE THIS, $mail->setFrom('info@hackerrahul.com', 'HackerRahul');
    
	
	$mail->addAddress($to);            							// Add a recipient

    //Content
    $mail->isHTML(true);                                      // Set email format to HTML
    $mail->Subject = $subject;								 // Subject of the Email
    $mail->Body    = $body;	
    								// Body of the Email

   if($mail->send()){
    $response = '1';
    }else{
    $response = '0';
    }
    return $response;
}


?>
