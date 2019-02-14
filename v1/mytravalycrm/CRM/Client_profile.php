<?php
	
		$list=mysqli_query($conn,"select FirstName,LastName,Email,Phone from client_details	where ClientId='".$_REQUEST['cid']."';")or die(mysqli_error($conn));
		
		$row=mysqli_fetch_assoc($list);
		
		?>


		<table cellpadding=10>
		<tr>
			<?php $path="edit_client_details.php?cid=".$_REQUEST['cid']; ?>
			<td>	<input type='button' class='btn btn-warning btn-sm' value='Edit Profile' onclick="window.location='<?php echo $path; ?>'" />	</td></tr>
		<tr>
			<td>	<img src='img/profile.png' height='70px' width='70px' radius=50></img>	</td>
			<td> <b style='font-size:25'><?php echo $row['FirstName'].' '.$row['LastName']; ?> </b> </td>
		</tr>
		<tr>
			<td>Phone No</td><br>
			<td><b><?php echo $row['Phone']; ?></b></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><label id="eid"> <span style='color:blue'><?php echo $row['Email']; ?> </span> </label></td>
		</tr>
		<tr>
			<td ><br><input type='button' class='btn btn-info' name='send_mail' value='Send Mail'/></td>
			<td> <br>
				<?php $path="new_task.php?cid=".$_REQUEST['cid']; ?>
				<a href='<?php echo $path; ?>'>
				<input type='button' class='btn btn-info' name='send_mail' value='Add Task' /></a></td>
		</tr>
		</table>