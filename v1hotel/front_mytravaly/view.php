<?php

session_start();

include'connect.php';
$query_people = "SELECT * FROM rooms_details WHERE property_id=$_REQUEST[property_id] ";
$result_people = mysqli_query($connect,$query_people);
$row_people =mysqli_fetch_assoc($result_people);

$query1 = "SELECT * FROM property_details WHERE property_id=$_REQUEST[property_id]";

$result1 = mysqli_query($connect,$query1);
$row1 = mysqli_fetch_assoc($result1);
$_SESSION['property_image'] = $row1['property_image'];
$_SESSION['adress'] = $row1['address']; 
if(isset($_POST['check_out'])){
$_SESSION['check_out'] = $_POST['check_out'];
}
if(isset($_POST['check_in'])){
$_SESSION['check_in'] = $_POST['check_in'];
}

if(isset($_POST['adults1'])){
$_SESSION['people'] =$_POST['adults1'];
}
if(isset($_POST['rooms'])){
$_SESSION['rooms'] = $_POST['rooms'];
}
if(isset($_POST['children'])){
$_SESSION['children'] = $_POST['children'];
}

if($row1['rating']>=5 && $row1['rating']<=7){
	$rating = 'good';
}elseif ($row1['rating']>7) {
	$rating = 'very good';
}
else{
	$rating = 'medium';
}

if($row1['star']==5){
	$star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
}elseif ($row1['star']==4) {
	$star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
}elseif ($row1['star']==3) {
	$star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
}
elseif ($row1['star']==2) {
	$star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i></i>';
}
else{
	$star = '<i class="text-warning ml-4 fa fa-star"></i>';
}

function make_query_trend($connect)
{
	$query = "SELECT room_image AS image FROM room_image WHERE property_id =$_REQUEST[property_id]";
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
			<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'" class="active"></li>
			';
		}
		else
		{
			$output .= '
			<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'"></li>
			';
		}
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<!-- font awsome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- js -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<style>
	.container{
		min-width: 100%;
	}
	.carousel-thumbnails .carousel-indicators img {
		max-width: 100px;
		height: 100px;
		overflow: hidden;
		display: block;
	}


	.carousel-thumbnails .carousel-indicators li {
		height: auto;
		max-width: 100px;
		width: 500px;
		border: none;
		box-shadow: 1px 3px 5px 0px rgba(0,0,0,0.75);

		&.active {
			border-bottom: 4px solid #fff;
		}

	}
	.jumbotron {

		padding: 5%;
		padding-top: 1%;
		margin-top: 1%
		width:300px;
		height: 400px;
	}
	.checked{
		color: orange;
	}

	/* TABLE*/
	.param {
		margin-bottom: 7px;
		line-height: 1.4;
	}
	.param-inline dt {
		display: inline-block;
	}
	.param dt {
		margin: 0;
		margin-right: 7px;
		font-weight: 600;
	}
	.param-inline dd {
		vertical-align: baseline;
		display: inline-block;
	}

	.param dd {
		margin: 0;
		vertical-align: baseline;
	} 

	.shopping-cart-wrap .price {
		color: #007bff;
		font-size: 18px;
		font-weight: bold;
		margin-right: 5px;
		display: block;
	}
	var {
		font-style: normal;
	}

	.media img {
		margin-right: 1rem;

	}
	.img-sm {
		width: 110px;
		max-height: 120px;
		object-fit: cover;
	}


</style>
</head>
<body>
	


	<div class="container">
		<ul class="list-inline pr-3">
			<li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#">Home<i class="fas fa-arrow-circle-right"></i></a></li>
			<li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#"><?php echo $_SESSION['location']; ?><i class="fas fa-arrow-circle-right"></i></a></li>
			<li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#"><?php echo $row1['city']; ?><i class="fas fa-arrow-circle-right"></i></a></li>
			<li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#"><?php echo $_SESSION['check_in'].'/'.$_SESSION['check_out']; ?><i class="fas fa-arrow-circle-right"></i></a></li>
			<li class="list-inline-item"><a style="color: black;" class="social-icon " target="_blank" href="#"><?php echo $row1['propertyname']; ?><i class="fas fa-arrow-circle-right"></i></a></li>	
			<li class="list-inline-item float-right"><a href=""><img src="images/logo.png" class="float-left" alt="" style="margin-left:-90px; "></a></li>	
		</ul>
		<p>
			<h4 ><b style="color:#FF6F61; "><?php echo $row1['propertyname']; ?></b>
				<?php echo $star; ?></h4>
			</p>
			<ul class="list-inline">
				<li class="list-inline-item">
					<p><i class="fas fa-map-marker-alt" style="color: #FF6F61"></i><?php echo $_SESSION['adress']; ?></p>
				</li>
			</ul>
			
			<div class="row">
				<div class="col-sm-8" >
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php echo make_slide_indicators_trend($connect); ?>
						</ol>
						<div class="carousel-inner">

							<?php echo make_slides_trend($connect); ?>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>

				<div class=" jumbotron col-sm-4">
					<li class="list-inline-item" style="float:right ;"><i style="color: green"><?php echo $rating; ?></i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 50%;color: white" align="center"><b><?php echo $row1['rating']; ?></b></p></li>
					<div class="jumbotron h-50" style="background-color: white">
						<h5>Offer::</h5>
						<p><b>Delux Room</b>
							<button style="float: right;background-color: #FF6F61;border-radius: 10px;color: ">US$ <?php echo $row1['property_price']; ?>/night</button>
							<p>refoundable</p>

						</p>
						<a href="">More Room</a>	
					</div>
					<div class="jumbotron h-50" style="background-color: white;">
						<img src="image/map.png" width="400" height="150">
						
					</div>
					
				</div>
			</div>

			<!-- check- in check-out -->
			<form method="POST">
			<ul class="row list-inline mt-5" style="background-color:#FF6F61 ">
				<li class="col-sm-2 list-inline-item"><p><b>Check-In date</b>
					<input type="date"  class="" width="300"  value="<?php echo $_SESSION['check_in']; ?>" name="check_in" />
				


			</p></li>
			<li class="col-sm-2 list-inline-item"><p><b>Check-Out date</b>
				<input type="date"  class="" width="300" value="<?php echo $_SESSION['check_out']; ?>" name="check_out" />
			</p></li>
			<li class="col-sm-2 list-inline-item"><b>Rooms:</b>
				<select class="browser-default custom-select" name="rooms">
					<option selected value="<?php echo $_SESSION['rooms']; ?>"><?php echo $_SESSION['rooms']; ?></option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select></li>
				<li class="col-sm-3 list-inline-item"><b>Adults:</b>
					
						<select class="browser-default custom-select" onchange="this.form.submit()" name="adults1">
							<option selected value="<?php echo $_SESSION['people']; ?>"><?php echo $_SESSION['people']; ?></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
					</li>
					<li class="col-sm-2 list-inline-item"><b>Childrens:</b>
						<select class="browser-default custom-select" name="children">
							<option selected value="<?php echo $_SESSION['children']; ?>"><?php echo $_SESSION['children']; ?></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select></li>	
					</ul>
					</form> 
					

				</div>

				<div class="container">
					<br>  <h3 class="text-center">Confirm booking details and proceed to payment </h3>
					<hr>



					<div class="card">
						<table class="table table-hover shopping-cart-wrap">
							<thead class="table-default">
								<tr>
									<th scope="col">Room</th>
									<th scope="col" width="120">Cancelation</th>
									<th scope="col" width="120">Type</th>
									<th scope="col" width="200" class="text-left">People</th>
									<th scope="col" width="200" class="text-left">Price</th>
									<th scope="col" width="200" class="text-right">Action</th>


								</tr>
							</thead>
							<?php 


							$query_room = "SELECT * FROM rooms_details WHERE property_id = $_REQUEST[property_id]";
							$result_room = mysqli_query($connect,$query_room);
							$adults1 = 1;
							while($row_room = mysqli_fetch_array($result_room)){
								
								$room_price = $row_room['singleprice'];
								
								if(isset($_POST['adults1'])){
									$adults1 = 0;
								
									$adults1 = $_SESSION['people'];
								if($adults1==1){
									$room_price=0;

									$room_price = $row_room['singleprice'];

								}elseif ($adults1==2) {
									$room_price=0;
									$room_price = $row_room['doubleprice'];
								}elseif ($adults1==3) {
									$room_price=0;
									$room_price = $row_room['tripleprice'];
								}}

								$rooms='
								<tbody>
								<tr>
								<td>
								<figure class="media">
								<div class="img-wrap"><img   src="data:image/jpeg;base64,'.base64_encode($row1["property_image"]).'"   class="img-responsive " height="150" width="200" style="position:center;"/></div>
								<figcaption class="media-body">
								<h6 class="title text-truncate">'.$row1["propertyname"].','.$row1["address"].'</h6>
								<dl class="param param-inline small">
								<dt><h4>'.$row1["propertyname"].$star.'</h4></dt>
								<dd><p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban"></i>Free Cancellation</span></strong></p></dd>



								</dl>
								<dl class="param param-inline small">
								<dt>Type:</dt>
								<dd>Apartment</dd>
								</dl>
								</figcaption>
								</figure> 
								</td>

								<td>
								Non-Refundable

								</td>
								<td class="text-success">
								'.$row_room['roomType'].'
								</td>
								<td> 
								<select class="form-control">
								<option selected>'.$adults1.'</option>
								<option>1</option>
								<option>2</option>	
								<option>3</option>	
								<option>4</option>	
								</select> 
								</td>
								<td> 
								<div class="price-wrap"> 
								<var class="price">USD '.$room_price.'</var> 
								<small class="text-muted">(per night)</small> 
								</div> <!-- price-wrap .// -->
								</td>
								<td class="text-right"> 
								<a class="btn btn-danger edit" href="path/to/settings" aria-label="Settings">
								<i class="fa fa-trash" aria-hidden="true"></i>
								</a>


								<a href="reservation.php" class="btn btn-outline-danger btn-round">Book now</a>
								</td>
								</tr>





								</tr>
								</thead>';
								echo $rooms;
							}


							?>

						</tbody>
					</table>

						
					</div> <!-- card.// -->

				</div> 
				<!--container end.//-->

				<br><br>
				<?php 
				include('footer.php');
				?>
			</body>
			</html>