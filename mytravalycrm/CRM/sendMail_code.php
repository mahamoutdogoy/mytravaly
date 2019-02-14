
<?php

include("../dbConnect.php");
			include('../phpmailer/sendemail.php');
if(isset($_POST['sendmail']))
{
	if(!empty($_POST['list']))
	{
		foreach($_POST['list'] as $selected)
		{
			
			$sub=$_POST['subject'];
			$body=$_POST['body'];
   
			$email_list=mysqli_query($conn,"select FirstName,LastName,Email from client_details where ClientId='$selected'") or die(mysqli_error($conn)) ;
			$value=mysqli_fetch_array($email_list);
			if(!send_mail($value['Email'],$sub,$body))
			{
			echo "<script>
				alert('Warning : Mail Not Sent To :".$value['FirstName']." ".$value['LastName']."');
				
				</script>";
			}
		}
		
		echo "<script>
				alert('Mail sent Successfully....');
				document.location='leadtablepage.php'
				</script>";
	}
}

?>