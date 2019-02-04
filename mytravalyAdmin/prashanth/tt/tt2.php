<?php 
session_start();
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
  
</head>
<body>
<form action="" method="post" name="form1"> 
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Indicates a successful or positive action.
</div>
<div style="width:70%">
<table class="table table-striped">
<tr><th>ID</th><th>Name</th><th>phone no</th><td  align="center"><input name="check_list" type="button" class="btn btn-info" value="Select All" onclick="checkAll()"/></td></tr>
<?php
$path="C:/wamp64/www/sericulture/db_con.php";
	include($path);
	//echo "<script>alert('Order not Placed...');</script>";
	$list=mysqli_query($con,"SELECT * FROM client ");
	if (mysqli_num_rows($list) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($list)) {
        echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['mobile_no']."</td><td   align='center' >
		<input type='checkbox' id='list' name='email_list[]' value=".$row['mobile_no']."></td></tr>";
    }
} else {
    echo "0 results";
}
?>
<tr>
<td colspan=4><input type="submit" name="mail" class="btn btn-primary btn-block" value="send mail"/>
</td></tr>
</table>
</div>
</body>
</html>
<script>
var isChecked = false;
function checkAll() {
    var checkboxes = document.getElementsByTagName('input');
     if (isChecked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
  isChecked = !isChecked;
 }
</script>