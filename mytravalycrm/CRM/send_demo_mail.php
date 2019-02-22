
		
<?php 
if($_POST['email'] && $_POST['desc'] && $_POST['price'])
{
	 include('../phpmailer/sendemail.php');

	$to=$_POST['email'];
	$subject = 'Post Card';

	$message = '<html><body>';


	$message .= '<div style="max-width: 350px; margin: auto; background-color:#fff;border: solid 5px; "><h2 style="text-align:center">Product Card</h2>';

	$message .= "<div style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); max-width: 300px; margin: auto; text-align: center; font-family: arial;'> <img src='$_POST[img_src]'  style='width:100%'>";
  	$message .= " <h1>MyTravaly</h1> <p>CK Palya Road, 17th km, Bannerghatta Road, Basavanapura, Bangalore - 560083, Bengaluru</p>";
  	$message .= "<hr><p>".$_POST['desc']."</p><hr><p style='color: grey;font-size: 22px;'>Rs.".$_POST['price']."</p><p><button style='padding:12px;color:white; background-color: #000;text-align: center;cursor: pointer;width: 100%;font-size: 18px;'>BOOK NOW</button></p></div></div>";
	$message .= "</body></html>";
	
	/*$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";*/
	send_mail($to, $subject, $message);
}

?>