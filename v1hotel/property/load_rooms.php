
<?php
require_once('Property_DB.php');
if ($_REQUEST['s']) {
	# code...
$property_id=$_REQUEST['s'];

echo '<select name="room" id="room" onchange="showUser(this)" style="width:250px;border-radius: 1rem;text-align: center;height: 35px" required>
			<option value="0">--Select--</option>';
			
							
								$query = "SELECT * FROM rooms_details where property_id='$property_id'";
		    					$result = mysqli_query($con,$query);
		    					while($row=mysqli_fetch_array($result)){   
		    					echo $row['room_name'];                             
		    					echo "<option value=".$row['room_id']."-".$row['meal_plan'].">".$row['room_name']."-".$row['meal_plan']."</option>";
		    					}
							
    				
    	echo "</select>";
    				
			
		
}

?>
<!--<select name="room" id="room" style="width: 150px" required>
			<option value="0">--Select--</option>
			<?php
			if(isset($_POST['property']))
			{
							$p=$_POST['property'];
		    					$query = "SELECT * FROM rooms_details where property_id='$p'";
		    					$result = mysqli_query($con,$query);
		    					
		    					while($row=mysqli_fetch_array($result)){                                                 
		       					echo "<option value=".$row['room_id']."-".$row['meal_plan'].">".$row['room_name']."-".$row['meal_plan']."</option>";
		    					}
    				}
    				?>
    				
			
		</select>-->



	