	<?php
		session_start();

		$db_host		= 'localhost';
		$db_user		= 'root';
		$db_pass		= '';
		$db_database	= 'mytravaly'; 
		$location = $_SESSION["location"];
		
		$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_database) or die('Unable to establish a DB connection');
		
		;
	 if(isset($_POST['location']))
	 {
		$_SESSION["location"] = $_POST["location"];
		$location = $_SESSION["location"];
	 }
	
	 if (isset($_POST["Villa"])) {
		 
		$query ="SELECT * FROM property_details 
		WHERE address LIKE '%".$_SESSION["location"]."%'
		OR city LIKE '%".$_SESSION["location"]."%' 
		OR propertyname  LIKE '%".$_SESSION["location"]."%'
		OR state   LIKE '%".$_SESSION["location"]."%'
		and  AccomodationType like '%villa%'";
	  }
	  if (isset($_POST["Appartment"])) {
 		$query ="SELECT * FROM property_details 
		 where  AccomodationType like '%appartment%'";
	  }
	  if (isset($_POST["Resort"])) {
  		$query ="SELECT * FROM property_details 
		WHERE address LIKE '%".$_SESSION["location"]."%'
		OR city LIKE '%".$_SESSION["location"]."%' 
		OR propertyname  LIKE '%".$_SESSION["location"]."%'
		OR state   LIKE '%".$_SESSION["location"]."%'
		and  AccomodationType like '%Resort%'";
	  }
	  
	 
	  else {
		$query ="SELECT * FROM property_details 
		WHERE address LIKE '%".$_SESSION["location"]."%'
		OR city LIKE '%".$_SESSION["location"]."%' 
		OR propertyname  LIKE '%".$_SESSION["location"]."%'
		OR state   LIKE '%".$_SESSION["location"]."%'";
 	  }
	  
	 	
	
$sortingCode = "";
$sort_type ="";
$sort_element = "";
function sortresult($sortby,$sort_type)
 {
if (isset($sortby) && $sortby != "") {
    $sort_element = " ORDER BY ".$sortby ;
} 
else
{
    $sort_element = " ORDER By avg_price ";

}
if (isset($sort_type) && $sort_type != "") {
    $sort_type = $sort_type;
} 
else
{
    $sort_type = " asc ";

}
 }
 
$sortingCode = "$sort_element $sort_type";





		// $query = "SELECT  *
		//  from property_details as p inner join room_details as r on r.property_id = p.property_id
		//  WHERE p.country like LIKE '%$location%' 
		//  OR p.city like LIKE '%$location%' 
		//  OR p.propertyname like LIKE '%$location%'  ";

	 
	
		?>
	
		


	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<!--date picker-->
	<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	-->    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

	<!-- js -->


	<style>
	/*html,body{
		height: 100%;
		width: 100%;
		
		}*/
		.container{
			min-height: 100%;
			min-width: 100%;
		}
		a:hover{

			text-decoration: none;
			border: none;
		}
		.checked{
			color: orange;
		}
		.buttons {
			background-color: 
		}



		.ui-group-buttons .or{position:relative;float:left;width:.3em;height:1.3em;z-index:3;font-size:12px}
		.ui-group-buttons .or:before{position:absolute;top:50%;left:50%;content:'or';background-color:#5a5a5a;margin-top:-.1em;margin-left:-.9em;width:1.8em;height:1.8em;line-height:1.55;color:#fff;font-style:normal;font-weight:400;text-align:center;border-radius:500px;-webkit-box-shadow:0 0 0 1px rgba(0,0,0,0.1);box-shadow:0 0 0 1px rgba(0,0,0,0.1);-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box}
		.ui-group-buttons .or:after{position:absolute;top:0;left:0;content:' ';width:.3em;height:2.84em;background-color:rgba(0,0,0,0);border-top:.6em solid #5a5a5a;border-bottom:.6em solid #5a5a5a}

		.ui-group-buttons .btn{float:left;border-radius:0}




		.bg-orange {background:#d8622b;color:#fff!important;}
		body{background:#f4f4f4;}
		i 
		a {color:#696969;}



		/*viw map carouseel*/

			/* .container{
				min-width: 100%;
				} */
				.carousel-thumbnails .carousel-indicators img {
					max-width: 100px;
					height: 70px;
					overflow: hidden;
					display: block;
				}


				.carousel-thumbnails .carousel-indicators li {
					height: auto;
					max-width: 100px;
					width: 100px;
					border: none;
					box-shadow: 1px 3px 5px 0px rgba(0,0,0,0.75);
					
					&.active {
						border-bottom: 4px solid #fff;
					}

				}
				.container1 {
					width: 100%;
				}


				.img-sm {
					width: 200px;
					height: 200px;
					max-height: 200px;
					max-width: 200px;
					object-fit: cover;
				}



				/* Header style*/




				img[src="images/logo.png"] {
					padding-top:-20px;
					height:75px;

				}
				ul.nav li {
					padding-top:8px;
				}
				ul.nav li a {
					color: #FF6F61;
					padding: 5px;
					margin-right: 8px;
				}
				.hotels a:hover,ul.nav li a:hover {
					padding: 5px;
					background-color:#20b2aa;
					border-radius: 5px;
					color: black;
					line-height:20px;
				} 

				.hotels {

					padding: 0px;

				}
				.top_container {
					margin-top:20px;
				}
				#top_menu {
					position: absolute;
					left: 873px;
					background-color:#FF6F61;

					border-radius: 5px;

				}



				#top_menu ul li a {
					color: white;
					padding: 2px;
					padding-top: 1px;
					margin-top: -5px;
					border-right: 0px solid white;
				}

				#top_menu ul li a:hover {
					background-color:#FF6F56;
				}



				.login-modal-header {
					background-color:#FF6F56;
				}
				.Remember_checkbox{
					padding-left: 5px;

				}

				#modaltitle{
					color: white;
					padding: 20PX;
				}
				#modaltitle {
					margin-left: 160px;
					padding: 10px;
					color: white;
					font-family: Arial, Helvetica, sans-serif;

				}
				.hotels_link {
					border: 1px solid red;

					border-radius: 5px;
				}


				/*   collapse */ 

				/*    */
				input[name="subscribe_email"] {
					border-radius: 15px 0px 0px 15px;
					width: 80%;
				}











				.modal-footer div .forgot-pwd a {
					text-decoration: none;
					text-decoration: none;
					font-family:"Times New Roman", Times, serif;
					font-style:italic;
					font-size: 15px; 
				}
				.modal-footer div .forgot-pwd a:hover { 
					color:#FF6F56;
					text-decoration: none;
					font-family:"Times New Roman", Times, serif;
					font-style:italic;
					font-size: 15px;
				}






			</style>
		</head>
		<body>
		
				<?php 
				include("header.php");
				?>
		

		
			

	

			<section class=" mb-5">
				<div class="container">
					<div class="row title py-3">
						<div class="col-md-12">
							<h5><strong>Filter Search Result</strong></h5>
						</div>
					</div>    
					<div class="row">
						<div class="col-md-3">


							<div class="row title py-3">
								<div class="col-md-12">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62228.46235782767!2d77.54295400209305!3d12.88977953108269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae150d7349a72b%3A0xf3d03ea1e1dd3d46!2sJP+Nagar%2C+Bengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1549735491947"  height="300" frameborder="0" style="border:0" allowfullscreen></iframe>



								</div>
							</div>   

							<div class="row mb-3">
								<div class="col-md-12">
									<div class="card">
										<div class="card-body">
											<strong><p>Star</p></strong>

											<div class="row mb-3">
												<div class="col-md-12">
													<div class="card">
														<div class="card-body">

															<span class="fa fa-star" id="star1" onclick="add(this,1)"></span>
															<span class="fa fa-star" id="star2" onclick="add(this,2)"></span>
															<span class="fa fa-star" id="star3" onclick="add(this,3)"></span>
															<span class="fa fa-star" id="star4" onclick="add(this,4)"></span>
															<span class="fa fa-star" id="star5" onclick="add(this,5)"></span>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>

                        <form  id="form" action="search.php" method="POST">
							<div class="row mb-3">
								<div class="col-md-12">
									<div class="card">
										<div class="card-body">
											<strong><p>Price per Night</p></strong>
											<div>
												<select name="" id=""  class="custom-select">
													<option value="2000">1000-2000</option>
													<option value="3000">2000-3000</option>
													<option value="5000">3000-500</option>
													<option value="3000">5000-6000</option>
													<option value="60000">7000+</option>
												</select>


											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-12">
									<div class="card">
										<div class="card-body">
											<strong><p> Accommodation type</p></strong>
											<hr>

											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input"  id="AppartmentCustomCheck" name="Appartment" <?=(isset($_POST['Appartment'])?' checked':'')?>>
												<label class="custom-control-label" for="AppartmentCustomCheck">Appartment</label>
											</div>
											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="GuesthouseCustomCheck" name="Guesthouse" <?=(isset($_POST['Guesthouse'])?' checked':'')?>>
												<label class="custom-control-label" for="GuesthouseCustomCheck">Guest house</label>
											</div>


											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="villaCustomCheck" name="Villa" <?=(isset($_POST['Villa'])?' checked':'')?>>
												<label class="custom-control-label" for="villaCustomCheck">Villa</label>
											</div> 

											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="ResortCustomCheck" name="Resort" <?=(isset($_POST['Resort'])?' checked':'')?>>
												<label class="custom-control-label" for="ResortCustomCheck">Resort</label>
											</div>

											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="HotelCustomCheck" name="Hotel" >
												<label class="custom-control-label" for="HotelCustomCheck">Hotel</label>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-md-12">
									<div class="card">
										<div class="card-body">
							 
									<input type="submit" value="Apply" class="form-control btn btn-success">

								</div>
							</div>
						</div>
					</div>

					</form>
				</div>
				<div class="col-md-9">
				 

					<div class="row mb-3 	" style="background-color:#FF6F71;color:white;z-index: 199999;">
						

						<div class="col-md-3 mt-2" >
							<span style="background-color:#FF6F71;color:white;">By Star</span>
							<span class="fa fa-star" id="s1" onclick="rate(this,1)"></span>
							<span class="fa fa-star" id="s2" onclick="rate(this,2)"></span>
							<span class="fa fa-star" id="s3" onclick="rate(this,3)"></span>
							<span class="fa fa-star" id="s4" onclick="rate(this,4)"></span>
							<span class="fa fa-star" id="s5" onclick="rate(this,5)"></span>
						</div>
						<div class="col-md-2" >
							 
						<button  class="mt-1" style="background-color:#FF6F71;border: none;color:white">  Name <i class="fa fa-sort" aria-hidden="true"></i></button>


 						</div>


						<div class="col-md-2">

							<button  class="mt-1" style="background-color:#FF6F71;border: none;color:white">  Price <i class="fa fa-sort" aria-hidden="true"></i></button>


 					</div>

						<div class="col-md-2">
						<button  class="mt-1" style="background-color:#FF6F71;border: none;color:white">  Location <i class="fa fa-sort" aria-hidden="true"></i></button>

						</div>

						<div class="col-md-2">
	

						<button  class="mt-1" style="background-color:#FF6F71;border: none;color:white">  Rating <i class="fa fa-sort" aria-hidden="true"></i></button>
						</div>
					</div>

				
	<?php
	   
		$result = mysqli_query($conn,$query);
			while ($row = mysqli_fetch_array($result)) {
 
	           ?>
	
										<div class="row mb-3">
								
											<div class="col-md-12">
												<div class="card">

													<div class="card-body">

														<div class="row">
															<div class="col-md-3">
																<img  class="img-responsive img-sm" src="data:image/jpeg;base64,<?php echo base64_encode($row["propert_image"]); ?>">
															</div>
															<div class="col-md-6">
																<span><?php echo $row['propertyname']; ?></span>
																<?php for ($i=0; $i < $row["star"]; $i++) { 
																?>
																<i class="text-warning fa fa-star"></i>
																
																<?php
																} 
																?>
 																<p><?php echo $row['address']; ?></p>
																<p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban"></i>Free Cancellation</span></strong></p>

																<ul class="list-inline">
																	<li class="list-inline-item" ><button type="button" id="preview" name="preview" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn" style="background-color:#FF6F71">Preview</button>

																		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
																			<div class="modal-dialog modal-lg">
																				<div class="modal-content">
																					<?php include 'single_view.php'; ?>
																				</div>
																			</div>
																		</div></li>
																		<li class="mt-5 list-inline-item" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg"  style="background-color:#FF6F71">Map view</button>

																			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
																				<div class="modal-dialog modal-lg">
																					<div class="modal-content">
																						<p>Map view page</p>
																					</div>
																				</div>
																			</div></li>
																			
																			<?php    
																			if($row['rating']<4 )
																			  {?>
																		     	<li class="list-inline-item" style="float: right;"><i style="color: green">Poor</i><p class="text-center mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white;"><b><?php echo $row['rating'];?></b></p></li>
																			 <?php 
																			 } 
																			else if ($row['rating']>4 && $row['rating']<=5.5 )
																			 {
																			  ?>
																					<li class="list-inline-item" style="float: right;"><i style="color: green">Meduim</i><p class="text-center mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white;"><b><?php echo $row['rating'];?></b></p></li>
																			 <?php 
																			 } 
																			else if ($row['rating']>5.5 && $row['rating']<=7 )
																			 {
																			 ?>
																			     <li class="list-inline-item" style="float: right;"><i style="color: green">Good</i><p class="text-center mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white;"><b><?php echo $row['rating'];?></b></p></li>
																				<?php 
																			  }
																						
																			 else
																				{
																				?>
																					<li class="list-inline-item" style="float: right;"><i style="color: green">Very Good</i><p class="text-center mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white;"><b><?php echo $row['rating'];?></b></p></li>

																				<?php
																				}
																				?>


																						
																			 
													


 																		</ul>
																	</div>
																	<div class="col-md-3">
																		<h4>USD <?php echo $row["avg_price"]; ?>$</h4>
																		<p>avg/Night</p>

																		<form action="view.php?property_id=<?php echo $row['property_id'];?>" method="post">
																		<input value="book now"  type="submit" class="btn mt-2 mb-3 bl-1"     style="background-color:#FF6F71">	Book Now</button>

																		</form>

 
 																		<i class="mr-1">Expedia</i><span>3050&#x20B9;</span>
																		<i class="mr-1">Booking.com</i><span>5070&#x20B9;</span>
																		<i class="mr-1">MakemyTrip</i> <span>4200&#x20B9;</span>

																	 
																	</div>
																</div>

															</div>
														</div>
													</div>
												</div>
																		<?php } ?>
												
											</div>
										</div>
									</div>
								</section>
	


		


								<!--  Single view modal -->

								<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">


											<div class="container1" >

												<div class="row mb-0" style="background-color:#FF6F61;border-radius: 10px 10px 0px 0px;">
													<div class="col-sm-6" style="color: white;">
														<h4>Parisien Hotel<i class="text-warning ml-4 fa fa-star fa-xs"><i class="fa fa-star fa-xs"></i><i class="fa fa-star fa-xs"></i><i class="fa fa-star fa-xs"></i><i class="fa fa-star fa-xs"></i></i></h4>
														<p>Tavarekere Main road,560029 India Bangalore</p>


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
																<div class="carousel-item active">
																	<img class="d-block w-100" src="image/hotel1.jpg" alt="First slide" width="350" height="360" >
																</div>
																<div class="carousel-item">
																	<img class="d-block w-100" src="image/hotel2.jpg" alt="Second slide" width="350" height="360" >
																</div>
																<div class="carousel-item">
																	<img class="d-block w-100" src="image/hotel3.jpg" alt="Third slide" width="350" height="360" >
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

														<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62228.46235782767!2d77.54295400209305!3d12.88977953108269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae150d7349a72b%3A0xf3d03ea1e1dd3d46!2sJP+Nagar%2C+Bengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1549735491947" width="350" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>

													</div>




													<div class="container row col-12 m-0 p-0">
														<!-- hotel description -->
														

														<h4>Amenities in <b style="color: #FF6F61;">Parisien Hotel</b></h4>
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



															<button type="button" class="ml-5 btn float-right" style="background-color:#FF6F71">Book now</button>			
														</div>

													</div>

												</div>

											</div>
										</div>
									</div>
								</div>
								<!--end of single view	--->


								<?php  
								include('footer.php');
								?>


								<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
								<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
								<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>

								<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

								<script type="text/javascript">  
     $(function(){
      $('.custom-control-input').on('change',function(){
         $('#form').submit();
         });
     }); 
 </script>
								<script>
									function add(ths,sno){


										for (var i=1;i<=5;i++){
											var cur=document.getElementById("star"+i)
											cur.className="fa fa-star"
										}

										for (var i=1;i<=sno;i++){
											var cur=document.getElementById("star"+i)
											if(cur.className=="fa fa-star")
											{
												cur.className="fa fa-star checked"
											}
										}

									}


									function rate(ths,sno){


										for (var i=1;i<=5;i++){
											var cur=document.getElementById("s"+i)
											cur.className="fa fa-star"
										}

										for (var i=1;i<=sno;i++){
											var cur=document.getElementById("s"+i)
											if(cur.className=="fa fa-star")
											{
												cur.className="fa fa-star checked"
											}
										}

									}
								</script>
								<script>
									$('#datepicker2').datepicker({
										uiLibrary: 'bootstrap4'
									});
									$('#datepicker').datepicker({
										uiLibrary: 'bootstrap4'
									});
								</script>

           <script >
              $(document).ready(function(){
               $('.preview').click(function()
               {
                   var id=$(this).attr('text');
                   var path="view.php?property_id="+id;
                   $('#displaydiv').load(path);
                   
               });
           });
            </script>

 
							</body>
							</html>
