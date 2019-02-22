
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
include 'Property_DB.php';
 include"red.php";
$room_id = $_GET['q'];
$meal_plan=$_GET['p'];
$property_id=$_GET['r'];
//echo $meal_plan;
//echo $room_name;
$sql="SELECT *  FROM rooms_details where user_id='abhi' and property_id='$property_id' and room_id='$room_id' and meal_plan='$meal_plan'";
$result = mysqli_query($con,$sql);

echo "<table class='table-striped' cellpadding='15px' width='800' cellspacing='10' style='background:#ff6f61;opacity: 0.8;'>
<tr>
<th>RoomS</th>
<th>Details</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>Room ID</td><td>" . $row['room_id'] . "</td></tr>";
    echo "<tr><td>Room Name</td><td>" . $row['room_name'] . "</td></tr>";
    echo "<tr><td>Description</td><td>" . $row['description'] . "</td></tr>";
    echo "<tr><td>Min Occupancy</td><td>" . $row['min_occupancy'] . "</td></tr>";
    echo "<tr><td>Max Occupancy</td><td>" . $row['max_occupancy'] . "</td></tr>";
    echo "<tr><td>Tariff</td><td>" . $row['tariff'] . "</td></tr>";
    echo "<tr><td>Inventory</td><td>" . $row['inventory'] . "</td></tr>";
    echo "<tr><td>Meal Plan</td><td>" . $row['meal_plan'] . "</td></tr>";
    echo "<tr >
                <td align='center' colspan='2'><input type='submit' name='pricing' value='Go To Pricing' class='btn btn-success'>
                </td></tr>";
    
}
echo "</table>";

?>
</body>
</html> 