<?php 
session_start();

$_SESSION['cid']='10';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post">
	<input type="submit" name="sendMail"  onclick="javascript: form.action='send_mail_client.php'">

</form>
</body>
</html>

