<?php

	include("../phpmailer/sendemail.php");
	$email
	$temp=send_mail('prashanththunder007@gmail.com',"subject","body");
	if($temp==1)
	{
		echo "mail sent";
	}
	else
		echo "not sent";
?>