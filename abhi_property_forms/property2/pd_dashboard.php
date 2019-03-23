<?php
 session_start();
 //include 'propertymenus.php';
 include 'Property_DB.php';
    //select property details
    //error_reporting(0);
    
    $val=$_SESSION['ownerid'];
  if(isset($_POST['submit']))
   	{
     
      $val=$_POST['ownerid'];
  }
    $sql="SELECT *  FROM propertydetails where ownerid=$val" ;
    $result=mysqli_query($con,$sql);
    $row = mysqli_fetch_array( $result);

    //select address details

    $sql1="SELECT *  FROM address where ownerid=$val" ;
    $result1=mysqli_query($con,$sql1);
    $row1 = mysqli_fetch_array( $result1);


    //select owner Details
    $sql2="SELECT *  FROM owner where ownerid=$val" ;
    $result2=mysqli_query($con,$sql2);
    $row2 = mysqli_fetch_array($result2);

    //select manager Details
    $sql3="SELECT *  FROM manager where managerid=(SELECT MAX(managerid) FROM manager)" ;
    $result3=mysqli_query($con,$sql3);
    $row3 = mysqli_fetch_array( $result3);

    //select Reservation Manager Details
	$sql4="SELECT *  FROM reservationmanager where ownerid=$val" ;
    $result4=mysqli_query($con,$sql4);
    $row4 = mysqli_fetch_array( $result4);


    
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>

<body>
	 
	 <div class="row " >
	 	<div class="col-sm-2">
	 	<!-- <?php //include'sidebar.php'?> -->
	 	
	 	</div>
	 
	 <form style="margin-left: 40px;margin-top:40px;">
	 			<center>
	 				<h5 class="bg-danger text-white">
	 					<span> <i >Property Details</i></span>
	 			 	       
	 				</h5>
	 				
	 			</center>
	 	<table cellpadding="" class="table table-striped">
	 		
	 		
	 		<tr>
	 		<th>
	 			PropertyId
	 		</th>

	 		<th>
	 			PropertyName
	 		</th>
	 		<th>
	 			PropertyType
	 		</th>
	 		<th>
	 			ChainName
	 		</th>
	 		<th>
	 			Establishment
	 		</th>
	 		<th>
	 			Currency
	 		</th>
	 		<th>
	 			CheckInTime
	 		</th>
	 		<th>
	 			CheckOutTime
	 		</th>
	 		<th>
	 			Description
	 		</th>
	 		</tr>
	 		<tr>
	 			<td>
	 				<?php  echo $row['property_id'] ; ?>
	 			</td>
	 			<td>
	 				<?php  echo $row['property_name'] ; ?>
	 			</td>
	 		
	 		
	 			<td>
	 				<?php  echo $row['propertytype'] ; ?>
	 			</td>
	 		
	 		
	 			<td>
	 				<?php  echo $row['chainname'] ; ?>
	 			</td>
	 		
	 		
	 			<td>
	 				<?php  echo $row['establishment'] ; ?>
	 			</td>
	 		
	 		
	 			<td>
	 				<?php  echo $row['currency'] ; ?>
	 			</td>
	 		
	 		
	 			<td>
	 				<?php  echo $row['checkin'] ; ?>
	 			</td>
	 		
	 		
	 			<td>
	 				<?php  echo $row['checkout'] ; ?>
	 			</td>
	 			<td>
	 				<?php  echo $row['description'] ; ?>
	 			</td>
	 		
	 		
</tr>

	 	</table>
	 	<center>
	 		<h5 class="bg-danger text-white">
	 					<span> <i >Address Details</i></span>
	 			 	       
	 				</h5>
	 			
	 	</center>
	 	<table cellpadding="20"  class="table table-striped ">
	 		<tr>
	 		<th>
	 			Street
	 		</th>
	 		<th>
	 			City
	 		</th>
	 		<th>
	 			State
	 		</th>
	 		<th>
	 			Country
	 		</th>
	 		<th>
	 			ZipCode
	 		</th>
	 	</tr>
	 		<tr>
	 			<td>
	 				<?php  echo $row1[2] ; ?>
	 			</td>
	 			<td>
	 				<?php  echo $row1[3] ; ?>
	 			</td>
	 			<td>
	 				<?php  echo $row1[4] ; ?>
	 			</td>
	 			<td>
	 				<?php  echo $row1[5] ; ?>
	 			</td>
	 			<td>
	 				<?php  echo $row1[6] ; ?>
	 			</td>
	 		</tr>
	 	</table>
	 	<center>
	 			<h5 class="bg-danger text-white">
	 					<span> <i >Owner Details</i></span>
	 			 	       
	 				</h5>
	 	</center>
	 	<table cellpadding="20" class="table table-striped ">
	 		<tr >
	 		<th>
	 			OwnerId
	 		</th>
	 		<th>
	 			OwnerName
	 		</th>
	 		<th>
	 			OwnerEmail
	 		</th>
	 		<th>
	 			OwnerPhone
	 		</th>
	 		</tr>
	 		<tr>
	 			<td>
	 				<?php  echo $row2[0] ; ?>
	 			</td>
	 			<td>
	 				<?php  echo $row2[1] ; ?>
	 			</td>
	 		
	 		
	 			<td>
	 				<?php  echo $row2[2] ; ?>
	 			</td>
	 		
	 		
	 			<td>
	 				<?php  echo $row2[3] ; ?>
	 			</td>
	 		</tr>
	 	</table>
	 	<center>
	 			<h5 class="bg-danger text-white">
	 					<span> <i >Manager Details</i></span>
	 			 	       
	 				</h5>
	 	</center>
	 	<table cellpadding="20" class="table table-striped">
	 		<tr>
	 		<th>
	 			Manager Name
	 		</th>
	 		<th>
	 			Manager Email
	 		</th>
	 		<th>
	 			Manager Phone
	 		</th>
	 	</tr>
	 		<tr>
	 			<td>
	 				<?php  echo $row3[1] ; ?>
	 			</td>
	 			<td>
	 				<?php  echo $row3[2] ; ?>
	 			</td>
	 		
	 		
	 			<td>
	 				<?php  echo $row3[3] ; ?>
	 			</td>
	 		</tr>
	 	</table>
	 	<center>
	 			
	 			<h5 class="bg-danger text-white">
	 					<span> <i >Reservation Manager Details</i></span>
	 			 	       
	 				</h5>
	 	</center>
	 	<table cellpadding="20" class="table table-striped">
	 		<tr>
	 		<th>
	 			Res-Manager Name 
	 		</th>
	 		<th>
	 			Res-Manager Email
	 		</th>
	 		<th>
	 			Res-Manager Phone
	 		</th>
	 		
	 		<th>
	 			keywords
	 		</th>
	 		
	 	</tr>
	 		<tr>
	 			<td>
	 				<?php  echo $row4[2] ; ?>
	 			</td>
	 			<td>
	 				<?php  echo $row4[3] ; ?>
	 			</td>
	 		
	 		
	 			<td>
	 				<?php  echo $row4[4] ; ?>
	 			</td>
	 			<td>
	 				<?php
	 				if($row4[5]==='')
	 				{
	 					echo ".......";
	 				}
	 				else
	 				{
	 					echo $row4[5];
	 				}
	 				?>
	 			</td>
	 			
	 			
	 			

	 		</tr>

	 	</table>

	 </form>
	</div>
	 

</body>
</html>