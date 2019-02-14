
<?php include 'propertymenus.php';?>
	<html>
	<body>
	<form>
	<div>
		<br>
		<br>
		<h3 align="center" class="text-muted"><b>ROOMS AND INVENTORY RARRIF</b></h3>
		<br>
		<table align="center"  width="600" cellpadding="5" class="table-striped" cellspacing="5" style="background:#ff6f61;opacity: 0.8;">
			
			<tr>
				<td>Property ID</td>
				<td><select name="pid" style="width:215px;border-radius: 1rem;text-align: center;">
					<option>--select--</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select></td>
			</tr>
			<tr>
				<td>Room Name</td>
				<td><input type="text" name="rname" style="width:215px"></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea rows="3" cols="55"></textarea>
			</tr>
			<tr>
				<td>Min. Occupancy</td>
				<td><input type="number" name="minoccupancy" style="width:215px"></td>
			</tr>
			<tr>
				<td>Max. Occupancy</td>
				<td><input type="number" name="maxoccupancy" style="width:215px"></td>
			</tr>
			<tr>
				<td>Tariff As</td>
				<td><input type="tex" name="tariff" style="width:215px"></td>
			</tr>
			<tr>
				<td>Inventory</td>
				<td><input type="number" name="inventory" style="width:215px"></td>
			</tr>
			
			<tr><td>&emsp;&emsp;<input type="submit" name="save" value="  Save  " class="btn btn-success"></td>
				<td>&emsp;&emsp;<input type="submit" name="add" value="Add New Room" class="btn btn-success"></td>
			</tr>

		</table>
	</div>
	<br>
	<br>
	<div>
		<h4 align="center" class="text-muted"><b>PRICE CALANDER</b></h4><br>
		<table  align="center" class="table-striped" cellpadding="10" cellspacing="10" style="background:#ff6f61;opacity: 0.8;">
			<tr><td></td><th>Select the Room</th><td>
				<select name="rooms" style="width:150px;border-radius: 1rem;text-align: center;">
					<option disabled selected>--Select--</option>
					<option>Delux room</option>
					<option>AC room</option>
					<option>Non AC room</option>
				</select>
			</td>
			</tr>
			<tr>
				<th></th>
				<th>Price</th>
				<th>Tax</th>
				<th>Total</th>
			</tr>
			
			<tr>
				<td>Single</td><td><input type="text" name="stxt"/></td><td><input type="text" name="stxt"/></td><td><label style="width:150px">0</label></td>
			</tr>
			<tr>
				<td>Double</td><td><input type="text" name="stxt"/></td><td><input type="text" name="dtxt"/></td><td><label tyle="width:150px">0</label></td>
			</tr>
			<tr>
				<td>Triple</td><td><input type="text" name="stxt"/></td><td><input type="text" name="ttxt"/></td><td><label tyle="width:150px">0</label></td>
			</tr>
			<tr>
				<td>Person 4</td><td><input type="text" name="stxt"/></td><td><input type="text" name="p4txt"/></td><td><label tyle="width:150px">0</label></td>
			</tr>
			<tr>
				<td>Person 5</td><td><input type="text" name="stxt"/></td><td><input type="text" name="p5txt"/></td><td><label tyle="width:150px">0</label></td>
			</tr>
			<tr>
				<td>Extra Person</td><td><input type="text" name="stxt"/></td><td><input type="text" name="stxt"/></td><td><label tyle="width:150px">0</label></td>
			</tr>
			<tr>
				<td>Extra Child</td><td><input type="text" name="stxt"/></td><td><input type="text" name="ectxt"/></td><td><label tyle="width:150px">0</label></td>
			</tr>
			<tr>
				<td>Infant</td><td><input type="text" name="stxt"/></td><td><input type="text" name="itxt"/></td><td><label tyle="width:150px">0</label></td>
			</tr>
			<tr><td colspan="4">&emsp;&emsp;<input type="submit" name="csave" value="  save  " class="btn btn-success"></td>
			</tr>

		</table>
	</div>
</form>

</body>



</html>