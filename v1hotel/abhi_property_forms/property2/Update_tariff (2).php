<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<?php include 'propertymenus.php';?>

<?php
 include 'Property_DB.php';

if(isset($_POST['update_price']))
{

$property=$_POST['property'];
$room=$_POST['room'];
echo $room;
$arr=explode("-", $room);
$room_id=$arr[0];
$meal_plan=$arr[1];

//echo "<script> document.getElementById('rooms').value = ".$room.";</script>";
//echo $room;
$rowSQL = mysqli_query($con, "select max_occupancy from rooms_details where user_id='abhi' and property_id='$property' and room_id='$room_id' and meal_plan='$meal_plan'");
	$row = mysqli_fetch_array( $rowSQL );
	$max_occupancy = $row['max_occupancy'];
	//echo $max_occupancy;

	

	
}

if (isset($_POST['new_price'])) {
	





	$property1=$_POST['property'];
	$room1=$_POST['room'];
	echo $room1;
	$arr=explode("-", $room1);
	$room_id1=$arr[0];
	$meal_plan1=$arr[1];
	//echo $room_id;
	//echo $property_id;
	
	//echo $property;
	//echo $room;
	//$room_name="";
	//$description="";
	//$min_occupancy="";
	//$max_occupancy="";
	//$tariff="";
	//$inventory="";
	$begin=$_POST['from'];
	$to=$_POST['to'];
	
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
				

	/*$query1 = "SELECT * FROM rooms where property_id='$property' and room_id='$room'";
    	$result1 = mysqli_query($con,$query1);
    	while($row1=mysqli_fetch_array($result1)){                                                 
       	$room_name=$row1['room_name'];
       	$description=$row1['description'];
       	$min_occupancy=$row1['min_occupancy'];
       	$max_occupancy=$row1['max_occupancy'];
       	$tariff=$row1['tariff'];
       	$inventory=$row1['inventory'];
       	//echo $room_name;

       	}*/


$propertyrooms_offers=$property1."_rooms_offers";
	echo $propertyrooms_offers;

/*mysqli_query($con,"CREATE TABLE IF NOT EXISTS `$propertyrooms_offers` (
  
  `property_id` varchar(50) NOT NULL,
  `room_id` int(11) NOT NULL,
  `start_date` date,
  `end_date` date,
  `meal_plan` varchar(50) NOT NULL,
  `singleprice` double NOT NULL DEFAULT '0',
  `doubleprice` double NOT NULL DEFAULT '0',
  `tripleprice` double NOT NULL DEFAULT '0',
  `person4price` double NOT NULL DEFAULT '0',
  `person5price` double NOT NULL DEFAULT '0',
  `person6price` double NOT NULL DEFAULT '0',
  `person7price` double NOT NULL DEFAULT '0',
  `person8price` double NOT NULL DEFAULT '0',
  `person9price` double NOT NULL DEFAULT '0',
  `person10price` double NOT NULL DEFAULT '0',
  `person11price` double NOT NULL DEFAULT '0',
  `person12price` double NOT NULL DEFAULT '0',
  `person13price` double NOT NULL DEFAULT '0',
  `person14price` double NOT NULL DEFAULT '0',
  `person15price` double NOT NULL DEFAULT '0',
  `extrapersonprice` double NOT NULL DEFAULT '0',
  `extrachildprice` double NOT NULL DEFAULT '0',
  `infantprice` double NOT NULL DEFAULT '0'
)");*/




		mysqli_query($con,"INSERT INTO rooms_offers(user_id,property_id,room_id,start_date,end_date,meal_plan,singleprice,doubleprice,tripleprice,person4price,person5price,person6price,person7price,person8price,person9price,person10price,person12price,person13price,person14price,person15price,extrapersonprice,extrachildprice,infantprice) VALUES ('abhi','$property1','$room_id1','$begin','$to','$meal_plan1','$trp1','$trp2','$trp3','$trp4','$trp5','$trp6','$trp7','$trp8','$trp9','$trp10','$trp12','$trp13','$trp14','$trp15','$extraperson','$extrachild','$infant')");
			echo "<script>alert('New Price is updated');</script>";

      // 	mysqli_query($con,"update rooms_offers set from='$from',to='$to', singleprice='$trp1',doubleprice='$trp2',tripleprice='$trp3',person4price='$trp4',person5price='$trp5',person6price='$trp6',person7price='$trp7',person8price='$trp8',person9price='$trp9',person10price='$trp10',person11price='$trp11',person12price='$trp12',person13price='$trp13',person14price='$trp14',person15price='$trp15',extrapersonprice='$extraperson',extrachildprice='$extrachild',infantprice='$infant' where room_name='$rooms'");



}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!--<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $('#property').change(function(){
                    console.log($(this));
                    $.get( "getrooms.php" , { option : $(this).val() } , function ( data ) {
                        $ ( '#room' ) . html ( data ) ;
                    } ) ;
                });
            });
        </script>-->



    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css">
<script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      dateFormat: 'yy-mm-dd',
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      dateFormat: 'yy-mm-dd',
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
</script>
<style type="text/css">
  .wrapper{
    display : inline;
    border:1px solid lightgray;
    padding:5px;
    box-shadow:inset 1px 1px 1px rgba(0,0,0,.1)
}

.label1 {
color : gray;
}
.l1
{
	color:white;
}
</style>


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
			
			<input type="radio"  id="radio2" name="tariff" value="" onclick="window.location='Tariff.php';"><b>Tariff</b>&emsp;

			<input type="radio"  id="radio3" name="updatee_tariff" value="" onclick="window.location='update_tariff.php';" checked="true"><b>Update Tariff</b>
		</label>
	</div>

</head>
<body>
<form action="" method="post">
	


	<div class="row">
	<div class="col-md-3">
		<br>
		<?php include 'sidebar.php' ?>
	</div>

<div class="col-md-9" >



	<br>
	<div class="row p-3" style="font-size: 18px;text-align: center;background: linear-gradient(141deg, #0fb8ad

0%, #1fc8db

51%, #2cb5e8

75%);">
		<table align="center" cellpadding="8px"  cellspacing="10"><tr><td>
		Select Property
		</td>
		<td> <select name="property" id="property" onchange="this.form.submit()" style="width: 150px" required>
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
		<select name="room" id="room" style="width: 150px" required>
			<option value="0">--Select--</option>
			<?php
			if(isset($_POST['property']))
			{
							$p=$_POST['property'];
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
<tr>

	<td colspan="2">
		<input type="submit" name="update_price" value="Let's Update" class="btn btn-success" >
		<input type="submit" name="s" id="myForm" style="display: none">
	</td>
</tr>
		</table>

	</div>

	
		

</div>

	</div>

	</div>
	








<div class="modal fade"  tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-lg p-5"    role="document">
    <div class="modal-content">
      <div class="modal-header">
        Update Your Price Here
      </div>
      <div class="modal-body">
        
        <div class="row">
        
	<div class="col-md-5.5" style="" id="div2" >
	
	<table id="table2" class="table table-dark table-hover"  style="">
			
			<tr style="text-align:center;background:#ff6f61;opacity: 0.8;" >
				<th></th>
				<th>Price</th>
				<th>Tax</th>
				<th>Total</th>
			</tr>
			<tr id="1">
				<td>Single</td>
				<td><input type="text" name=""  id="t1" class="s1 t1"/></td>
				<td><input type="text" name="" id="t2" class="s2 t1" /></td>
				<td><input type="text" name="trp1" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="2">
				<td>Double</td>
				<td><input type="text" name="" id="t3" class="s1 t2" /></td>
				<td><input type="text" name=""id="t4" class="s2 t2" /></td>
				<td><input type="text" name="trp2" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="3">
				<td>Triple</td>
				<td><input type="text" name="" class="s1 t3" id="t5" /></td>
				<td><input type="text" name="" class="s2 t3" id="t6" /></td>
				<td><input type="text" name="trp3" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="4">
				<td>Person 4</td>
				<td><input type="text" name="" class="s1 t4" id="t7"/></td>
				<td><input type="text" name="" class="s2 t4" id="t8" /></td>
				<td><input type="text" name="trp4" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="5">
				<td>Person 5</td>
				<td><input type="text" name="" class="s1 t5" id="t9" /></td>
				<td><input type="text" name="" class="s2 t5" id="t10" /></td>
				<td><input type="text" name="trp5" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="6">
				<td>Person 6</td>
				<td><input type="text" name="" id="t11" class="s1 t6"/></td>
				<td><input type="text" name="" id="t12" class="s2 t6"/></td>
				<td><input type="text" name="trp6" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="7">
				<td>Person 7</td>
				<td><input type="text" name="" id="t13" class="s1 t7"/></td>
				<td><input type="text" name="" id="t14" class="s2 t7"/></td>
				<td><input type="text" name="trp7" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="8">
				<td>Person 8</td>
				<td><input type="text" name="" id="t15" class="s1 t8"/></td>
				<td><input type="text" name="" id="t16" class="s2 t8"/></td>
				<td><input type="text" name="trp8" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="9">
				<td>Person 9</td>
				<td><input type="text" name="" id="t17" class="s1 t9"/></td>
				<td><input type="text" name="" id="t18" class="s2 t9"/></td>
				<td><input type="text" name="trp9" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="10">
				<td>Person 10</td>
				<td><input type="text" name="" id="t19" class="s1 t10"/></td>
				<td><input type="text" name="" id="t20" class="s2 t10"/></td>
				<td><input type="text" name="trp10" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="11">
				<td>Person 11</td>
				<td><input type="text" name="" id="t21" class="s1 t11"/></td>
				<td><input type="text" name="" id="t22" class="s2 t11"/></td>
				<td><input type="text" name="trp11" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="12">
				<td>Person 12</td>
				<td><input type="text" name="" id="t23" class="s1 t12"/></td>
				<td><input type="text" name="" id="t24" class="s2 t12"/></td>
				<td><input type="text" name="trp12" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="13">
				<td>Person 13</td>
				<td><input type="text" name="" id="t25" class="s1 t13"/></td>
				<td><input type="text" name="" id="t26" class="s2 t13"/></td>
				<td><input type="text" name="trp13" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="14">
				<td>Person 14</td>
				<td><input type="text" name="" id="t27" class="s1 t14"/></td>
				<td><input type="text" name="" id="t28" class="s2 t14"/></td>
				<td><input type="text" name="trp14" style="width:150px;background-color:transparent;border: 0px" readonly="true" id="" class="l1" value="0"></td>
			</tr>
			<tr id="15">
				<td>Person 15</td>
				<td><input type="text" name="" id="t29" class="s1 t15"/></td>
				<td><input type="text" name="" id="t30" class="s2 t5"/></td>
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
			
		</table>

		<table id="table1" style="" class="table table-dark table-hover" cellpadding=""  cellspacing="" >
			
			<tr style="background:#ff6f61;opacity: 0.8;text-align: center;" >
				<th>OTA	&emsp;&emsp;
				<input type="checkbox" name="" value="" checked="true" id="checkAll">SelectAll
				&emsp;&emsp;
				<input type="checkbox" name="" value="" id="uncheckAll">UnSelectAll
				</th>
			</tr>
			
			<tr>
				<td><input type="checkbox" class="c1" checked="true" name="">
					<input type="button" name="" value="mmt" style="width: 110px;background:#20b2aa" class="btn">
					<input type="checkbox" class="c1" checked="true" name="">
					<input type="button" name="" value="Maharaja" style="width: 113px;background:#20b2aa" class="btn">
					<input type="checkbox" class="c1" checked="true" name="">
					<input type="button" name="" value="Karnataka" style="width: 113px;background:#20b2aa" class="btn">
					<input type="checkbox" class="c1" checked="true" name="">
					<input type="button" name="" value="Telangana" style="width: 113px;background:#20b2aa" class="btn">
					<input type="checkbox" class="c1" checked="true" name="">
					<input type="button" name="" value="Maharastra" style="width: 113px;background:#20b2aa" class="btn">
				</td>
				
			</tr>
			<tr>
				<td>
				<input type="checkbox" class="c1" name="">
				<input type="button" name="" value="Andra Pradesh" checked="true" style="width: 120px;background:#20b2aa" class="btn">
			</td>
			</tr>
			
		</table>
<table id="table1" style="" class="table table-dark table-hover" cellpadding=""  cellspacing="" >
	<tr style="background:#ff6f61;opacity: 0.8;text-align: center;" >
		<td>
			<b>Days</b>&emsp;<input type="checkbox" name="" value="" checked="true" id="checkAllone"><b>SelectAll</b>
				
				&emsp;<input type="checkbox" name=""  value="" id="uncheckAllone"><b>UnSelectAll</b>&emsp;
			<input type="checkbox" checked="true" class="c2" name="">Mon&emsp;<input type="checkbox"  checked="true" class="c2" name="">Tue&emsp;<input type="checkbox"  class="c2" checked="true" name="">Wed&emsp;<input type="checkbox"  checked="true" class="c2" name="">&nbsp;Thu&emsp;<input type="checkbox" checked="true" class="c2" name="">Fri&emsp;<input type="checkbox" checked="true" class="c2" name="">Sat&emsp;<input type="checkbox" checked="true"  class="c2" name="">Sun
			 
			 
				</td>
		
	</tr>
</table>


	</div>
</div>
      </div>

      <div class="modal-footer">
Period :  
<div class='wrapper'>
    <label class="label1" for="from">from:</label>
    <input type="text" id="from" style="width:150px" name="from">
    <label class="label1" for="to">to:</label>
    <input type="text" id="to" style="width:150px" name="to">
</div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="new_price" id="new_price" value="  save  " style="width: 130px;background:#20b2aa" class="btn">
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>



<script>
$('#myForm').on('click', function(e){
  $('#myModal').modal('show');
  e.preventDefault();
});
</script>



	<script>
        	
        	$("#checkAll").click(function () {
     		$('.c1').not(this).prop('checked', true);
     		$('#uncheckAll').prop('checked',false);
 			});


 			$("#uncheckAll").click(function () {
     		$('.c1').not(this).prop('checked', false);
     		$('#checkAll').prop('checked',false);
 			});

 			$("#checkAllone").click(function () {
     		$('.c2').not(this).prop('checked', true);
     		$('#uncheckAllone').prop('checked',false);
 			});

 			$("#uncheckAllone").click(function () {
     		$('.c2').not(this).prop('checked', false);
     		$('#checkAllone').prop('checked',false);
 			});
       
     </script>


<?php
        if(isset($_POST['update_price']))
{

echo "<script>

	document.getElementById('myForm').click();
	</script>";
	echo "<script>

	document.getElementById('div1').style.display = 'block';
	document.getElementById('div2').style.display = 'block';
	
	
	</script>";
	echo $max_occupancy."hi";


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