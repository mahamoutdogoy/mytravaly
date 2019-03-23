<?php

require_once 'config.php';
$query1 = "SELECT * FROM property_details WHERE property_id =".$_REQUEST['property_id']."";
$result1= mysqli_query($connect,$query1);
$row1 = mysqli_fetch_array($result1);
$string =  $row1['map_address'];
$map_address = str_replace(' ', '%20', $string);
function make_query_trend($connect)
{
	$query = "SELECT room_image AS image FROM room_image WHERE property_id=".$_REQUEST['property_id']."";
	$result = mysqli_query($connect, $query);
	return $result;
}

function make_slide_indicators_trend($connect)
{
	$output = ''; 
	$count = 0;
	$result = make_query_trend($connect);
	while($row = mysqli_fetch_array($result))
	{
		if($count == 0)
		{
			$output .= '
			<li data-target="#carousel-thumb" data-slide-to="'.$count.'" class="active"></li>

			';
		}
		else
		{
			$output .= '
			<li data-target="#carousel-thumb" data-slide-to="'.$count.'" >
			';
		}
		$output .= '
			<img   src="data:image/jpeg;base64,'.base64_encode($row["image"]).'" width="" height="" class="img-responsive w-100" style="position:center;"/>
			</li>
			';
		$count = $count + 1;
	}
	return $output;
}

function make_slides_trend($connect)
{
	$output = '';
	$count = 0;
	$result = make_query_trend($connect);
	while($row = mysqli_fetch_array($result))
	{
		if($count == 0)
		{
			$output .= '<div class="carousel-item active mr-0 ml-0 pr-1 pl-1 " >';
		}
		else
		{
			$output .= '<div class="carousel-item mr-0 ml-0 pr-1 pl-1" > ';

		}
		$output .='
		<img   src="data:image/jpeg;base64,'.base64_encode($row["image"]).'"   class="img-responsive w-100" style="position:center;"/>
		</div>

		';
		$count = $count + 1;
	}
	return $output;
}


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	</head>
	<body>
		

		<div class="container1" >

			<div class="row mb-0" style="background-color:#FF6F61;border-radius: 10px 10px 0px 0px;">
				<div class="col-sm-6" style="color: white;">
					<h4><?php echo $row1['propertyname']; ?><i class="text-warning ml-4 fa fa-star fa-xs"><i class="fa fa-star fa-xs"></i><i class="fa fa-star fa-xs"></i><i class="fa fa-star fa-xs"></i><i class="fa fa-star fa-xs"></i></i></h4>
					<p><?php echo $row1['address']; ?></p>


				</div>

				<div class="col6 mt-2">
					<p><strong style="color: white;"><i class="fas fa-wifi fa-xs"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban fa-xs"></i>Free Cancellation</span></strong></p>
				</div>
			</div>




			<div class="row  jumbotron mb-0" style="background-color:white;border-radius: 0px 0px 10px 10px;">
				<div class="col-sm-6">
					<div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
						<!--Slides-->
						<div class="carousel-inner" role="listbox" >
							<?php echo make_slides_trend($connect); ?>
						</div>
						<!--/.Slides-->
						<!--Controls-->
						<a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
						<!--/.Controls-->
						<ol class="carousel-indicators bg-light" >
							<?php echo make_slide_indicators_trend($connect); ?>
						</ol>
					</div>
				</div>

				<div class="col-sm-4">

					<iframe src="https://maps.google.com/maps?q=<?php echo $map_address; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" width="350" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>

				</div>




				<div class="container row col-12 m-0 p-0">
					<!-- hotel description -->
			<!-- 	<h4>Short Hotel description of <b style="color: #FF6F61;">Four season Hotel India</b></h4>
				<br>
				<p>Located in India (Bangalore), The Four season Hotel India is within a 15-minute drive of River City Shopping Complex and Asiatique The Riverfront.<a href="" style="color: #FF6F61;">More</a> </p> -->

				<h4>Amenities in <b style="color: #FF6F61;"><?php echo $row1['propertyname']; ?></b></h4>
				<div class="row">
					
					<p class="mr-3"><i style="color: #FF6F61;" class="fas fa-check"></i> Air condition</p>
					<p class="mr-3"><i style="color: #FF6F61;" class="fas fa-check"></i> Wireless internet</p>
					<p class="mr-3"><i style="color: #FF6F61;" class="fas fa-check"></i> Parking place</p>
					<p class="mr-3"><i style="color: #FF6F61;" class="fas fa-check"></i>Airport shuttle</p>
					
					<p class="mr-3"><i style="color: #FF6F61;" class="fas fa-check"></i> Parking place</p>
					<p class="mr-3"><i style="color: #FF6F61;" class="fas fa-check"></i>Airport shuttle</p>
					<p class="mr-3"><i style="color: #FF6F61;" class="fas fa-check"></i>Outdoor Pool</p>
					<p class="mr-3"><i style="color: #FF6F61;" class="fas fa-check"></i>Spa/Fitness</p>

					
					<p class="mr-3"><i style="color: #FF6F61;" class="fas fa-check"></i>Outdoor Pool</p>
					<p class="mr-3"><i style="color: #FF6F61;" class="fas fa-check"></i>Spa/Fitness</p>

					
					<form method="POST">
						<input type="submit" name="book_now" class="ml-5 btn float-right" style="background-color:#FF6F71" value="Book Now">
					</form>
				</div>

			</div>

		</div>
		
	</div>


	
</body>
</html>



