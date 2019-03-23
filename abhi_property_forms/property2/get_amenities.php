 <?php                          
 	require_once('Property_DB.php');
	$pid=$_REQUEST['p'];
?>

<table align="center" width="1000px" cellpadding="5" class="table-striped" cellspacing="5"   style="opacity: 0.8;">
		
			<tr style="background:#f15025;font-size: 15px;text-align: center;">
				<th colspan="8">Amenities</th>
			</tr>
			<tr style="background:#f15025;font-size: 15px;text-align: center;">
				<th>Featurers</th>
				<th>Select</th>
				<th>Featurers</th>
				<th>Select</th>
				<th>Featurers</th>
				<th>Select</th>
				<th>Featurers</th>
				<th>Select</th>
			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Baby sitting' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Baby sitting")
					{?>
							<td>Baby sitting</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Baby sitting" checked <?php if(isset($_POST['save'])){
				 foreach ($_POST['am2'] as $a ) 
			{
				if($a=="Baby sitting")
				echo "checked";
			} 
		}?>> </td>
					<?php }
					else
						{?>
				<td>Baby sitting</td>
				<td><input type="checkbox" name="am[]" value="Baby sitting" <?php if(isset($_POST['save'])){
				 foreach ($_POST['am'] as $a ) 
			{
				if($a=="Baby sitting")
				echo "checked";
			} 
		}?> > </td>
			<?php } ?>


				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Bus Parking' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Bus Parking")
					{?>
							<td>Bus Parking</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Bus Parking" checked> </td>
					<?php }
					else
						{?>
				<td>Bus Parking</td>
				<td><input type="checkbox" name="am[]" value="Bus Parking"> </td>
			<?php } ?>



			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Laundry/Valet Services' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Laundry/Valet Services")
					{?>
							<td>Laundry/Valet Services</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Laundry/Valet Services" checked> </td>
					<?php }
					else
						{?>
				<td>Laundry/Valet Services</td>
				<td><input type="checkbox" name="am[]" value="Laundry/Valet Services"> </td>
			<?php } ?>

			
			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Body Treatments' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Body Treatments")
					{?>
							<td>Laundry/Valet Services</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Body Treatments" checked> </td>
					<?php }
					else
						{?>
				<td>Laundry/Valet Services</td>
				<td><input type="checkbox" name="am[]" value="Body Treatments"> </td>
			<?php } ?>


				
				
			</tr>
			<tr>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Bay View' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Bay View")
					{?>
							<td>Bay View</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Bay View" checked> </td>
					<?php }
					else
						{?>
				<td>Bay View</td>
				<td><input type="checkbox" name="am[]" value="Bay View"> </td>
			<?php } ?>



				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='24-Hour Security' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="24-Hour Security")
					{?>
							<td>24-Hour Security</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="24-Hour Security" checked> </td>
					<?php }
					else
						{?>
				<td>Laundry/Valet Services</td>
				<td><input type="checkbox" name="am[]" value="24-Hour Security"> </td>
			<?php } ?>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Boutique' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Boutique")
					{?>
							<td>Boutique</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Boutique" checked> </td>
					<?php }
					else
						{?>
				<td>Boutique</td>
				<td><input type="checkbox" name="am[]" value="Boutique"> </td>
			<?php } ?>


			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Beauty salon' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Beauty salon")
					{?>
							<td>Beauty salon</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Beauty salon" checked> </td>
					<?php }
					else
						{?>
				<td>Beauty salon</td>
				<td><input type="checkbox" name="am[]" value="Beauty salon"> </td>
			<?php } ?>



			
			</tr>
			<tr>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Hair dryer' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Hair dryer")
					{?>
							<td>Hair dryer</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Hair dryer" checked> </td>
					<?php }
					else
						{?>
				<td>Hair dryer</td>
				<td><input type="checkbox" name="am[]" value="Hair dryer"> </td>
			<?php } ?>


			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Catering Services' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Catering Services")
					{?>
							<td>Catering Services</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Catering Services" checked> </td>
					<?php }
					else
						{?>
				<td>Catering Services</td>
				<td><input type="checkbox" name="am[]" value="Catering Services"> </td>
			<?php } ?>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Interconnecting Room' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Interconnecting Room")
					{?>
							<td>Interconnecting Room</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Interconnecting Room" checked> </td>
					<?php }
					else
						{?>
				<td>Interconnecting Room</td>
				<td><input type="checkbox" name="am[]" value="Interconnecting Room"> </td>
			<?php } ?>

				
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='24-Hour Service' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="24-Hour Service")
					{?>
							<td>24-Hour Service</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="24-Hour Service" checked> </td>
					<?php }
					else
						{?>
				<td>24-Hour Service</td>
				<td><input type="checkbox" name="am[]" value="24-Hour Service"> </td>
			<?php } ?>
		
			</tr>
			<tr>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Safe' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Safe")
					{?>
							<td>Safe</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Safe" checked> </td>
					<?php }
					else
						{?>
				<td>Safe</td>
				<td><input type="checkbox" name="am[]" value="Safe"> </td>
			<?php } ?>
				
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Free Parking' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Free Parking")
					{?>
							<td>Free Parking</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Free Parking" checked> </td>
					<?php }
					else
						{?>
				<td>Free Parking</td>
				<td><input type="checkbox" name="am[]" value="Free Parking"> </td>
			<?php } ?>
				
			
			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Complimentary Breakfast' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Complimentary Breakfast")
					{?>
							<td>Complimentary Breakfast</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Complimentary Breakfast" checked> </td>
					<?php }
					else
						{?>
				<td>Complimentary Breakfast</td>
				<td><input type="checkbox" name="am[]" value="Complimentary Breakfast"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Business services' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Business services")
					{?>
							<td>Business services</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Business services" checked> </td>
					<?php }
					else
						{?>
				<td>Business services</td>
				<td><input type="checkbox" name="am[]" value="Business services"> </td>
			<?php } ?>

			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Weighing Machine' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Weighing Machine")
					{?>
							<td>Weighing Machine</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Weighing Machine" checked> </td>
					<?php }
					else
						{?>
				<td>Weighing Machine</td>
				<td><input type="checkbox" name="am[]" value="Weighing Machine"> </td>
			<?php } ?>
				
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Outdoor Swimming Pool' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Outdoor Swimming Pool")
					{?>
							<td>Outdoor Swimming Pool</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Outdoor Swimming Pool" checked> </td>
					<?php }
					else
						{?>
				<td>Outdoor Swimming Pool</td>
				<td><input type="checkbox" name="am[]" value="Outdoor Swimming Pool"> </td>
			<?php } ?>


				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='LCD/Projector' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="LCD/Projector")
					{?>
							<td>LCD/Projector</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="LCD/Projector" checked> </td>
					<?php }
					else
						{?>
				<td>LCD/Projector</td>
				<td><input type="checkbox" name="am[]" value="LCD/Projector"> </td>
			<?php } ?>

				
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Bedside controls panel for ligh' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Bedside controls panel for ligh")
					{?>
							<td>Bedside controls panel for ligh</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Bedside controls panel for ligh" checked> </td>
					<?php }
					else
						{?>
				<td>Bedside controls panel for ligh</td>
				<td><input type="checkbox" name="am[]" value="Bedside controls panel for ligh"> </td>
			<?php } ?>

			</tr>
			<tr>
				<?php 
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Doctor on call'";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Doctor on call")
					{?>
							<td>Doctor on call</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Doctor on call" checked> </td>
				<?php }
					else
						{?>
				<td>Doctor on call</td>
				<td><input type="checkbox" name="am[]" value="Doctor on call"> </td>
			<?php } ?>
				
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Housekeeping-Daily' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Housekeeping-Daily")
					{?>
							<td>Housekeeping-Daily</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Housekeeping-Daily" checked> </td>
					<?php }
					else
						{?>
				<td>Housekeeping-Daily</td>
				<td><input type="checkbox" name="am[]" value="Housekeeping-Daily"> </td>
			<?php } ?>

				
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Color television' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Color television")
					{?>
							<td>Color television</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Color television" checked> </td>
					<?php }
					else
						{?>
				<td>Color television</td>
				<td><input type="checkbox" name="am[]" value="Color television"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Nightclub' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Nightclub")
					{?>
							<td>Nightclub</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Nightclub" checked> </td>
					<?php }
					else
						{?>
				<td>Nightclub</td>
				<td><input type="checkbox" name="am[]" value="Nightclub"> </td>
			<?php } ?>

			</tr>
			<tr>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Bath Tub' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Bath Tub")
					{?>
							<td>Bath Tub</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Bath Tub" checked> </td>
					<?php }
					else
						{?>
				<td>Bath Tub</td>
				<td><input type="checkbox" name="am[]" value="Bath Tub"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='24-hour front desk' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="24-hour front desk")
					{?>
							<td>24-hour front desk</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="24-hour front desk" checked> </td>
					<?php }
					else
						{?>
				<td>24-hour front desk</td>
				<td><input type="checkbox" name="am[]" value="24-hour front desk"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Adjoining Room' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Adjoining Room")
					{?>
							<td>Adjoining Room</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Adjoining Room" checked> </td>
					<?php }
					else
						{?>
				<td>Adjoining Room</td>
				<td><input type="checkbox" name="am[]" value="Adjoining Room"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Pets allowed' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Pets allowed")
					{?>
							<td>Pets allowed</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Pets allowed" checked> </td>
					<?php }
					else
						{?>
				<td>Pets allowed</td>
				<td><input type="checkbox" name="am[]" value="Pets allowed"> </td>
			<?php } ?>
				
			</tr>
			
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Express Check Out' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Express Check Out")
					{?>
							<td>Express Check Out</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Express Check Out" checked> </td>
					<?php }
					else
						{?>
				<td>Express Check Out</td>
				<td><input type="checkbox" name="am[]" value="Express Check Out"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Non-smoking rooms' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Non-smoking rooms")
					{?>
							<td>Non-smoking rooms</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Non-smoking rooms" checked> </td>
					<?php }
					else
						{?>
				<td>Non-smoking rooms</td>
				<td><input type="checkbox" name="am[]" value="Non-smoking rooms"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Internet access' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Internet access")
					{?>
							<td>Internet access</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Internet access" checked> </td>
					<?php }
					else
						{?>
				<td>Internet access</td>
				<td><input type="checkbox" name="am[]" value="Internet access"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Slippers' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Slippers")
					{?>
							<td>Slippers</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Slippers" checked> </td>
					<?php }
					else
						{?>
				<td>Slippers</td>
				<td><input type="checkbox" name="am[]" value="Slippers"> </td>
			<?php } ?>
				
			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Female Traveler Room' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Female Traveler Room")
					{?>
							<td>Female Traveler Room</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Female Traveler Room" checked> </td>
					<?php }
					else
						{?>
				<td>Female Traveler Room</td>
				<td><input type="checkbox" name="am[]" value="Female Traveler Room"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Carpeted Floor' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Carpeted Floor")
					{?>
							<td>Carpeted Floor</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Carpeted Floor" checked> </td>
					<?php }
					else
						{?>
				<td>Carpeted Floor</td>
				<td><input type="checkbox" name="am[]" value="Carpeted Floor"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Balcony' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Balcony")
					{?>
							<td>Balcony</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Balcony" checked> </td>
					<?php }
					else
						{?>
				<td>Balcony</td>
				<td><input type="checkbox" name="am[]" value="Balcony"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='ATM/Cash machine' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="ATM/Cash machine")
					{?>
							<td>ATM/Cash machine</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="ATM/Cash machine" checked> </td>
					<?php }
					else
						{?>
				<td>ATM/Cash machine</td>
				<td><input type="checkbox" name="am[]" value="ATM/Cash machine"> </td>
			<?php } ?>

				
			</tr>
			
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Free Newspaper' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Free Newspaper")
					{?>
							<td>Free Newspaper</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Free Newspaper" checked> </td>
					<?php }
					else
						{?>
				<td>Free Newspaper</td>
				<td><input type="checkbox" name="am[]" value="Free Newspaper"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Heated Pool' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Heated Pool")
					{?>
							<td>Heated Pool</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Heated Pool" checked> </td>
					<?php }
					else
						{?>
				<td>Heated Pool</td>
				<td><input type="checkbox" name="am[]" value="Heated Pool"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='24-hour room service' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="24-hour room service")
					{?>
							<td>24-hour room service</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="24-hour room service" checked> </td>
					<?php }
					else
						{?>
				<td>24-hour room service</td>
				<td><input type="checkbox" name="am[]" value="24-hour room service"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Air conditioning' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Air conditioning")
					{?>
							<td>Air conditioning</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Air conditioning" checked> </td>
					<?php }
					else
						{?>
				<td>Air conditioning</td>
				<td><input type="checkbox" name="am[]" value="Air conditioning"> </td>
			<?php } ?>

				
			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Bathrobe' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Bathrobe")
					{?>
							<td>Bathrobe</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Bathrobe" checked> </td>
					<?php }
					else
						{?>
				<td>Bathrobe</td>
				<td><input type="checkbox" name="am[]" value="Bathrobe"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Gym' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Gym")
					{?>
							<td>Gym</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Gym" checked> </td>
					<?php }
					else
						{?>
				<td>Gym</td>
				<td><input type="checkbox" name="am[]" value="Gym"> </td>
			<?php } ?>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Bedside lamp' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Bedside lamp")
					{?>
							<td>Bedside lamp</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Bedside lamp" checked> </td>
					<?php }
					else
						{?>
				<td>Bedside lamp</td>
				<td><input type="checkbox" name="am[]" value="Bedside lamp"> </td>
			<?php } ?>
				
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Laundry' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Laundry")
					{?>
							<td>Laundry</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Laundry" checked> </td>
					<?php }
					else
						{?>
				<td>Laundry</td>
				<td><input type="checkbox" name="am[]" value="Laundry"> </td>
			<?php } ?>

			
			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Complimentary cookies' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Complimentary cookies")
					{?>
							<td>Complimentary cookies</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Complimentary cookies" checked> </td>
					<?php }
					else
						{?>
				<td>Complimentary cookies</td>
				<td><input type="checkbox" name="am[]" value="Complimentary cookies"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Minibar' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Minibar")
					{?>
							<td>Minibar</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Minibar" checked> </td>
					<?php }
					else
						{?>
				<td>Minibar</td>
				<td><input type="checkbox" name="am[]" value="Minibar"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='DVD Player' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="DVD Player")
					{?>
							<td>DVD Player</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="DVD Player" checked> </td>
					<?php }
					else
						{?>
				<td>DVD Player</td>
				<td><input type="checkbox" name="am[]" value="DVD Player"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Express Laundry Service' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Express Laundry Service")
					{?>
							<td>Express Laundry Service</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Express Laundry Service" checked> </td>
					<?php }
					else
						{?>
				<td>Express Laundry Service</td>
				<td><input type="checkbox" name="am[]" value="Express Laundry Service"> </td>
			<?php } ?>

				
			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Ceiling Fan' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Ceiling Fan")
					{?>
							<td>Ceiling Fan</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Ceiling Fan" checked> </td>
					<?php }
					else
						{?>
				<td>Ceiling Fan</td>
				<td><input type="checkbox" name="am[]" value="Ceiling Fan"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Disabled Features' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Disabled Features")
					{?>
							<td>Disabled Features</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Disabled Features" checked> </td>
					<?php }
					else
						{?>
				<td>Disabled Features</td>
				<td><input type="checkbox" name="am[]" value="Disabled Features"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Luggage space' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Luggage space")
					{?>
							<td>Luggage space</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Luggage space" checked> </td>
					<?php }
					else
						{?>
				<td>Luggage space</td>
				<td><input type="checkbox" name="am[]" value="Luggage space"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Tea/Coffee Maker' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Tea/Coffee Maker")
					{?>
							<td>Tea/Coffee Maker</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Tea/Coffee Maker" checked> </td>
					<?php }
					else
						{?>
				<td>Tea/Coffee Maker</td>
				<td><input type="checkbox" name="am[]" value="Tea/Coffee Maker"> </td>
			<?php } ?>

				
			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Direct Dialing' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Direct Dialing")
					{?>
							<td>Direct Dialing</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Direct Dialing" checked> </td>
					<?php }
					else
						{?>
				<td>Direct Dialing</td>
				<td><input type="checkbox" name="am[]" value="Direct Dialing"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Marble flooring' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Marble flooring")
					{?>
							<td>Marble flooring</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Marble flooring" checked> </td>
					<?php }
					else
						{?>
				<td>Marble flooring</td>
				<td><input type="checkbox" name="am[]" value="Marble flooring"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Parallel phone line in bathroom' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Parallel phone line in bathroom")
					{?>
							<td>Parallel phone line in bathroom</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Parallel phone line in bathroom" checked> </td>
					<?php }
					else
						{?>
				<td>Parallel phone line in bathroom</td>
				<td><input type="checkbox" name="am[]" value="Parallel phone line in bathroom"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Satellite TV' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Satellite TV")
					{?>
							<td>Satellite TV</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Satellite TV" checked> </td>
					<?php }
					else
						{?>
				<td>Satellite TV</td>
				<td><input type="checkbox" name="am[]" value="Satellite TV"> </td>
			<?php } ?>

		
			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Ironing Board' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Ironing Board")
					{?>
							<td>Ironing Board</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Ironing Board" checked> </td>
					<?php }
					else
						{?>
				<td>Ironing Board</td>
				<td><input type="checkbox" name="am[]" value="Ironing Board"> </td>
			<?php } ?>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Wooden flooring' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Wooden flooring")
					{?>
							<td>Wooden flooring</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Wooden flooring" checked> </td>
					<?php }
					else
						{?>
				<td>Wooden flooring</td>
				<td><input type="checkbox" name="am[]" value="Wooden flooring"> </td>
			<?php } ?>
				
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Writing DeskInternet' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Writing DeskInternet")
					{?>
							<td>Writing DeskInternet</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Writing DeskInternet" checked> </td>
					<?php }
					else
						{?>
				<td>Writing DeskInternet</td>
				<td><input type="checkbox" name="am[]" value="Writing DeskInternet"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Conference facilities' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Conference facilities")
					{?>
							<td>Conference facilities</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Conference facilities" checked> </td>
					<?php }
					else
						{?>
				<td>Conference facilities</td>
				<td><input type="checkbox" name="am[]" value="Conference facilities"> </td>
			<?php } ?>

			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Self-lit shaving mirror' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Self-lit shaving mirror")
					{?>
							<td>Self-lit shaving mirror</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Self-lit shaving mirror" checked> </td>
					<?php }
					else
						{?>
				<td>Self-lit shaving mirror</td>
				<td><input type="checkbox" name="am[]" value="Self-lit shaving mirror"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Porters' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Porters")
					{?>
							<td>Porters</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Porters" checked> </td>
					<?php }
					else
						{?>
				<td>Porters</td>
				<td><input type="checkbox" name="am[]" value="Porters"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Complimentary Wi-Fi access' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Complimentary Wi-Fi access")
					{?>
							<td>Complimentary Wi-Fi access</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Complimentary Wi-Fi access" checked> </td>
					<?php }
					else
						{?>
				<td>Complimentary Wi-Fi access</td>
				<td><input type="checkbox" name="am[]" value="Complimentary Wi-Fi access"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Indoor Game' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Indoor Game")
					{?>
							<td>Indoor Game</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Indoor Game" checked> </td>
					<?php }
					else
						{?>
				<td>Indoor Game</td>
				<td><input type="checkbox" name="am[]" value="Indoor Game"> </td>
			<?php } ?>

				
			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='In-room Menu' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="In-room Menu")
					{?>
							<td>In-room Menu</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="In-room Menu" checked> </td>
					<?php }
					else
						{?>
				<td>In-room Menu</td>
				<td><input type="checkbox" name="am[]" value="In-room Menu"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Valet Parking' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Valet Parking")
					{?>
							<td>Valet Parking</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Valet Parking" checked> </td>
					<?php }
					else
						{?>
				<td>Valet Parking</td>
				<td><input type="checkbox" name="am[]" value="Valet Parking"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Phone Service' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Phone Service")
					{?>
							<td>Phone Service</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Phone Service" checked> </td>
					<?php }
					else
						{?>
				<td>Phone Service</td>
				<td><input type="checkbox" name="am[]" value="Phone Service"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Convention centr' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Convention centr")
					{?>
							<td>Convention centr</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Convention centr" checked> </td>
					<?php }
					else
						{?>
				<td>Convention centr</td>
				<td><input type="checkbox" name="am[]" value="Convention centr"> </td>
			<?php } ?>
				
			</tr>
			<tr>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Windows Open' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Windows Open")
					{?>
							<td>Windows Open</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Windows Open" checked> </td>
					<?php }
					else
						{?>
				<td>Windows Open</td>
				<td><input type="checkbox" name="am[]" value="Windows Open"> </td>
			<?php } ?>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Pool Snack Bar' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Windows Open")
					{?>
							<td>Pool Snack Bar</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Pool Snack Bar" checked> </td>
					<?php }
					else
						{?>
				<td>Pool Snack Bar</td>
				<td><input type="checkbox" name="am[]" value="Pool Snack Bar"> </td>
			<?php } ?>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Shopping Arcade' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Shopping Arcade")
					{?>
							<td>Shopping Arcade</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Shopping Arcade" checked> </td>
					<?php }
					else
						{?>
				<td>Shopping Arcade</td>
				<td><input type="checkbox" name="am[]" value="Shopping Arcade"> </td>
			<?php } ?>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Free Transportation' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Free Transportation")
					{?>
							<td>Free Transportation</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Free Transportation" checked> </td>
					<?php }
					else
						{?>
				<td>Free Transportation</td>
				<td><input type="checkbox" name="am[]" value="Free Transportation"> </td>
			<?php } ?>

				
			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Welcome Drink' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Welcome Drink")
					{?>
							<td>Welcome Drink</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Welcome Drink" checked> </td>
					<?php }
					else
						{?>
				<td>Welcome Drink</td>
				<td><input type="checkbox" name="am[]" value="Welcome Drink"> </td>
			<?php } ?>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Disco' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Disco")
					{?>
							<td>Disco</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Disco" checked> </td>
					<?php }
					else
						{?>
				<td>Disco</td>
				<td><input type="checkbox" name="am[]" value="Disco"> </td>
			<?php } ?>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Video Game Player' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Video Game Player")
					{?>
							<td>Video Game Player</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Video Game Player" checked> </td>
					<?php }
					else
						{?>
				<td>Video Game Player</td>
				<td><input type="checkbox" name="am[]" value="Video Game Player"> </td>
			<?php } ?>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Steam Bath' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Steam Bath")
					{?>
							<td>Steam Bath</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Steam Bath" checked> </td>
					<?php }
					else
						{?>
				<td>Steam Bath</td>
				<td><input type="checkbox" name="am[]" value="Steam Bath"> </td>
			<?php } ?>


				
			</tr>
			<tr>
				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Hangers' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Hangers")
					{?>
							<td>Hangers</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Hangers" checked> </td>
					<?php }
					else
						{?>
				<td>Hangers</td>
				<td><input type="checkbox" name="am[]" value="Hangers"> </td>
			<?php } ?>
				
			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Meeting facilities' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Meeting facilities")
					{?>
							<td>Meeting facilities</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Meeting facilities" checked> </td>
					<?php }
					else
						{?>
				<td>Meeting facilities</td>
				<td><input type="checkbox" name="am[]" value="Meeting facilities"> </td>
			<?php } ?>

			<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Table lamp' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Table lamp")
					{?>
							<td>Table lamp</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Table lamp" checked> </td>
					<?php }
					else
						{?>
				<td>Table lamp</td>
				<td><input type="checkbox" name="am[]" value="Table lamp"> </td>
			<?php } ?>

				<?php  
					$query = "SELECT * FROM amenities where  property_id='$_REQUEST[p]' and amenities='Vending Machines' ";
					$list=mysqli_query($con,$query);
					$row=mysqli_fetch_array($list);

					if($row['amenities']=="Vending Machines")
					{?>
							<td>Vending Machines</td>
							<td><input type="checkbox" class="amm" name="am2[]" value="Vending Machines" checked> </td>
					<?php }
					else
						{?>
				<td>Vending Machines</td>
				<td><input type="checkbox" name="am[]" value="Vending Machines"> </td>
			<?php } ?>
				
			</tr>
			
		
		<tr>
			<td colspan="8" align="center">
			<input type="submit" name="save" value="Save" class="btn btn-success" style="border-radius: 2.0em;width:150px"></td>
		</tr>
	</table>

<script>
$(document).ready(function(){
	
    $('.amm').change(function()
    {
    	var r=confirm("Are you sure you want to remove this amenities");
    	if(r==true)
    	{
		var amt=$(this).val();
		var pid = <?php echo json_encode($pid); ?>;

		//alert(pid);
    	$.post('delete_amenity.php',{amet:amt,pid:pid},function(data){
    		
    	
    	}) ;    
    	$(this).attr('name','am[]');
    }
    else
    {
    	$(this).prop('checked','true');
    }
  


    });

});    
</script>

