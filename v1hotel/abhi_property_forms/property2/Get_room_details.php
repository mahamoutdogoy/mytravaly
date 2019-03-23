
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
    session_start();
    $session_user=$_SESSION['user']['userid'];
require_once('Property_DB.php');
$room_id = $_GET['q'];
$meal_plan=$_GET['p'];
$property_id=$_GET['r'];
//echo $meal_plan;
//echo $room_name;
$sql="SELECT *  FROM rooms_detail where user_id='$session_user' and property_id='$property_id' and room_id='$room_id'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));

echo "<table  cellpadding='8px'  cellspacing='10px'>


<tr>
<th>Rooms</th>
<th>Details</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    $sql1="SELECT *  FROM rooms_tariff where user_id='$session_user' and property_id='$property_id' and room_id='$room_id' and meal_plan='$meal_plan'";
    $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
    while($row1 = mysqli_fetch_array($result1)) {
    echo "<tr>";
    echo "<td width='34%'>Room ID</td><td >" . $row['room_id'] . "</td></tr>";
    echo "<tr><td>Room Name</td><td>" . $row['room_name'] . "</td></tr>";
    echo "<tr><td>Description</td><td>" . $row['description'] . "</td></tr>";
    echo "<tr><td>Min Occupancy</td><td>" . $row['min_occupancy'] . "</td></tr>";
    echo "<tr><td>Max Occupancy</td><td>" . $row['max_occupancy'] . "</td></tr>";
    echo "<tr><td>Tariff</td><td>" . $row['tariff'] . "</td></tr>";
    echo "<tr><td>Inventory</td><td>" . $row['inventory'] . "</td></tr>";
    echo "<tr><td>Meal Plan</td><td>" . $row1['meal_plan'] . "</td></tr>";
    echo "<tr ><td></td>
                <td><input type='submit' name='pricing' value='Go To Pricing' class='btn btn-success'>
                </td></tr>";
    
}
}
echo "</table>";

?>


</body>
</html> 
