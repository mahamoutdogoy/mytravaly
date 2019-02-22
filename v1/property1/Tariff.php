<?php
 include"red.php";
?>

<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
      
<?php include 'propertymenus.php';?>

<?php
include 'Property_DB.php';

if(isset($_POST['pricing']))
{

$property=$_POST['property'];
$room=$_POST['room'];
echo $room;
$arr=explode("-", $room);
$room_id=$arr[0];
$meal_plan=$arr[1];
echo "<script> document.getElementById('room').value = ".$room.";</script>";

$rowSQL = mysqli_query($con, "select max_occupancy from rooms_details where user_id='abhi' and property_id='$property'and room_id='$room_id' and meal_plan='$meal_plan'" );
	$row = mysqli_fetch_array( $rowSQL );
	$max_occupancy = $row['max_occupancy'];
	echo $max_occupancy;
	
}

if(isset($_POST['csave']))
{
				$property=$_POST['property'];
				$room=$_POST['room'];
				echo $room;
				$arr=explode("-", $room);
				$room_id1=$arr[0];
				$meal_plan1=$arr[1];
				echo "<script> document.getElementById('room').value = ".$room.";</script>";

				$rowSQL = mysqli_query($con, "select max_occupancy from rooms_details where user_id='abhi' and property_id='$property' and room_id='$room_id1' and meal_plan='$meal_plan1'");
				$row = mysqli_fetch_array( $rowSQL );
				$max_occupancy = $row['max_occupancy'];

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
				

				mysqli_query($con,"update rooms_details set singleprice='$trp1',doubleprice='$trp2',tripleprice='$trp3',person4price='$trp4',person5price='$trp5',person6price='$trp6',person7price='$trp7',person8price='$trp8',person9price='$trp9',person10price='$trp10',person11price='$trp11',person12price='$trp12',person13price='$trp13',person14price='$trp14',person15price='$trp15',extrapersonprice='$extraperson',extrachildprice='$extrachild',infantprice='$infant' where room_id='$room_id1' and meal_plan='$meal_plan1'");
				

				echo "<script> 
				alert('Price of room is updated'); </script>";
				header("Location:Rooms_dashboard.php");

				
			}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
   <script>
	function showUser(str1) {
	var property=document.getElementById('property').value;
	
	var room=document.getElementById('room').value;
	document.getElementById('t2').style.display = 'none';
	var str= str1.options[str1.selectedIndex].innerHTML;
	var room=document.getElementById('room').value;
	
	var arr1=room.split("-");
	var room_id=arr1[0];
	var meal_plan=arr1[1];
	alert(room_id);
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } 
    else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","Get_room_details.php?q="+room_id+"&p="+meal_plan+"&r="+property,true);
        xmlhttp.send();
    }
}
</script>


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
			<input type="radio"  id="radio2" name="tariff" value="" onclick="window.location='rooms.php';"><b>Create Room</b>&emsp;
			
			<input type="radio"  id="radio2" name="tariff" value="" checked="true" onclick="window.location='Tariff.php';"><b>Tariff</b>&emsp;

			<input type="radio"  id="radio3" name="update_tariff" value="" onclick="window.location='Update_tariff.php';" ><b>Update Tariff</b>
		</label>
	</div>
</head>
<body>


	<div class="row">
	<div class="col-md-3">
		<br>
		<?php include 'sidebar.php' ?>
	</div>
<div class="col-md-9">

<form action="" method="post">
	<div id="div2">
		<br>
		

		<table id="t3" align="center"  class="table-striped" cellpadding="15px" width="800" cellspacing="10" style="background:#ff6f61;opacity: 0.8;">
			<tr><td>
		Select Property
		</td>
		<td> <select name="property" id="property" onchange="this.form.submit()" style="width:250px;border-radius: 1rem;text-align: center;height: 35px" required>
			<option value="0" selected disabled>--Select--</option>
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
		<tr>
		<td style="text-align: left;">
		Select Room
	</td>
	
	<td>
		<select name="room" id="room" onchange="showUser(this)" style="width:250px;border-radius: 1rem;text-align: center;height: 35px" required>
			<option value="0">--Select--</option>
			<?php
			if(isset($_POST['property']))
			{
							$p=$_POST['property'];
							echo $p;
								$query = "SELECT * FROM rooms_details where property_id='$p'";
		    					$result = mysqli_query($con,$query);
		    					while($row=mysqli_fetch_array($result)){                                
		    					echo "<option value=".$row['room_id']."-".$row['meal_plan'].">".$row['room_name']."-".$row['meal_plan']."</option>";
		    					}
							
    				}
    		?>
    				
			
		</select>
		
		</td>
</tr>
		</table>
		<div id="txtHint"  align="center"><b>Room Details will be listed here...</b></div>
		


		<table id="t2" align="center" class="table-striped"  cellpadding="15px" width="800" cellspacing="10" style="background:#ff6f61;opacity: 0.8;display: none;">
			
			<tr style="text-align:center;" >
				<th colspan="4">Base Room Price</th>
				
			</tr>
			<tr style="text-align:center;" >
				<th></th>
				<th>Price</th>
				<th>Tax</th>
				<th>Total</th>
			</tr>
			
			
			<tr id="1">
				<td>Single</td>
				<td><input type="text" name=""  id="t1" class="s1"/></td>
				<td><input type="text" name="" id="t11" class="s2" /></td>
				<td><input type="text" name="trp1" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="2">
				<td>Double</td>
				<td><input type="text" name="" id="t2" class="s1" /></td>
				<td><input type="text" name=""id="t22" class="s2" /></td>
				<td><input type="text" name="trp2" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="3">
				<td>Triple</td>
				<td><input type="text" name="" class="s1" id="t3" /></td>
				<td><input type="text" name="" class="s2" id="t33" /></td>
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

			<td colspan="2" align="center">
				
			</td>


		</tr>


		</table>
	</div>




</form>
</div>
</div>


</body>
</html>


<?php
if(isset($_POST['pricing']))
{

	echo "<script>

	document.getElementById('t2').style.display = 'block';
	
	
	</script>";


	for ($i=1; $i <=15 ; $i++) 
	{ 
	if($max_occupancy<=$i)
		{
			
	echo "<script>
			document.getElementById($i+1).style.display = 'none';
			
			</script>";
		}
	
	}
}


if(isset($_POST['csave']))
{

	echo "<script>

	document.getElementById('t2').style.display = 'block';
	
	
	</script>";


	for ($i=1; $i <=15 ; $i++) 
	{ 
	if($max_occupancy<=$i)
		{
			
	echo "<script>
			document.getElementById($i+1).style.display = 'none';
			
			</script>";
		}
	
	}
}
?>
<script type="text/javascript">
 
  document.getElementById('property').value = "<?php echo $_POST['property'];?>";
  document.getElementById('room').value = "<?php echo $_POST['room'];?>";

</script>
