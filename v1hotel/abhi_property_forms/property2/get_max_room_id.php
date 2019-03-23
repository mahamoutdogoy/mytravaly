<?php                          
 include 'Property_DB.php';
 if($_REQUEST['p'])
{
	$pid=$_REQUEST['p'];

	$rid="";
	$rowSQL = mysqli_query($con, "SELECT MAX( room_id ) AS max FROM `rooms_detail` where property_id='$pid'" );
	$row = mysqli_fetch_array( $rowSQL );
	$rid = $row['max']+1;

	echo '<input type="text" name="room_id" id="room_id" value='.$rid.' style="width:215px" readonly>';
}


?>