# Send Email using PHPMailer in PHPMailer
Open **`sendemail.php`** and edit these lines.
``` php
 //Server settings
    $mail->SMTPDebug = 0;                                     // Enable verbose debug output
    $mail->isSMTP();                                         // Set mailer to use SMTP
    $mail->Host = 'YOUR_HOST_HERE';                         // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                // Enable SMTP authentication
    $mail->Username = 'YOUR_SMTP_USERNAME';                   // SMTP username
    $mail->Password = 'YOUR_SMTP_PASSWORD';                  // SMTP password
    $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to
    //Recipients
    $mail->setFrom('YOUR_EMAIL_ADDRESS', 'YOUR_NAME');	 //SET "FROM" EMAIL AND NAME. 
```    
Just Replace **`YOUR_HOST_HERE`**, **`YOUR_SMTP_USERNAME`**, **`YOUR_SMTP_PASSWORD`**, **`YOUR_EMAIL_ADDRESS`** and **`YOUR_NAME`** from these above lines with your SMTP Details.

## How to Send Email?
Just Use **`send_mail()`** function which request 3 arguments `send_mail($to,$subject,$body)`,you need to include **`sendemail.php`** file on top of your page to send email, so the codes will be like this.

``` php
<?php
	include 'sendemail.php';
	
	$to = 'recipientemail@gmail.com';
	$subject = 'Subject for PHPMailer';
	$body = 'here is the demo body for email';
	
	$send = send_mail($to,$subject,$body);
	if($send == 1){
		echo 'Mail Sent!';
	}else{
		echo 'Error Sending Mail.';
	}
?>
```
This will Publish email Instantly and recipient will receive email instantly!
