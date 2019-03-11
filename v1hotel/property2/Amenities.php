<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>

      
<?php 
	include 'propertymenus.php';
	include 'Property_DB.php';

/*inserting the amenities to database -->*/

	if (isset($_POST['save'])) 
	{
		$p=$_POST['property'];
		if(isset($_POST['am']))
		{
			foreach ($_POST['am'] as $a ) 
			{
				mysqli_query($con,"insert into amenities(property_id,amenities) values('".$_POST['property']."','$a')") or die(mysqli_error($con));

			}
			
		}
		echo "<script>alert('Amenities Updated to your Property');</script>";
		

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Amenities</title>
</head>
<body>
	<div class="row">
		<div class="col-md-3">
			<br><br>
			<?php include 'sidebar.php' ?>
		</div>
		<div class="col-md-9 mt-5">

		
			<form action="" method="post">		
				<table align="center" width="1000px" cellpadding="5"  class="table-striped" cellspacing="5" style="opacity: 0.8;">
					<tr>
						<td align="center" colspan="4">
							Select Property
						</td>
							<td colspan="4">

								<select name="property" id="property" onchange="" class="col-sm-6 form-control form-control-lg-5" style="border-radius: 1rem;text-align: center;height: 35px" required>
				                      <option selected disabled>--Select--</option>
				                          <?php
				                              $query = "SELECT * FROM propertydetails where user_id='abhi' group by property_id";
				                              $result = mysqli_query($con,$query);
				                              while($row=mysqli_fetch_array($result)){                                                 
				                                echo "<option value=".$row['property_id'].">".$row['property_name']."</option>";
				                              }
				                          ?>

				                </select>
							</td>
					</tr>
				</table>
				
				<div id="MyDiv">
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
				<td>Baby sitting</td>
				<td><input type="checkbox" name="am[]" value="Baby sitting"> </td>
				<td>Bus Parking</td>
				<td><input type="checkbox" name="am[]" value="Bus Parking" ></td>
				<td>Laundry/Valet Services</td>
				<td><input type="checkbox"  name="am[]" value="Laundry/Valet Services"></td>
				<td>Body Treatments</td>
				<td><input type="checkbox"  name="am[]" value="Body Treatments"></td>
			</tr>
			<tr>
				<td>Bay View</td>
				<td><input type="checkbox" name="am[]" value="Bay View"></td>
				<td>24-Hour Security</td>
				<td><input type="checkbox" name="am[]" value="24-Hour Security"></td>
				<td>Boutique</td>
				<td><input type="checkbox" name="am[]" value="Boutique"></td>
				<td>Beauty salon</td>
				<td><input type="checkbox" name="am[]" value="Beauty salon"></td>
			</tr>
			<tr>
				<td>Hair dryer</td>
				<td><input type="checkbox" name="am[]" value="Hair dryer"></td>
				<td>Catering Services</td>
				<td><input type="checkbox" name="am[]" value="Catering Services"></td>
				<td>Interconnecting Room</td>
				<td><input type="checkbox" name="am[]" value="Interconnecting Room"></td>
				<td>24-Hour Security</td>
				<td><input type="checkbox" name="am[]" value="24-Hour Security"></td>
			</tr>
			<tr>
				<td>Safe</td>
				<td><input type="checkbox" name="am[]" value="Safe"></td>
				<td>Free Parking</td>
				<td><input type="checkbox" name="am[]" value="Free Parking"></td>
				<td>Complimentary Breakfast</td>
				<td><input type="checkbox" name="am[]" value="Complimentary Breakfast"></td>
				<td>Business services</td>
				<td><input type="checkbox" name="am[]" value="Business services"></td>
			</tr>
			<tr>
				<td>Weighing Machine</td>
				<td><input type="checkbox" name="am[]" value="Weighing Machine"></td>
				<td>Outdoor Swimming Pool</td>
				<td><input type="checkbox" name="am[]" value="Outdoor Swimming Pool"></td>
				<td>LCD/Projector</td>
				<td><input type="checkbox" name="am[]" value="LCD/Projector"></td>
				<td>Doctor on call</td>
				<td><input type="checkbox" name="am[]" value="Doctor on call"></td>
			</tr>
			<tr>
				<td>Doctor on call</td>
				<td><input type="checkbox" name="am[]" value="Doctor on call"></td>
				<td>Housekeeping-Daily</td>
				<td><input type="checkbox" name="am[]" value="Housekeeping-Daily"></td>
				<td>Color television</td>
				<td><input type="checkbox" name="am[]" value="Color television"></td>
				<td>Nightclub</td>
				<td><input type="checkbox" name="am[]" value="Nightclub"></td>
			</tr>
			<tr>
				<td>Bath Tub</td>
				<td><input type="checkbox" name="am[]" value="Bath Tub"></td>
				<td>24-hour front desk</td>
				<td><input type="checkbox" name="am[]" value="24-hour front desk"></td>
				<td>Adjoining Room</td>
				<td><input type="checkbox" name="am[]" value="Adjoining Room"></td>
				<td>Pets allowed</td>
				<td><input type="checkbox" name="am[]" value="Pets allowed"></td>
			</tr>
			
			<tr>
				<td>Express Check Out</td>
				<td><input type="checkbox" name="am[]" value="Adjoining Room"></td>
				<td>Non-smoking rooms</td>
				<td><input type="checkbox" name="am[]" value="Non-smoking rooms"></td>
				<td>Internet access</td>
				<td><input type="checkbox" name="am[]" value="Internet access"></td>
				<td>Slippers</td>
				<td><input type="checkbox" name="am[]" value="Slippers"></td>
			</tr>
			<tr>
				<td>Female Traveler Room </td>
				<td><input type="checkbox" name="am[]" value="Female Traveler Room "></td>
				<td>Carpeted Floor</td>
				<td><input type="checkbox" name="am[]" value="Carpeted Floor"></td>
				<td>Balcony</td>
				<td><input type="checkbox" name="am[]" value="Balcony"></td>
				<td>ATM/Cash machine</td>
				<td><input type="checkbox" name="am[]" value="ATM/Cash machine"></td>
			</tr>
			
			<tr>
				<td>Free Newspaper</td>
				<td><input type="checkbox" name="am[]" value="Free Newspaper"></td>
				<td>Heated Pool</td>
				<td><input type="checkbox" name="am[]" value="Heated Pool"></td>
				<td>24-hour room service</td>
				<td><input type="checkbox" name="am[]" value="24-hour room service"></td>
				<td>Air conditioning</td>
				<td><input type="checkbox" name="am[]" value="Air conditioning"></td>
			</tr>
			<tr>
				<td>Bathrobe</td>
				<td><input type="checkbox" name="am[]" value="Bathrobe"></td>
				<td>Gym</td>
				<td><input type="checkbox" name="am[]" value="Gym"></td>
				<td>Bedside lamp</td>
				<td><input type="checkbox" name="am[]" value="Bedside lamp"></td>
				<td>Laundry </td>
				<td><input type="checkbox" name="am[]" value="Laundry"></td>
			</tr>
			<tr>
				<td>Complimentary cookies</td>
				<td><input type="checkbox" name="am[]" value="Complimentary cookies"></td>
				<td>Minibar</td>
				<td><input type="checkbox" name="am[]" value="Minibar"></td>
				<td>DVD Player</td>
				<td><input type="checkbox" name="am[]" value="DVD Player"></td>
				<td>Express Laundry Service</td>
				<td><input type="checkbox" name="am[]" value="Express Laundry Service"></td>
			</tr>
			<tr>
				<td>Ceiling Fan</td>
				<td><input type="checkbox" name="am[]" value=""></td>
				<td>Disabled Features</td>
				<td><input type="checkbox" name="am[]" value="Disabled Features"></td>
				<td>Luggage space</td>
				<td><input type="checkbox" name="am[]" value="Luggage space"></td>
				<td>Tea/Coffee Maker</td>
				<td><input type="checkbox" name="am[]" value="Tea/Coffee Maker"></td>
			</tr>
			<tr>
				<td>Direct Dialing</td>
				<td><input type="checkbox" name="am[]" value="Direct Dialing"></td>
				<td>Marble flooring</td>
				<td><input type="checkbox" name="am[]" value="Marble flooring"></td>
				<td>Parallel phone line in bathroom </td>
				<td><input type="checkbox" name="am[]" value="Parallel phone line in bathroom "></td>
				<td>Satellite TV</td>
				<td><input type="checkbox" name="am[]" value="Satellite TV"></td>
			</tr>
			<tr>
				<td>Ironing Board</td>
				<td><input type="checkbox" name="am[]" value="Ironing Board"></td>
				<td>Wooden flooring</td>
				<td><input type="checkbox" name="am[]" value="Wooden flooring"></td>
				<td>Writing DeskInternet</td>
				<td><input type="checkbox" name="am[]" value="Writing DeskInternet"></td>
				<td>Conference facilities</td>
				<td><input type="checkbox" name="am[]" value="Conference facilities"></td>
			</tr>
			<tr>
				<td>Self-lit shaving mirror</td>
				<td><input type="checkbox" name="am[]" value="Self-lit shaving mirror"></td>
				<td>Porters</td>
				<td><input type="checkbox" name="am[]" value="Porters"></td>
				<td>Complimentary Wi-Fi access</td>
				<td><input type="checkbox" name="am[]" value="Complimentary Wi-Fi access"></td>
				<td>Indoor Game</td>
				<td><input type="checkbox" name="am[]" value="Indoor Game"></td>
			</tr>
			<tr>
				<td>In-room Menu</td>
				<td><input type="checkbox" name="am[]" value="In-room Menu"></td>
				<td>Swimming Pool</td>
				<td><input type="checkbox" name="am[]" value="Swimming Pool"></td>
				<td>Phone Service</td>
				<td><input type="checkbox" name="am[]" value="Phone Service"></td>
				<td>Convention centre</td>
				<td><input type="checkbox" name="am[]" value="Convention centre"></td>
			</tr>
			<tr>
				<td>Windows Open</td>
				<td><input type="checkbox" name="am[]" value="Windows Open"></td>
				<td>Pool Snack Bar</td>
				<td><input type="checkbox" name="am[]" value="Pool Snack Bar"></td>
				<td>Shopping Arcade</td>
				<td><input type="checkbox" name="am[]" value="Shopping Arcade"></td>
				<td>Free Transportation</td>
				<td><input type="checkbox" name="am[]" value="Free Transportation"></td>
			</tr>
			<tr>
				<td>Welcome Drink</td>
				<td><input type="checkbox" name="am[]" value="Welcome Drink"></td>
				<td>Disco</td>
				<td><input type="checkbox" name="am[]" value="Disco"></td>
				<td>Video Game Player</td>
				<td><input type="checkbox" name="am[]" value="Video Game Player"></td>
				<td>Steam Bath</td>
				<td><input type="checkbox" name="am[]" value="Steam Bath"></td>
			</tr>
			<tr>
				<td>Hangers</td>
				<td><input type="checkbox" name="am[]" value="Hangers"></td>
				<td>Meeting facilities</td>
				<td><input type="checkbox" name="am[]" value="Meeting facilities"></td>
				<td>Table lamp</td>
				<td><input type="checkbox" name="am[]" value="Table lamp"></td>
				<td>Vending Machines</td>
				<td><input type="checkbox" name="am[]" value="Vending Machines"></td>
			</tr>
			
			
			<tr>
				<td colspan="6" align="center">
					<input type="submit" name="save" value="Save" class="btn btn-success" style="border-radius: 2.0em;width:150px"></td>
			</tr>
	</table>
				</div>
			 
			</form>
		</div>
	</div>
</body>
</html>

<!--Get the amenities from get_amenities.php page using jquery-->

<script>
	//var path="get_amenities.php?p=";
	//$('#MyDiv').load(path);
$(document).ready(function(){
	
    $('#property').change(function()
    {
		var id=$(this).val();
    	var path="get_amenities.php?p="+id;
        $('#MyDiv').load(path);              

    });

});    
</script>


<script type="text/javascript">

	//document.getElementById('property').value=<?php echo $_POST['property']; ?>
	
</script>

 

 <!--Keep the selected in combo box item and selected check box state by redirecting after form submit --> 

<?php
if(isset($_POST['save']))
{

echo "<script>
document.getElementById('property').value='$_POST[property]';
var id=document.getElementById('property').value;

var path='get_amenities.php?p='+id;
        $('#MyDiv').load(path);
</script>";

}
?>