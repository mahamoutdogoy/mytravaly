<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />



<?php include 'propertymenus.php';
 include"red.php";?>


<?php 
$session_user="abhi";
	include 'Property_DB.php';
	
	/*$rid="";
	$rowSQL = mysqli_query($con, "SELECT MAX( room_id ) AS max FROM `$session_user-$property_id`;" );
	$row = mysqli_fetch_array( $rowSQL );
	$rid = $row['max']+1;*/
	


$max_occupancy="";
	if (isset($_POST['save'])) {

	
		$property_id=$_POST['property_id'];
		$room_id=$_POST['room_id'];
		$room_name=$_POST['room_name'];
		$description=$_POST['description'];
		$min_occupancy=$_POST['min_occupancy'];
		$max_occupancy=$_POST['max_occupancy_adult'];
		$max_occupancy_child=$_POST['max_occupancy_child'];
		$tariff=$_POST['tariff'];
		$inventory=$_POST['inventory'];
		$meal_plan=$_POST['meal_plan'];



/*mysqli_query($con,"CREATE TABLE IF NOT EXISTS `$property_id` (
  `user` varchar(70) NOT NULL,
  `property_id` varchar(50) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `min_occupancy` int(11) NOT NULL DEFAULT '1',
  `max_occupancy` int(11) NOT NULL,
  `tariff` varchar(50) NOT NULL,
  `inventory` varchar(50) NOT NULL,
  `meal_plan` varchar(50) NOT NULL,
  `singleprice` double NOT NULL DEFAULT '0',
  `doubleprice` double NOT NULL DEFAULT '0',
  `tripleprice` double NOT NULL DEFAULT '0',
  `person4price` double NOT NULL DEFAULT '0',
  `person5price` double NOT NULL DEFAULT '0',
  `person6price` double NOT NULL DEFAULT '0',
  `person7price` double NOT NULL DEFAULT '0',
  `person8price` double NOT NULL DEFAULT '0',
  `person9price` double NOT NULL DEFAULT '0',
  `person10price` double NOT NULL DEFAULT '0',
  `person11price` double NOT NULL DEFAULT '0',
  `person12price` double NOT NULL DEFAULT '0',
  `person13price` double NOT NULL DEFAULT '0',
  `person14price` double NOT NULL DEFAULT '0',
  `person15price` double NOT NULL DEFAULT '0',
  `extrapersonprice` double NOT NULL DEFAULT '0',
  `extrachildprice` double NOT NULL DEFAULT '0',
  `infantprice` double NOT NULL DEFAULT '0'
)");*/






		
			
		mysqli_query($con,"insert into rooms_details(user_id,property_id,room_id,room_name,description,min_occupancy,max_occupancy,tariff,inventory,meal_plan) values('$session_user','$property_id','$room_id','$room_name','$description','$min_occupancy','$max_occupancy','$tariff','$inventory','$meal_plan')");

	
				/*$rowSQL = mysqli_query($con, "SELECT MAX( room_id ) AS max FROM `rooms`;" );
				$row = mysqli_fetch_array( $rowSQL );
				$rid = $row['max']+1;?*/
	

					echo "<script> 
				alert('Room Details Saved!!!! Goto Tariff For Pricing'); 
				window.location.href = 'Tariff.php';
				</script>";
	

			} 

			if(isset($_POST['csave']))
			{

				$trp1=$_POST['trp1'];
				$trp2=$_POST['trp2'];
				$trp3=$_POST['trp3'];
				$trp4=$_POST['trp4'];
				$trp5=$_POST['trp5'];
				$trp6=$_POST['trp6'];
				$trp7=$_POST['trp7'];
				$trp8=$_POST['trp8'];
				$trp9=$_POST['trp9'];
				$trp10=$_POST['trp10'];
				$trp11=$_POST['trp11'];
				$trp12=$_POST['trp12'];
				$trp13=$_POST['trp13'];
				$trp14=$_POST['trp14'];
				$trp15=$_POST['trp15'];
				$extraperson=$_POST['extraperson'];
				$extrachild=$_POST['extrachild'];
				$infant=$_POST['infant'];
				$rooms=$_POST['rooms'];

				mysqli_query($con,"update rooms_details set singleprice='$trp1',doubleprice='$trp2',tripleprice='$trp3',person4price='$trp4',person5price='$trp5',person6price='$trp6',person7price='$trp7',person8price='$trp8',person9price='$trp9',person10price='$trp10',person11price='$trp11',person12price='$trp12',person13price='$trp13',person14price='$trp14',person15price='$trp15',extrapersonprice='$extraperson',extrachildprice='$extrachild',infantprice='$infant' where room_name='$rooms'");
				

				echo "<script> 
				alert('Price of room is updated');
				window.location.href = 'Tariff.php';
				 </script>";

				
			}

			if(isset($_POST['pricing']))
			{

				//$query = "SELECT room_name FROM rooms";
    					//$result = mysqli_query($con,$query);



			}
			

?>



	<html>
	<head>
		

<!-- jquery for calculating the price for each category-->

 <script>

    $(document).ready(function(){

			$('.s2').keyup(function(){

            var v1=$(this).val();
            var v2=$(this).closest("tr").find(".s1").val();
             if(v1<1 && v2<1)
            {
             	$(this).closest("tr").find(".l1").val(0);

            }
            else if (v1 <1 )
    		{
    			$(this).closest("tr").find(".l1").val(v2);
    		}
    		else if(v2<1)
    		{
    			$(this).closest("tr").find(".l1").val(v1);
			}
			else
			{
          		var v3=parseInt(v1)+parseInt(v2);
  				$(this).closest("tr").find(".l1").val(v3);
  			}


        });

    });	


 	$(document).ready(function(){
		$('.s1').keyup(function(){

            var v1=$(this).val();
            var v2=$(this).closest("tr").find(".s2").val();
             if(v1<1 && v2<1)
            {
             	$(this).closest("tr").find(".l1").val(0);

            }
            else if (v1 <1 )
    		{
    			$(this).closest("tr").find(".l1").val(v2);
    		}
    		else if(v2<1)
    		{
    			$(this).closest("tr").find(".l1").val(v1);
			}
			else
			{
          		var v3=parseInt(v1)+parseInt(v2);
  				$(this).closest("tr").find(".l1").val(v3);
  			}


        });

	});

   </script>
   
   <div align="center" style="background: skyblue;height: 100px;padding: 20px;border-radius: 75px;">

		<label style="font-size: 25px">
			<input type="radio"  id="radio2" name="tariff" value="by_room" onclick="window.location='rooms.php';" checked="true"><b>Create Room</b>&emsp;

			<input type="radio"  id="radio2" name="tariff" value="by_room" onclick="window.location='Tariff.php';"><b>Tariff</b>&emsp;

			<input type="radio"  id="radio3" name="update_tariff" value="" onclick="window.location='Update_tariff.php';"><b>Update Tariff</b>
		</label>
		</div>


	</head>
	<body >
<div class="row">
	<div class="col-md-3">
		<br>
		<?php include 'sidebar.php' ?>
	</div>
<div class="col-md-9">
	<form action="" method="post">
		
		
			
		<br>
			
	<div id="div1">
		
		
		
		<table align="center" id="t1" width="800" cellpadding="15px" class="table-striped" cellspacing="5" style="background:#ff6f61;opacity: 0.8;">
			
			<tr>
				<td>Select the Property</td>
				<td><select name="property_id" style="width:215px;height: 35px;text-align: center;" >
					<option selected disabled>--select--</option>
					<?php
					
    					$query = "SELECT * FROM propertydetails where user_id='abhi' group by property_id";
    					$result = mysqli_query($con,$query);
    					while($row=mysqli_fetch_array($result)){                                                 
       					echo "<option value=".$row['property_id'].">".$row['property_name']."</option>";
    					}
					?>

					
				</select>
			<tr>
				<td>Room ID</td>
				<td><input type="text" name="room_id" style="width:215px"></td>
			</tr>
			<tr id="hidethis">
				<td>Room Name</td>
				<td><input type="text" id="room_name" name="room_name" style="width:215px" ="" value="<?php if(isset($_POST['room_name'])){echo htmlentities($_POST['room_name']);} ?>"></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea rows="3" cols="55" name="description" ="" ><?php if(isset($_POST['description'])){echo htmlentities($_POST['description']);} ?></textarea></td>
			</tr>
			<tr>
				<td>Min. Occupancy</td>
				<td><input type="number" name="min_occupancy" style="width:215px" value="1" =""></td>
			</tr>
			<tr>
				<td>Max. Occupancy</td>
				<td><input type="number" placeholder="Adult" name="max_occupancy_adult" style="width:215px" ="" value="<?php if(isset($_POST['max_occupancy_adult'])){echo htmlentities($_POST['max_occupancy_adult']);} ?>" >
					<input type="number" name="max_occupancy_child" placeholder="Children" style="width:215px" ="" value="<?php if(isset($_POST['max_occupancy_child'])){echo htmlentities($_POST['max_occupancy_child']);} ?>" >
				</td>
			</tr>
			<tr>
				<td>Tariff As</td>
				<td><input type="radio"  id="radio1" name="tariff" value="per_person" > Per Person&emsp;&emsp;

				<input type="radio"  id="radio2" name="tariff" value="by_room" > By Room

				</td>
			</tr>
			<tr>
				<td>Inventory</td>
				<td><input type="text" name="inventory" style="width:215px" ="" value="<?php if(isset($_POST['inventory'])){echo htmlentities($_POST['inventory']);} ?>"></td>
			</tr>

			<tr>
				<td>Meal Plan</td>
				<td>
					<select name="meal_plan" style="width:215px;height: 35px;text-align: center;" >
						<option selected disabled>--Select--</option>
						<option>EP</option>
						<option>CP</option>
						<option>MAP</option>
						<option>AP</option>
					</select>
				</td>
			</tr>

			<tr>
				<td>Status</td>
				<td>
					<select name="status" style="width:215px;height: 35px;text-align: center;" >
						<option selected disabled>--Select--</option>
						<option>Available</option>
						<option>Booked</option>
						<option>Pending</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td align="center" colspan="2"><input type="submit" name="save" value="  Save  " class="btn btn-success" >&emsp;
				 <a href="rooms.php" class="btn btn-success">Add New Room</a> &emsp;
				</td>
				
			</tr>
		</table>
	</div>
	<br>
	<br>
	<!-- <div id="div2" style="display: none;">
		<h4 align="center" class="text-muted"><b>PRICE CALANDER</b></h4><br>
		<table id="t2" align="center" class="table-striped" cellpadding="15px" width="800" cellspacing="10" style="background:#ff6f61;opacity: 0.8;">
			<tr >
				<td colspan="4" align="center" style="font-size: 15px"><b>Select the Room</b>
					<select name="rooms" style="width:250px;border-radius: 1rem;text-align: center;height: 35px" >
						<option disabled selected>--Select--</option>
						
					

					<?php
    					$query = "SELECT room_name FROM rooms";
    					$result = mysqli_query($con,$query);
    					while($row=mysqli_fetch_array($result)){                                                 
       					echo "<option>".$row['room_name']."</option>";
    					}
					?>
						</select>




				</td>
			</tr>
			<tr style="text-align:center;" >
				<th></th>
				<th>Price</th>
				<th>Tax</th>
				<th>Total</th>
			</tr>
			
			<tr id="1">
				<td>Single</td>
				<td><input type="text" name=""  id="s1" class="s1"/></td>
				<td><input type="text" name="" id="s2" class="s2" /></td>
				<td><input type="text" name="trp1" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="2">
				<td>Double</td>
				<td><input type="text" name="" id="d1" class="s1" /></td>
				<td><input type="text" name=""id="d2" class="s2" /></td>
				<td><input type="text" name="trp2" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="3">
				<td>Triple</td>
				<td><input type="text" name="" class="s1" id="" /></td>
				<td><input type="text" name="" class="s2" id="" /></td>
				<td><input type="text" name="trp3" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="4">
				<td>Person 4</td>
				<td><input type="text" name="" class="s1" id="p41"/></td>
				<td><input type="text" name="" class="s2" id="p42" /></td>
				<td><input type="text" name="trp4" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="5">
				<td>Person 5</td>
				<td><input type="text" name="" class="s1" id="p51" /></td>
				<td><input type="text" name="" class="s2" id="p52" /></td>
				<td><input type="text" name="trp5" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="6">
				<td>Person 6</td>
				<td><input type="text" name="" id="p61" class="s1"/></td>
				<td><input type="text" name="" id="p62" class="s2"/></td>
				<td><input type="text" name="trp6" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="7">
				<td>Person 7</td>
				<td><input type="text" name="" id="p71" class="s1"/></td>
				<td><input type="text" name="" id="p72" class="s2"/></td>
				<td><input type="text" name="trp7" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="8">
				<td>Person 8</td>
				<td><input type="text" name="" id="p81" class="s1"/></td>
				<td><input type="text" name="" id="p82" class="s2"/></td>
				<td><input type="text" name="trp8" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="9">
				<td>Person 9</td>
				<td><input type="text" name="" id="p91" class="s1"/></td>
				<td><input type="text" name="" id="p92" class="s2"/></td>
				<td><input type="text" name="trp9" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="10">
				<td>Person 10</td>
				<td><input type="text" name="" id="p101" class="s1"/></td>
				<td><input type="text" name="" id="p102" class="s2"/></td>
				<td><input type="text" name="trp10" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="11">
				<td>Person 11</td>
				<td><input type="text" name="" id="p111" class="s1"/></td>
				<td><input type="text" name="" id="p112" class="s2"/></td>
				<td><input type="text" name="trp11" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="12">
				<td>Person 12</td>
				<td><input type="text" name="" id="p121" class="s1"/></td>
				<td><input type="text" name="" id="p122" class="s2"/></td>
				<td><input type="text" name="trp12" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="13">
				<td>Person 13</td>
				<td><input type="text" name="" id="p131" class="s1"/></td>
				<td><input type="text" name="" id="p132" class="s2"/></td>
				<td><input type="text" name="trp13" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="14">
				<td>Person 14</td>
				<td><input type="text" name="" id="p141" class="s1"/></td>
				<td><input type="text" name="" id="p142" class="s2"/></td>
				<td><input type="text" name="trp14" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="15">
				<td>Person 15</td>
				<td><input type="text" name="" id="p151" class="s1"/></td>
				<td><input type="text" name="" id="p152" class="s2"/></td>
				<td><input type="text" name="trp15" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>



			<tr>
				<td>Extra Person</td>
				<td><input type="text" name="stxt" class="s1" id="ep1"/></td>
				<td><input type="text" name="stxt" class="s2" id="ep2"/></td>
				<td><input type="text" name="extraperson" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr>
				<td>Extra Child</td>
				<td><input type="text" name="stxt" class="s1" id="ec1"/></td>
				<td><input type="text" name="ectxt" class="s2" id="ec2"/></td>
				<td><input type="text" name="extrachild" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr>
				<td>Infant</td>
				<td><input type="text" name="stxt" class="s1" id="i1"/></td>
				<td><input type="text" name="itxt" class="s2" id="i2"/></td>
				<td><input type="text" name="infant" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>


			<tr>
				<td colspan="4" align="center"><input type="submit" name="csave" id="csave" value="  save  " class="btn btn-success"></td>
			</tr>
		<tr>

			<td colspan="2" align="center"><?php if(isset($_POST['save'])){ 
			//echo "<script>
					//
					//document.getElementById('div2').focus(); 
				//</script>";

			} 
			?>
				
			</td>


		</tr>


		</table>
	</div>
-->






</form>
</div>
</div>
</body>



</html>

<?php
if (isset($_POST['save'])) 
{

	echo "<script>

	document.getElementById('div2').style.display = 'block';
	document.getElementById('csave').focus();
	
	</script>";


for ($i=1; $i <=15 ; $i++) { 
	if($max_occupancy<=$i)
		{
			
	echo "<script>
			document.getElementById($i+1).style.display = 'none';
			
			</script>";
		}
	
}


}

?>


<?php
if(isset($_POST['pricing']))
{

	echo "<script>

	document.getElementById('div2').style.display = 'block';
	document.getElementById('csave').focus();
	
	</script>";
}
?>
