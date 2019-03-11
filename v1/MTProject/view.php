	<?php

	session_start();

	$db_host		= 'localhost';
	$db_user		= 'root';
	$db_pass		= '';
	$db_database	= 'mytravaly'; 
	$location = $_SESSION["location"];
	$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_database) or die('Unable to establish a DB connection');

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

		/*search box css start here*/
		.search-sec{
			padding: 2rem;
		}
		.search-slt{
			display: block;
			width: 100%;
			font-size: 0.875rem;
			line-height: 1.5;
			color: #55595c;
			background-color: #fff;
			background-image: none;
			border: 1px solid #ccc;
			height: calc(3rem + 2px) !important;
			border-radius:0;
		}
		
		@media (min-width: 992px){
			.search-sec{
				position: relative;
				top: -114px;
				background: rgba(26, 70, 104, 0.51);
			}
		}

		@media (max-width: 992px){
			.search-sec{
				background: #1A4668;
			}
		}
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


		/* checkin and checkout*/
		.res_section {
					width: 100%;
					float: left;
					margin-top: 10px;
					padding: 15px
				}
				.mr_style .custom-select , .res_section .textboxstyle {
					width: 100%;

					color: black;
					padding: 8px 10px 8px 35px;
					border: 1px solid  #ff6f71;
					border-radius: 3px;

					font-size: 14px;
					line-height: 20px;
				}
				.mr_style .custom-select {
					color: black;
					border: 1px solid #ff6f71;
					padding: 8px 10px 8px 35px;
				}
				.mr_style {
					width: 19%;
					float: left;
					margin-right: 1%;
					position: relative;
					margin-bottom: 10px;
				}
				.mr_style i {
					position: absolute;
					left: 10px;
					top: 10px;
					color: #191919;
					font-size: 18px;
				}
				.mr_style.field_section {
					width: 16%;
					float: left;
					margin-right: 1%;
				}
				.mr_style.less-btn {
					width: 10%;
					float: left;
					margin-right: 1%;
				}
				.mr_style.less-btn .cst-btn {
					width: 85px;
					height: 85px;
					border-radius: 100%;
					position: absolute;
					top: -32px;

				}


	</style>
	</head>
	<body>
		<?php 
		include('header.php');
		?>


		<div class="container">

	<!-- 		<ul class="list-inline pr-3">
				<li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#">Home<i class="fas fa-arrow-circle-right"></i></a></li>
				<li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#">India<i class="fas fa-arrow-circle-right"></i></a></li>
				<li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#">All India<i class="fas fa-arrow-circle-right"></i></a></li>
				<li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#">Bangalore<i class="fas fa-arrow-circle-right"></i></a></li>
				<li class="list-inline-item"><a style="color: black;" class="social-icon " target="_blank" href="#">Four season Hotel India<i class="fas fa-arrow-circle-right"></i></a></li>		
			</ul> -->
			
			
			<ul class="list-inline">
				<li class="list-inline-item">
					<p><i class="fas fa-map-marker-alt" style="color: #FF6F61"></i>560029 tavarekere main road ,makana height</p>
				</li>
			</ul>
			
			<div class="row">
				<div class="col-sm-8">
					<div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
						<!--Slides-->
						<div class=" carousel-inner" role="listbox">
							<div class="carousel-item active">
								<img class="d-block w-100" src="image/hotel1.jpg" alt="First slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="image/hotel2.jpg" alt="Second slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="image/hotel3.jpg" alt="Third slide">
							</div>
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
							<li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img class="d-block w-100 h-100" src="image/hotel1.jpg" class="img-fluid"></li>
							<li data-target="#carousel-thumb" data-slide-to="1"><img class="d-block w-100 h-100" src="image/hotel2.jpg" class="img-fluid"></li>
							<li data-target="#carousel-thumb" data-slide-to="2"><img class="d-block w-100" src="image/hotel3.jpg" class="img-fluid"></li>

							<li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img class="d-block w-100 h-100" src="image/hotel4.jpg" class="img-fluid"></li>
							<li data-target="#carousel-thumb" data-slide-to="1"><img class="d-block w-100 h-100" src="image/hotel5.jpg" class="img-fluid"></li>
							<li data-target="#carousel-thumb" data-slide-to="2"><img class="d-block w-100" src="image/hotel6.jpg" class="img-fluid"></li>
						</ol>
					</div>
				</div>
				<div class="col-sm-4">
					<li class="list-inline-item" style="float:right ;"><i style="color: green">Very good!</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 50%;color: white" align="center"><b>9.5</b></p></li>
					<div class="h-45 mb-5" style="background-color: white">
						<h5>Offer::</h5>
						<p><b>Delux Room</b>
							<button style="float: right;background-color: #FF6F61;border-radius: 10px;color: ">US$ 257.6/night</button>
							<p>refoundable</p>

						</p>
						<a href="">More Room</a>	
					</div>
					<div class=" mt-5 h-60" style="background-color: white;">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62228.46235782767!2d77.54295400209305!3d12.88977953108269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae150d7349a72b%3A0xf3d03ea1e1dd3d46!2sJP+Nagar%2C+Bengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1549735491947" width="350" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>
						
					</div>
					
				</div>
			</div>

			<!-- check- in check-out -->
			

		</div>




	<div class=" mt-4 m-4 res_section" style="margin-top:100px;">
								<form action="search.php"  method="POST">
									<div class="row">
										<!-- <div class="mr_style">
											<i class="fa fa-map-marker text-danger" aria-hidden="true"></i>
											<input type="text" autocomplete="off" name="location" class="form-control textboxstyle" id="location" placeholder="City,location,hotel">
										</div> -->

										<div class="mr_style field_section">
											<i class="fa fa-calendar text-danger" aria-hidden="true"></i>
											<input type="date" autocomplete="off"  name="checkin_date" class="form-control textboxstyle"  id="checkin_date" placeholder="Check in" value="<?php echo $_SESSION['checkin_date']; ?>">
										</div>
										<div class="mr_style field_section">
											<i class="fa fa-calendar text-danger" aria-hidden="true"></i>
											<input type="date" name="checkout_date" autocomplete="off" class="form-control textboxstyle" id="checkout_date" placeholder="Check out" value="<?php echo $_SESSION['checkout_date']; ?>" >
									</div>

										<div class="mr_style field_section">
											<div class="input-group-append">
												<i class="fa fa-user text-danger"></i>
											</div>
											<select name="people" id="" class=" custom-select">
											<option value="0"  <?php if($_SESSION['room'] == 0) echo " selected";?>>people</option>
												<option value="1"  <?php if($_SESSION['people'] == 1) echo " selected";?>>1</option>
												<option value="2" <?php if($_SESSION['people'] == 2) echo " selected";?>>2</option>
												<option value="3" <?php if($_SESSION['people'] == 3) echo " selected";?>>3</option>
												<option value="4"  <?php if($_SESSION['people'] == 4) echo " selected";?>>4</option>
												<option value="5"  <?php if($_SESSION['people'] == 5) echo " selected";?>>5</option>
												<option value="6"  <?php if($_SESSION['people'] == 6) echo " selected";?>>6+</option>

											</select>

										</div>

										<div class="mr_style field_section">
											<div class="input-group-append">
												<i class="fa fa-home text-danger"></i>
											</div>
											<select name="room" id="room"  class="custom-select">
											<option value="0"  <?php if($_SESSION['room'] == 0) echo " selected";?>>people</option>
												<option value="1"  <?php if($_SESSION['room'] == 1) echo " selected";?>>1</option>
												<option value="2" <?php if($_SESSION['room'] == 2) echo " selected";?>>2</option>
												<option value="3" <?php if($_SESSION['room'] == 3) echo " selected";?>>3</option>
												<option value="4"  <?php if($_SESSION['room'] == 4) echo " selected";?>>4</option>
												<option value="5"  <?php if($_SESSION['room'] == 5) echo " selected";?>>5</option>
												<option value="6"  <?php if($_SESSION['room'] == 6) echo " selected";?>>6+</option>

											</select>


										</div>

										<div class="mr-2 col-md-3 mr_style ">
											
											<select name="children1" id="children"  class="custom-select">
												<option value="0"  <?php if($_SESSION['children'] == 0) echo " selected";?>>people</option>
												<option value="1"  <?php if($_SESSION['children'] == 1) echo " selected";?>>1</option>
												<option value="2" <?php if($_SESSION['children'] == 2) echo " selected";?>>2</option>
												<option value="3" <?php if($_SESSION['children'] == 3) echo " selected";?>>3</option>
												<option value="4"  <?php if($_SESSION['children'] == 4) echo " selected";?>>4</option>
												<option value="5"  <?php if($_SESSION['children'] == 5) echo " selected";?>>5</option>
												<option value="6"  <?php if($_SESSION['children'] == 6) echo " selected";?>>6+</option>

											</select>


										</div>
									</div>

 									
										 

 
								</form>

							</div>

		<div class="container">
			<br>  <h3 class="text-center">Confirm booking details and proceed to payment </h3>
			<hr>


			<div class="card">
				<table class="table table-hover shopping-cart-wrap">
					<thead class="table-default">
						<tr>
							<th scope="col"></th>
							<th scope="col" width="120">Cancelation</th>
							<th scope="col" width="120">Type</th>
							<th scope="col" width="200" class="text-left">People</th>
							<th scope="col" width="200" class="text-left">Price</th>
							<th scope="col" width="200" class="text-right">Action</th>


						</tr>
					</thead>
					<tbody>
			 
				</thead>
				 
			<?php
					$id = $_GET['property_id'];
					$query = " SELECT  p.property_id,p.propertyname,p.propertytype,p.AccomodationType,p.address,p.city,p.state,p.pincode,p.description,p.rating,p.propert_image,
					r.room_id,r.roomType,r.description,r.min_occupancy,r.max_occupancy,p.star,
					r.tariff,r.meal_plan,r.singleprice,r.doubleprice,r.tripleprice,
					r.person4price,r.person5price,r.person6price,r.person6price,r.person7price,
					r.person8price,r.person9price,r.extrachildprice,r.infantprice,
					r.check_in_date,r.check_out_date,r.status,r.no_of_bed,r.isRefundable,
					img.image,img.image_type
					FROM property_details as p 
					 INNER JOIN rooms_details as r on r.property_id = p.property_id
					 INNER JOIN mapping_images as mi ON mi.room_id = r.room_id 
					 INNER JOIN images as img ON img.image_id = mi.image_id
					 WHERE p.property_id = $id limit 1";
					
			$result = mysqli_query($conn,$query);
			while ($row = mysqli_fetch_array($result)) {
					?>
			<tbody>
					<tr>
						<td>
							<figure class="media">
								<div class="img-wrap"><img src="data:image/jpeg;base64,<?php echo base64_encode($row["image"]); ?>" height="800" class="img-circle   img-responsive img-sm"></div>
								<figcaption class="media-body">
									<h6 class="title text-truncate"><?php echo $row['description'] ?></h6>
									<dl class="param param-inline small">
										<dt> <span class="mr-2" style="color:white;background-color:#ff6f71;border-radious:2px;"><?php echo $row['rating']; ?></span>
										<?php for($i=0; $i <= $row['star']; $i++) { 
																?>
																<i class="text-warning fa fa-star"></i>

																<?php
																} 
																?>
										<!-- <i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-xs"></i><i class="fa fa-star"></i></i></dt> -->
										</dt>
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
						<td>
							Room only
						</td>
						<td> 
							<select class="form-control">
								<option>1</option>
								<option>2</option>	
								<option>3</option>	
								<option>4</option>	
							</select> 
						</td>
						<td> 
							<div class="price-wrap"> 
								<var class="price"><?php echo $row['singleprice'];?></var> 
								<small class="text-muted">(per night)</small> 
							</div> <!-- price-wrap .// -->
						</td>
						<td class="text-right"> 
							<a class="btn btn-danger edit" href="path/to/settings" aria-label="Settings">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</a>


							<a href="" class="btn btn-outline-danger btn-round">Book now</a>
						</td>
					</tr>




			 
				 

			</tbody>
			<?php } ?>
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