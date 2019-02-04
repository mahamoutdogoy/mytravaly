
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
            $('#myDropDown').change(function(){
                //Selected value
                var inputValue = $(this).val();
				var string1=inputValue.split(" ");
				var id=string1[0];
				var eid=string1[1];

                alert("Sending a Mail To "+eid+" value "+id);

                //Ajax for calling php function
               // $.post('submit.php', { dropdownValue: inputValue }, function(data){
                    //alert('ajax completed. Response:  '+data);
                    //do after submission operation in DOM
               // });
            });
        });
        </script>
</head>

<body>
<form action="" method="post">
<select name="assign_to" id="myDropDown">
<option value="" disabled selected>---select---</option>
<?php
$con=mysqli_connect("localhost","root","","sb_database") or die( mysqli_connect_error());
$list=mysqli_query($con,"select id,name,email from employee") or die(mysqli_error());
while($row = mysqli_fetch_assoc($list))
{
	$v=$row['id']." ".$row['email'];
echo "<option value='$v'>".$row['name']."</option>";
}
?>

<option value="add" ><h3><span class="label label-default">Add New</span></h3></option>
</select>
<!--<input type="submit" name="ok"/>
</form>
</body>
</html>-->
<?php/*
if(isset($_POST['ok']))
    echo $_POST['assign_to'];*/
?>