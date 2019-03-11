<?php

include 'Property_DB.php';

$query=mysqli_query($con,"select * from policies where property_id='$_REQUEST[p]'");
$row=mysqli_fetch_array($query);

	if($row['property_id']==$_REQUEST['p'])
	{
		$pcheck='';
		$pcheck1='';
		if($row['pets_allowed']=='yes')
		{
			$pcheck='checked';
			
		}
		else if($row['pets_allowed']=='no')
		{
			$pcheck1='checked';
			
		}

		$ccheck='';
		$ccheck1='';
		if($row['couple_friendly']=='yes')
		{
			$ccheck='checked';
			
		}
		else if($row['couple_friendly']=='no')
		{
			$ccheck1='checked';
			
		}

		$childcheck='';
		$childcheck1='';
		if($row['suitable_for_children']=='yes')
		{
			$childcheck='checked';
			
		}
		else if($row['suitable_for_children']=='no')
		{
			$childcheck1='checked';
			
		}

		$bcheck='';
		$bcheck1='';
		if($row['bachulars_allowed']=='yes')
		{
			$bcheck='checked';
			
		}
		else if($row['bachulars_allowed']=='no')
		{
			$bcheck1='checked';
			
		}
	echo '<table align="center" width="1000px"  cellpadding="5" class="table-striped" cellspacing="10" style="opacity: 0.8;">
						<tr>
							<td align="center" colspan="2" style="background:#f15025;padding-top: .4em;padding-bottom: .4em;font-size: 20px;"><b>Policies Information<b>
							</td>
						</tr>
						<tr>
							<td align="center">Cancellation Policy</td>
							<td><textarea name="cancel_policy" id="p" required="" style="border-radius: 1rem;" cols="55" rows="3">'.$row['cancel_policy'].'</textarea>
							</td>

						</tr>
						<tr>
							<td align="center">Refund Policy</td>
							<td><textarea name="refund_policy" required="" style="border-radius: 1rem;" cols="55" rows="3">'.$row['refund_policy'].'</textarea></td>
						</tr>
						<tr>
							<td align="center">Child Policy</td>
							<td><textarea name="child_policy" required="" style="border-radius: 1rem;" cols="55" rows="3">'.$row['child_policy'].'</textarea></td>
						</tr>
						<tr>
							<td align="center">Damage Policy</td>
							<td><textarea name="damage_policy" required="" style="border-radius: 1rem;" cols="55" rows="3">'.$row['damage_policy'].'</textarea></td>
						</tr>
						<tr>
							<td align="center">Property Restriction</td>
							<td><textarea name="property_restriction" required="" style="border-radius: 1rem;" cols="55" rows="3">'.$row['property_restriction'].'</textarea></td>
						</tr>
						<tr>
							<td align="center" >
								Pets Allowed 
							</td>

							<td >
								<input type="radio" name="pets" value="yes" '.$pcheck.'>yes&emsp;<input type="radio" name="pets" value="no" '.$pcheck1.'>no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td align="center" >
								Couple Friendly
							</td>
							<td >
								<input type="radio" name="couple" value="yes" '.$ccheck.'>yes&emsp;<input type="radio" name="couple" value="no" '.$ccheck1.'>no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td align="center" >
								Suitable for Children
							</td>
							<td >
								<input type="radio" name="children" value="yes" '.$childcheck.'>yes&emsp;<input type="radio" name="children" value="no" '.$childcheck1.'>no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td align="center" >
								Bachelors Allowed 
							</td>
							<td >
								<input type="radio" name="bachulars" value="yes" '.$bcheck.'>yes&emsp;<input type="radio" name="bachulars" value="no" '.$bcheck1.'>no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center" style="padding-top: .5em;padding-bottom: .4em;"><input type="Submit" name="submit" class="btn btn-success" value="Save" style="border-radius: 1rem;width:150px"></td>
						</tr>
						</table>';
					}
					else
					{
						echo '	<table align="center" width="1000px"  cellpadding="5" class="table-striped" cellspacing="10" style="opacity: 0.8;">
						<tr>
							<td align="center" colspan="2" style="background:#f15025;padding-top: .4em;padding-bottom: .4em;font-size: 20px;"><b>Policies Information<b>
							</td>
						</tr>
						<tr>
							<td align="center">Cancellation Policy</td>
							<td><textarea name="cancel_policy" required="" style="border-radius: 1rem;" cols="55" rows="3"></textarea>
							</td>

						</tr>
						<tr>
							<td align="center">Refund Policy</td>
							<td><textarea name="refund_policy" required="" style="border-radius: 1rem;" cols="55" rows="3"></textarea></td>
						</tr>
						<tr>
							<td align="center">Child Policy</td>
							<td><textarea name="child_policy" required="" style="border-radius: 1rem;" cols="55" rows="3"></textarea></td>
						</tr>
						<tr>
							<td align="center">Damage Policy</td>
							<td><textarea name="damage_policy" required="" style="border-radius: 1rem;" cols="55" rows="3"></textarea></td>
						</tr>
						<tr>
							<td align="center">Property Restriction</td>
							<td><textarea name="property_restriction" required="" style="border-radius: 1rem;" cols="55" rows="3"></textarea></td>
						</tr>
						<tr>
							<td align="center" >
								Pets Allowed 
							</td>
							<td >
								<input type="radio" name="pets" value="yes">yes&emsp;<input type="radio" name="pets" value="no">no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td align="center" >
								Couple Friendly
							</td>
							<td >
								<input type="radio" name="couple" value="yes">yes&emsp;<input type="radio" name="couple" value="no">no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td align="center" >
								Suitable for Children
							</td>
							<td >
								<input type="radio" name="children" value="yes">yes&emsp;<input type="radio" name="children" value="no">no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td align="center" >
								Bachelors Allowed 
							</td>
							<td >
								<input type="radio" name="bachulars" value="yes">yes&emsp;<input type="radio" name="bachulars" value="no">no
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center" style="padding-top: .5em;padding-bottom: .4em;"><input type="Submit" name="submit" class="btn btn-success" value="Save" style="border-radius: 1rem;width:150px"></td>
						</tr>
						</table>';
				
			}
		

?>


				