
<?php


	require_once('../phpmailer/sendemail.php');

	require_once("../dbConnect.php");
	
	//sending mail for multiple selected clients in crm lead page
	if(isset($_POST['send_mul_mail']))
	{
		sendMulMail($conn);
	}
	//add mail template and send mail 
	if(isset($_POST['add_send_mail']))
	{
		$sub=$_POST['subject'];
		$body=$_POST['body'];

		$query="insert into mail_template (HotelId,Subject,Body) values (1,'$sub','$body');";
		mysqli_query($conn,$query) or die(mysqli_error($conn));

		sendMulMail($conn);


	}

	function sendMulMail($conn)
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
					document.location='index.php'
					</script>";
		}
	}

	
?>