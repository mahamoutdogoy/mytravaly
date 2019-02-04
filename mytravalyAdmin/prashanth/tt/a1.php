

<!-- php code for sending the mail -->

<?php

$subject=isset($_POST["subject"]); 
$content = isset($_POST["content"]);
if(isset($_POST['send']))
{
$to_email = $_POST['to'];

$subject = $_POST['subject'];
$content = $_POST['content'];

$headers = "From: abhishekkt.1rn16mca01@gmail.com";

if(mail($to_email,$subject,$content,$headers))
{
	echo "<label style='position:absolute;left:20px;button:20px;'> send successfully</label>";
	
}
else
{
	echo "<label>not send</label>";
	
}

}



?>   



<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <script type="text/javascript">
</script>

 

 </head>
<body style="background-color:lightblue">
<form action="" method="POST">
<div style="background-color:#00bfff;width:900px;height:550px;position:absolute;left:330px; top:120px;color:white;" >
<h2 style="position:relative; left:350px;">Send Mail</h2>
<table style="color:white;" cellspacing="10" cellpadding="10">
<tr>
<td>TO</td> 
<td>

<?php
$to='';
if(isset($_POST['sendmail']))
if(!empty($_POST['client_check_list'])){
// Loop to store and display values of individual checked checkbox.

foreach($_POST['client_check_list'] as $selected){

		$con=mysqli_connect("localhost","root","","sb_database");
		//$db=mysql_select_db("trial",$con);
		$query=mysqli_query($con,"select Email  from client_details where ClientId='$selected';");
		 while($row = mysqli_fetch_assoc($query))
        {
			$to=$to.$row['Email'].';';
		}
		//$to=$to.$selected.';';
		//echo $to."</br>";
}

}
echo "<input type='text' name='to' style='width:400px' value='$to' id='to'/>";

?>


&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>Or You Can Choose Here<b></td>
</tr>
<tr>
<td>Subject</td>
<td><input type="text" name="subject" style="width:400px" id="subject" value="<?php echo $subject; ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
<select id="dropdown" name="tempalte">
    <option disabled selected>&emsp;&emsp;&emsp;&emsp;---select---</option>
    <option value="Fix the meeting">Fix the meeting</option>
    <option value="I am busy">I am busy </option>
    <option value="Cantact me as soon as possible">Cantact me as soon as possible</option>
    <option value="I not interested">I not interested</option>
</select>
</td>
</tr>
<tr><td>Text Here</td>
<td> <textarea rows="13" cols="80" name="content"><?php echo $content; ?>
</textarea> </td>
</tr>
<tr>
</tr>
<tr>
<td></td>
<td><input type="submit" value="    Send    " class="btn btn-success" name="send" id="b" />


</td>

</tr>
</table>
</div>
</form>
</body>
</html>




<!-- javascript for dispaly ready text(template)on the subject text field-->


<script type="text/javascript">
    var mytextbox = document.getElementById('subject');
    var mydropdown = document.getElementById('dropdown');

    mydropdown.onchange = function(){
          mytextbox.value = this.value; //to appened
         //mytextbox.innerHTML = this.value;
    }
	
	
</script>

<!-- jquery for retain the value of to textfield -->
<script>
$(document).ready(function(){
  $("#b").click(function(){
		//document.write("hiii");
		//location.reload();
	  $v="<?php echo $to_email; ?>";
	  
    $("#to").val($v);
  });
});
</script>



