<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<?php //include 'propertymenus.php';?>

<?php
session_start();
	$session_user=$_SESSION['user']['userid'];
include 'Property_DB.php';

if(isset($_POST['pricing']))
{

$property=$_POST['property'];
$room=$_POST['room'];
$arr=explode("-", $room);
$room_id=$arr[0];
$meal_plan=$arr[1];
echo "<script> document.getElementById('room').value = ".$room.";</script>";

$rowSQL = mysqli_query($con, "select max_occupancy from rooms_detail where user_id='$session_user' and property_id='$property'and room_id='$room_id'" )or die(mysqli_error($con));
	$row = mysqli_fetch_array( $rowSQL );
	$max_occupancy = $row['max_occupancy'];
	echo $max_occupancy;
	
}

if(isset($_POST['csave']))
{
	echo "string";
				$property=$_POST['property'];
				$room=$_POST['room'];
				echo $room;
				$arr=explode("-", $room);
				$room_id1=$arr[0];
				$meal_plan1=$arr[1];
				echo "<script> document.getElementById('room').value = ".$room.";</script>";

				$rowSQL = mysqli_query($con, "select max_occupancy from rooms_detail where user_id='$session_user' and property_id='$property' and room_id='$room_id1'")or die(mysqli_error($con));
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
				

				mysqli_query($con,"update rooms_tariff set singleprice='$trp1',doubleprice='$trp2',tripleprice='$trp3',person4price='$trp4',person5price='$trp5',person6price='$trp6',person7price='$trp7',person8price='$trp8',person9price='$trp9',person10price='$trp10',person11price='$trp11',person12price='$trp12',person13price='$trp13',person14price='$trp14',person15price='$trp15',extrapersonprice='$extraperson',extrachildprice='$extrachild',infantprice='$infant' where room_id='$room_id1' and meal_plan='$meal_plan1'")or die(mysqli_error($con));
				

				$singletax=$_POST['singletax'];
				$doubletax=$_POST['doubletax'];
				$tripletax=$_POST['tripletax'];
				$person4tax=$_POST['person4tax'];
				$person5tax=$_POST['person5tax'];
				$person6tax=$_POST['person6tax'];
				$person7tax=$_POST['person7tax'];
				$person8tax=$_POST['person8tax'];
				$person9tax=$_POST['person9tax'];
				$person10tax=$_POST['person10tax'];
				$person11tax=$_POST['person11tax'];
				$person12tax=$_POST['person12tax'];
				$person13tax=$_POST['person13tax'];
				$person14tax=$_POST['person14tax'];
				$person15tax=$_POST['person15tax'];
				$sstxt=$_POST['sstxt'];
				$ectxt=$_POST['ectxt'];
				$itxt=$_POST['itxt'];

				mysqli_query($con,"update rooms_tax set singletax='$singletax',doubletax='$doubletax',tripletax='$tripletax',person4tax='$person4tax',person5tax='$person5tax',person6tax='$person6tax',person7tax='$person7tax',person8tax='$person8tax',person9tax='$person9tax',person10tax='$person10tax',person11tax='$person11tax',person12tax='$person12tax',person13tax='$person13tax',person14tax='$person14tax',person15tax='$person15tax',extrapersontax='$sstxt',extrachildtax='$ectxt',infanttax='$itxt' where room_id='$room_id1' and meal_plan='$meal_plan1'")or die(mysqli_error($con));

				require_once('Property_DB.php');
				echo "<script> 
				alert('Price of room is updated'); 
				window.location.href = 'rooms_dashboard_new.php';
				</script>";
				
			}

?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css">
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
	//alert(room_id);
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


</head>
<body>


	<div class="row">
	<div class="col-md-3">
		<br>
		<?php include 'sidebar.php' ?>
	</div>
<div class="col-md-9">
<br>
<?php include 'propertymenus.php';?>
<div align="center" style="background: #f15025;margin: 0 auto;height: 10%;width:75%;padding: 10px;border-radius: 75px;">

		<label style="font-size: 20px;color: green">
			  

			<input type="radio"  id="radio1" name="t" value="" onclick="window.location='propertydetail.php';"><b><a href="#" style="text-decoration: none;color: white">Create Property</a></b>&emsp;
			<input type="radio"  id="radio2" name="t" value="" onclick="window.location='rooms.php';" ><b><a href="#" style="text-decoration: none;color: white">Create Room</a></b>&emsp;
			
			<input type="radio" checked="true" id="radio3" name="t" value="" onclick="window.location='Tariff.php';"><b><a href="#" style="text-decoration: none;color: white">Tariff</a></b>&emsp;

			<input type="radio"  id="radio4" name="t" value="" onclick="window.location='Update_tariff.php';" ><b><a href="#" style="text-decoration: none;color: white">Update Tariff</a></b>
		</label>
	</div>

<br>
<form action="" method="post">
	<div id="div2">
		
		
		<table align="center" id="t3" cellpadding="8px"  cellspacing="10">
		
			<tr><td>
		Select Property
		</td>
		<td> <select name="property" id="property" onchange="this.form.submit()" style="width:250px;border-radius: 1rem;text-align: center;height: 35px" required>
			<option value="0" selected disabled>--Select--</option>
					<?php
    					$query = "SELECT * FROM propertydetails where user_id='$session_user' group by property_id";
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
		<div id="room_div">
			<select name="room" id="room" onchange="showUser(this)" style="width:250px;border-radius: 1rem;text-align: center;height: 35px" required>
				<option value="0">--Select--</option>
			<?php
			if(isset($_POST['property']))
			{
							$p=$_POST['property'];
							echo $p;
								$query = "SELECT * FROM rooms_tariff where property_id='$p'";
		    					$result = mysqli_query($con,$query);
		    					while($row=mysqli_fetch_array($result)){                                
		    					echo "<option value=".$row['room_id']."-".$row['meal_plan'].">".$row['room_name']."-".$row['meal_plan']."</option>";
		    					}
							
    				}
    		?>
    				
			
		</select>
		</div>
		
		</td>
</tr>
		</table>
		<div id="txtHint"  align="center"><b>Room Details will be listed here...</b></div>
		

		<table  id="t2" align="center" width=70% cellpadding="8px"  cellspacing="10" style="background:#ff6f61;opacity: 0.8;display: none;">
		
			
			<tr style="text-align:center;" >
				<th colspan="4">Base Room Price</th>
				
			</tr>
			<tr style="text-align:center;" >
				<th></th>
				<th>Priceeee</th>
				<th>Tax</th>
				<th>Total</th>
			</tr>
			
			
			<tr id="1">
				<td>Single</td>
				<td><input type="number" name=""  id="t1" class="s1" autocomplete="off"/></td>
				<td><input type="number" name="singletax" id="t11" class="s2" autocomplete="off"/></td>
				<td><input type="text" name="trp1" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="2">
				<td>Double</td>
				<td><input type="number" name="" id="t2" class="s1" autocomplete="off" /></td>
				<td><input type="number" name="doubletax"id="t22" class="s2" autocomplete="off" /></td>
				<td><input type="text" name="trp2" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="3">
				<td>Triple</td>
				<td><input type="number" name="" class="s1" autocomplete="off" id="t3" /></td>
				<td><input type="number" name="tripletax" class="s2" autocomplete="off" id="t33" /></td>
				<td><input type="text" name="trp3" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="4">
				<td>Person 4</td>
				<td><input type="number" name="" class="s1" autocomplete="off" id="p41"/></td>
				<td><input type="number" name="person4tax" class="s2" autocomplete="off" id="p42" /></td>
				<td><input type="text" name="trp4" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="5">
				<td>Person 5</td>
				<td><input type="number" name="" class="s1" autocomplete="off" id="p51" /></td>
				<td><input type="number" name="person5tax" class="s2" autocomplete="off" id="p52" /></td>
				<td><input type="text" name="trp5" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="6">
				<td>Person 6</td>
				<td><input type="number" name="" id="p61" class="s1" autocomplete="off"/></td>
				<td><input type="number" name="person6tax" id="p62" class="s2" autocomplete="off"/></td>
				<td><input type="text" name="trp6" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="7">
				<td>Person 7</td>
				<td><input type="number" name="" id="p71" class="s1" autocomplete="off"/></td>
				<td><input type="number" name="person7tax" id="p72" class="s2" autocomplete="off"/></td>
				<td><input type="text" name="trp7" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="8">
				<td>Person 8</td>
				<td><input type="number" name="" id="p81" class="s1" autocomplete="off"/></td>
				<td><input type="number" name="person8tax" id="p82" class="s2" autocomplete="off"/></td>
				<td><input type="text" name="trp8" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="9">
				<td>Person 9</td>
				<td><input type="number" name="" id="p91" class="s1" autocomplete="off"/></td>
				<td><input type="number" name="person9tax" id="p92" class="s2" autocomplete="off"/></td>
				<td><input type="text" name="trp9" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="10">
				<td>Person 10</td>
				<td><input type="number" name="" id="p101" class="s1" autocomplete="off"/></td>
				<td><input type="number" name="person10tax" id="p102" class="s2" autocomplete="off"/></td>
				<td><input type="text" name="trp10" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="11">
				<td>Person 11</td>
				<td><input type="number" name="" id="p111" class="s1" autocomplete="off"/></td>
				<td><input type="number" name="person11tax" id="p112" class="s2" autocomplete="off"/></td>
				<td><input type="text" name="trp11" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="12">
				<td>Person 12</td>
				<td><input type="number" name="" id="p121" class="s1" autocomplete="off"/></td>
				<td><input type="number" name="person12tax" id="p122" class="s2" autocomplete="off"/></td>
				<td><input type="text" name="trp12" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="13">
				<td>Person 13</td>
				<td><input type="number" name="" id="p131" class="s1" autocomplete="off"/></td>
				<td><input type="number" name="person13tax" id="p132" class="s2" autocomplete="off"/></td>
				<td><input type="text" name="trp13" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="14">
				<td>Person 14</td>
				<td><input type="number" name="" id="p141" class="s1" autocomplete="off"/></td>
				<td><input type="number" name="person14tax" id="p142" class="s2" autocomplete="off"/></td>
				<td><input type="text" name="trp14" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>

			<tr id="15">
				<td>Person 15</td>
				<td><input type="number" name="" id="p151" class="s1" autocomplete="off"/></td>
				<td><input type="number" name="person15tax" id="p152" class="s2" autocomplete="off"/></td>
				<td><input type="text" name="trp15" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>



			<tr>
				<td>Extra Person</td>
				<td><input type="number" name="stxt" class="s1" autocomplete="off" id="ep1"/></td>
				<td><input type="number" name="sstxt" class="s2" autocomplete="off" id="ep2"/></td>
				<td><input type="text" name="extraperson" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr>
				<td>Extra Child</td>
				<td><input type="number" name="stxt" class="s1" autocomplete="off" id="ec1"/></td>
				<td><input type="number" name="ectxt" class="s2" autocomplete="off" id="ec2"/></td>
				<td><input type="text" name="extrachild" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr>
				<td>Infant</td>
				<td><input type="number" name="stxt" class="s1" autocomplete="off" id="i1"/></td>
				<td><input type="number" name="itxt" class="s2" autocomplete="off" id="i2"/></td>
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


<script>
	/*var path="get_amenities.php?p=";
	$('#MyDiv').load(path);
$(document).ready(function(){
	
    $('#property').change(function()
    {
		var id=$(this).val();
    	var path="load_rooms.php?s="+id;
        $('#room_div').load(path);              

    });

});    */
</script>

<script type="text/javascript">
 
  document.getElementById('property').value = "<?php echo $_POST['property'];?>";
  document.getElementById('room').value = "<?php echo $_POST['room'];?>";
  

</script>

