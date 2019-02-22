<?php include 'propertymenus.php';?>

<?php
include 'Property_DB.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>


<style type="text/css">
  
 .parent ~ .cchild {
  display: none;
}
.open .parent ~ .cchild {
  display: table-row;
}
.parent {
  cursor: pointer;
}
tbody {
  color: #212121;
}
.open {
  background-color: #e6e6e6;
}

.open .cchild {
  background-color: #999;
  color: white;
}
.parent > *:last-child {
  width: 30px;
}
.parent i {
  transform: rotate(0deg);
  transition: transform .3s cubic-bezier(.4,0,.2,1);
  margin: -.5rem;
  padding: .5rem;
 
}
.open .parent i {
  transform: rotate(180deg)
}
</style>


<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
/* All Styles Optional */
.tdiv {
float: left;
margin-right: 1em;
}
</style>
<script type="text/javascript">

/* Paginate Table Script ©2008 John Davenport Scheuer
   as first seen in http://www.dynamicdrive.com/forums/
   username: jscheuer1 - This Notice Must Remain for Legal Use
   */

// you can init as many tables as you like in here by id: paginateTable('id', 0, num_max_rows);
paginateTable.init = function(){ // remove any not used
paginateTable('test1', 0, 1);
paginateTable('test2', 0, 1);
};

////////////////////// Stop Editing //////////////////////

function paginateTable(table, way, max){
max? paginateTable.max[table] = max : max = paginateTable.max[table];
way = way == 1? 1 : way == -1? 0 : -1;
var r = document.getElementById(table).rows, i = 0;
for(i; i < r.length; ++i) // find current start point
 if(r[i].style.display != 'none')
  break;
for(i; i < r.length; ++i){ // continue on to find current end point
 if(r[i].style.display == 'none'){
  paginateTable.endPoint[table] = i;
  break;
 };
 paginateTable.endPoint[table] = 0; // if no end point found, table is 'virgin' or at end
};
if(way == 1 && r[r.length - 1].style.display != 'none') return; // table was already at the end and we tried to move forward
// if moving forward, start will be old end, else start will be old start - max or 0, whichever is greater:
paginateTable.startPoint[table] = way? paginateTable.endPoint[table] : Math.max( 0, paginateTable.startPoint[table] - max);
paginateTable.endPoint[table] = paginateTable.startPoint[table] + --max; // new end will be new start + max - 1
for (i = r.length - 1; i > -1; --i) // set display of rows based upon whether or not they are in range of the calculated start/end points
 r[i].style.display = i < paginateTable.startPoint[table] || i > paginateTable.endPoint[table]? 'none' : '';
};

paginateTable.startPoint = {};
paginateTable.endPoint = {};
paginateTable.max = {};

if(window.addEventListener)
window.addEventListener('load', paginateTable.init, false);
else if (window.attachEvent)
window.attachEvent('onload', paginateTable.init);

//////////////// End Paginate Table Script ///////////////

</script>

<div align="center" style="background: skyblue;height: 100px;padding: 20px;border-radius: 75px;">

		<label style="font-size: 25px">
			<input type="radio"  id="radio2" name="tariff" value="" onclick="window.location='rooms.php';"><b>Create Room</b>&emsp;
			
			<input type="radio"  id="radio2" name="tariff" value=""  onclick="window.location='Tariff.php';"><b>Tariff</b>&emsp;

			<input type="radio"  id="radio3" name="update_tariff" value="" onclick="window.location='Update_tariff.php';" ><b>Update Tariff</b>
		</label>
	</div>
</head>
<body>
	<br>
<div class="row">
    <div class="col-md-3"><?php include 'sidebar.php'; ?>
      
    </div>

<div class="col-md-9">
<?php

$query7 = mysqli_query($con,"SELECT * FROM rooms_details where user_id='abhi' group by property_id");
$number=mysqli_num_rows($query7);

echo "<b>You have ".$number." property in this Website</b>";

?>
<br>
<input type="button" value="Previous" onclick="paginateTable('test1', -1);">
<input type="button" value="Next Property" onclick="paginateTable('test1', 1);">
<table id="test1" >

<?php
include 'Property_DB.php';
$select = "SELECT * FROM rooms_details  where user_id='abhi' group by property_id";
$result = mysqli_query($con,$select) or die(mysqli_error());

while($row1 = mysqli_fetch_array($result)) { ?>
            <tr>          
            <td>
            	
            	<div class="row"><b><?php 
            	$s1 = "SELECT * FROM propertydetails  where property_id='$row1[property_id]'";
				$r1 = mysqli_query($con,$s1) or die(mysqli_error());
				while($row11 = mysqli_fetch_array($r1)) {
            	echo "Property Name: <u>".$row11['property_name']."</u> (".$row1['property_id'].")"; 
            	}
            	?></b></div> 
            	<div class="row" style="width: 140%"> <table   class="table table2" >

		            		<tr>
		          <th>Property ID</th>
		          <th>Room ID</th>
		          <th>Room Name</th>
		          <th>Min Occupancy</th>
		          <th>Max Occupancy</th>
		          <th>Tariff</th>
		          <th colspan="2">Inventory</th>
		          
		        </tr>
            		<?php
            		$select2 = "SELECT * FROM rooms_details where property_id='$row1[property_id]' group by room_id;";
					$result2 = mysqli_query($con,$select2);
				while($row2 = mysqli_fetch_array($result2)) {
					echo "<tbody><tr class='parent'>";
             		echo "<td>" . $row2['property_id'] . "</td>";
             	 echo "<td>" . $row2['room_id'] . "</td>";
              	echo "<td>" . $row2['room_name'] . "</td>";
              	echo "<td>" . $row2['min_occupancy'] . "</td>";
              echo "<td>" . $row2['max_occupancy'] . "</td>";
              echo "<td>" . $row2['tariff'] . "</td>";
              echo "<td>" . $row2['inventory'] . "</td>"; 
              echo "<td>price<i class='fa fa-chevron-down'></i></td>";      
              echo "</tr>";     
              
              	$meal_plan="";
              	echo "<tr class='cchild'>
              	<td>Occupancy</td>
              		<td>p1</td>
              		<td>p2</td>
              		<td>P3</td>
              		<td>P4</td>
              		<td>P5</td>
              		<td>P6</td>
              		</td></tr>";
              	
					//echo $meal_plan;
              $select3 = "SELECT * FROM rooms_details where room_id=".$row2['room_id']." and meal_plan='EP';";
					$result3 = mysqli_query($con,$select3);
				while($row3 = mysqli_fetch_array($result3)) {
					//echo $row3['meal_plan'];

					echo "<tr class='cchild'>";
						echo "<td>EP</td>";
				echo "<td>".$row2['singleprice']."</td>
					<td>".$row2['doubleprice']."</td>
					<td>".$row2['tripleprice']."</td>
					<td>".$row2['person4price']."</td>
					<td>".$row2['person5price']."</td>
					<td>".$row2['person6price']."</td>
					</tr>";
				}
				
				 $select4 = "SELECT * FROM rooms_details where room_id=".$row2['room_id']." and meal_plan='CP';";
					$result4 = mysqli_query($con,$select4);
				while($row4 = mysqli_fetch_array($result4)) {
					//echo $row4['meal_plan'];
				echo "<tr class='cchild'>";
						echo "<td>CP</td>";
				echo "<td>".$row4['singleprice']."</td>
					<td>".$row4['doubleprice']."</td>
					<td>".$row4['tripleprice']."</td>
					<td>".$row4['person4price']."</td>
					<td>".$row4['person5price']."</td>
					<td>".$row4['person6price']."</td>
					</tr>";
				}


				$select5 = "SELECT * FROM rooms_details where room_id=".$row2['room_id']." and meal_plan='MAP';";
					$result5 = mysqli_query($con,$select5);
				while($row5 = mysqli_fetch_array($result5)) {
					//echo $row5['meal_plan'];
				echo "<tr class='cchild'>";
						echo "<td>MAP</td>";
				echo "<td>".$row5['singleprice']."</td>
					<td>".$row5['doubleprice']."</td>
					<td>".$row5['tripleprice']."</td>
					<td>".$row5['person4price']."</td>
					<td>".$row5['person5price']."</td>
					<td>".$row5['person6price']."</td>
					</tr>";
				}

				$select6 = "SELECT * FROM rooms_details where room_id=".$row2['room_id']." and meal_plan='AP';";
					$result6 = mysqli_query($con,$select6);
				while($row6 = mysqli_fetch_array($result6)) {
					//echo $row4['meal_plan'];
				echo "<tr class='cchild'>";
						echo "<td>AP</td>";
				echo "<td>".$row6['singleprice']."</td>
					<td>".$row6['doubleprice']."</td>
					<td>".$row6['tripleprice']."</td>
					<td>".$row6['person4price']."</td>
					<td>".$row6['person5price']."</td>
					<td>".$row6['person6price']."</td>
					</tr>";
				}

					echo "</tbody>";
				
				
 
             
              


}
?>

            	</tr></table> </div>
            </td>
            </tr>
      			
              	




<?php }


?>

</table>

</div>
</div>

</body>
</html>

<script>
  $('.table2').on('click', 'tr.parent .fa-chevron-down', function(){
  $(this).closest('tbody').toggleClass('open');
});
</script>