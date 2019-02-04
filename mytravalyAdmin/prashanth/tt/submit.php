<?php
function processDrpdown($selectedVal) {
    mail($selectedVal,"new notification ","hi there \n You have new task to do... Thank You " );
	
}        

if ($_POST['lead_id'] && $_POST['email'] && $_POST['name']){
    //call the function or execute the code
    
	$con2=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
	mysqli_query($con2,"update client_details set AssignTo='$_POST[name]' where Id='$_POST[lead_id]';")or die(mysqli_error());
	mysqli_close($con2);
	 mail($_POST['email'],"new notification ","hi there \n You have new task to do... Thank You " );
}
