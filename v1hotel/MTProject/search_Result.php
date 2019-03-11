
<?php
function Display()
{
     while ($row = mysqli_fetch_array($result)) {
    
    $path="\"javascript: form.action='view.php?hotel_id=".$row['hotel_id']."'\"";
        
    $output =  '<div class="row mb-3">
          <div class="col-md-12">
            <div class="card">

              <div class="card-body">

                <div class="row">
                  <div class="col-md-3">
                    <img    src="data:image/jpeg;base64,'.base64_encode($row["hotel_image"]).'" class="img-sm">
                  </div>
                  <div class="col-md-6">
                  
                  <h6 style="text-transform:uppercase">'.$row['hotel_name'].'<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i></h6>
                    <p>'.$row['location'].'</p>
                    <p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban"></i>Free Cancellation</span></strong></p>

                    <ul class="list-inline">
                      <li class="list-inline-item" ><input type="button" onclick="" data-toggle="modal" data-target="#view" class="btn preview" style="background-color:#FF6F71" value="Preview" text="'.$row['hotel_id'].'">

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              
                            </div>
                          </div>
                        </div></li>
                        <li class="list-inline-item mt-5" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg"  style="background-color:#FF6F71">Map view</button>

                          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <p>Map view page</p>
                              </div>
                            </div>
                          </div></li>
                          <li class=mt-5 list-inline-item" style="float: right;"><i style="color: green">Very good!</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white" align="center"><b>9.5</b></p></li>

                        </ul>
                      </div>
                      <div class="col-md-3">
                        <h4>USD '.$row["hotel_price"].' $</h4>
                        <p>avg/Night</p>
                        <form method="POST" action="view.php">
                        <input type="submit" name="book_now"   onclick='.$path.'  data-target="" data-toggle="" value="Book Now" class="btn mt-2 mb-3 bl-1"     style="background-color:#FF6F71" >
                        </form>

                        <!-- price from other companies -->
                        <i class="mr-1">Expedia</i><span>3050&#x20B9;</span>
                        <i class="mr-1">Booking.com</i><span>5070&#x20B9;</span>
                        <i class="mr-1">MakemyTrip</i> <span>4200&#x20B9;</span>


                        <script>
                          function viw_room(){
                            window.location.href = "view.php";
                          }
                        </script>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

';
echo $output;
  }

}
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
	 

	 
	 	<div class="row">
				<div class="col-md-12 ">
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
			 
			</div>

 

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


						<div class="row mb-3">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<strong><p>Price per Night</p></strong>
										<div>
											<select name="" id=""  class="custom-select">
												<option value="">1000-2000</option>
												<option value="">200-3000</option>
												<option value="">3000-500</option>
												<option value="">200-3000</option>
												<option value="">3000-5000</option>
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
											<input type="checkbox" class="custom-control-input" id="AppartmentCustomCheck" name="Appartment">
											<label class="custom-control-label" for="AppartmentCustomCheck">Appartment</label>
										</div>
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="GuesthouseCustomCheck" name="Guesthouse">
											<label class="custom-control-label" for="GuesthouseCustomCheck">Guest house</label>
										</div>


										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="villaCustomCheck" name="Villa">
											<label class="custom-control-label" for="villaCustomCheck">Villa</label>
										</div> 

										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="ResortCustomCheck" name="Resort">
											<label class="custom-control-label" for="ResortCustomCheck">Resort</label>
										</div>

										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="HotelCustomCheck" name="Hotel">
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
							<!-- 	<div class="form-group">
									<input type="text" class="form-control" name="" width="300" style="border-radius: 5px"><br>
									<div class=" input-grpup-prepend">
										<i class="fa fa-search"></i>
									</div>
								</div> -->
								<button class="form-control btn btn-success">Apply</button>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<!-- <div class="row">
					<div class="col-md-12">
						<div class="col-md-3">
							<select name="" id="" class="custom-select">
								<option value="">Apartment</option>
								<option value="">Villa</option>
								<option value="">Gust House</option>
								

							</select>
							<span class="fa fa-star" id="s1" onclick="rate(this,1)"></span>
							<span class="fa fa-star" id="s2" onclick="rate(this,2)"></span>
							<span class="fa fa-star" id="s3" onclick="rate(this,3)"></span>
							<span class="fa fa-star" id="s4" onclick="rate(this,4)"></span>
							<span class="fa fa-star" id="s5" onclick="rate(this,5)"></span>
						</div>

						 
					</div>
				</div> -->


				<!-- start of the first section-->

				<div class="row mb-3 	" style="background-color:#FF6F71;color:white;z-index: 199999;">
					

					<div class="col-md-3 mt-2" >
						<span style="background-color:#FF6F71;color:white;">By Rating</span>
						<span class="fa fa-star" id="s1" onclick="rate(this,1)"></span>
						<span class="fa fa-star" id="s2" onclick="rate(this,2)"></span>
						<span class="fa fa-star" id="s3" onclick="rate(this,3)"></span>
						<span class="fa fa-star" id="s4" onclick="rate(this,4)"></span>
						<span class="fa fa-star" id="s5" onclick="rate(this,5)"></span>
					</div>
					<div class="col-md-2" >
						<select name="" id="" class="custom-select" style="background-color:#FF6F71;border: none;color:white">
							<option value="" selected>By Accommodation</option>
							<option value="">Villa</option>
							<option value="">Resort</option>
							<option value="">Villas</option>
							<option value="">Gust House</option>



						</select>
					</div>


					<div class="col-md-2">
						<select name="" id="" class="custom-select" style="background-color:#FF6F71;border: none;color:white">
							<option value="" selected>By price</option>
							<option value="">3000-5000</option>
							<option value="">4000-700</option>
							<option value="">3000-5000</option>
							<option value="">4000 + </option>


						</select>
					</div>

					<div class="col-md-2">
						<select name="" id="" class="custom-select" style="background-color:#FF6F71;border: none;color:white">
							<option value="" selected>By Location</option>
							<option value="">Bangalore</option>
							<option value="">Chenai</option>
							<option value="">Delhi </option>
							<option value="">Location</option>
							<option value="">Bangalore</option>
							<option value="">Chenai</option>
							<option value="">Delhi </option>




						</select>
					</div>

					<div class="col-md-2">


						<button class="btn  btn-danger pr-5 pl-5" style="background-color:#FF6F71;border: none;color:white"> Sort</button>
					</div>
				</div>

				<div class="row mb-3">
					<div class="col-md-12">
						<div class="card">

							<div class="card-body">

								<div class="row">
									<div class="col-md-3">
										<img    src="images/image/hotel3.jpg" class="img-sm">
									</div>
									<div class="col-md-6">
										<h4>Parisien Hotel<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-xs"></i><i class="fa fa-star"></i></i></h4>
										<p>Tavarekere Main road,560029 India Bangalore</p>
										<p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban"></i>Free Cancellation</span></strong></p>

										<ul class="list-inline">
											<li class="list-inline-item" ><button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn" style="background-color:#FF6F71">Preview</button>

												<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<?php include 'single_view.php'; ?>
														</div>
													</div>
												</div></li>
												<li class="list-inline-item mt-5" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg"  style="background-color:#FF6F71">Map view</button>

													<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<p>Map view page</p>
															</div>
														</div>
													</div></li>
													<li class=mt-5 list-inline-item" style="float: right;"><i style="color: green">Very good!</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white" align="center"><b>9.5</b></p></li>

												</ul>
											</div>
											<div class="col-md-3">
												<h4>USD 500.5 $</h4>
												<p>avg/Night</p>
												<button  onclick=" viw_room();" type="button" class="btn mt-2 mb-3 bl-1"     style="background-color:#FF6F71">	Book Now</button>

												<!-- price from other companies -->
												<i class="mr-1">Expedia</i><span>3050&#x20B9;</span>
												<i class="mr-1">Booking.com</i><span>5070&#x20B9;</span>
												<i class="mr-1">MakemyTrip</i> <span>4200&#x20B9;</span>


												<script>
													function viw_room(){
														window.location.href = "view.php";
													}
												</script>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>

						<!-- end of the first  section -->
						<div class="row mb-3">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-3">
												<img src="images/image/hotel6.jpg" class="img-sm">
											</div>
											<div class="col-md-6">
												<h4>Parisien Hotel<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-xs"></i><i class="fa fa-star"></i></i></h4>
												<p>Tavarekere Main road,560029 India Bangalore</p>
												<p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban"></i>Free Cancellation</span></strong></p>


												<ul class="list-inline">
													<li class="list-inline-item" ><button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn" style="background-color:#FF6F71">Preview</button>

													</li>
													<li class="mt-5 list-inline-item" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg"  style="background-color:#FF6F71">Map view</button>

														<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<p>Map view page</p>
																</div>
															</div>
														</div></li>
														<li class="list-inline-item" style="float: right;"><i style="color: green">Very good!</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white" align="center"><b>9.5</b></p></li>

													</ul>
												</div>

												<div class="col-md-3">
													<h4>USD 500.5 $</h4>
													<p>avg/Night</p>

													<button  onclick=" viw_room();" type="button" class="btn mt-2 mb-3 bl-1"     style="background-color:#FF6F71">	Book Now</button>

													<!-- price from other companies -->
													<i class="mr-1">Expedia</i><span>3050&#x20B9;</span>
													<i class="mr-1">Booking.com</i><span>5070&#x20B9;</span>
													<i class="mr-1">MakemyTrip</i> <span>4200&#x20B9;</span>


													<script>
														function viw_room(){
															window.location.href = "view.php";
														}
													</script>

												</div>
											</div>

										</div>
									</div>
								</div>
							</div>

							<!-- start of the first section-->
							<div class="row mb-3">
								<div class="col-md-12">
									<div class="card">

										<div class="card-body">

											<div class="row">
												<div class="col-md-3">
													<img  class="img-responsive img-sm" src="images/image/hotel3.jpg">
												</div>
												<div class="col-md-6">
													<h4>Parisien Hotel<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-xs"></i><i class="fa fa-star"></i></i></h4>
													<p>Tavarekere Main road,560029 India Bangalore</p>
													<p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban"></i>Free Cancellation</span></strong></p>

													<ul class="list-inline">
														<li class="list-inline-item" ><button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn" style="background-color:#FF6F71">Preview</button>

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
																<li class="list-inline-item" style="float: right;"><i style="color: green">Very good!</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white" align="center"><b>9.5</b></p></li>

															</ul>
														</div>
														<div class="col-md-3">
															<h4>USD 500.5 $</h4>
															<p>avg/Night</p>

															<button  onclick=" viw_room();" type="button" class="btn mt-2 mb-3 bl-1"     style="background-color:#FF6F71">	Book Now</button>

															<!-- price from other companies -->
															<i class="mr-1">Expedia</i><span>3050&#x20B9;</span>
															<i class="mr-1">Booking.com</i><span>5070&#x20B9;</span>
															<i class="mr-1">MakemyTrip</i> <span>4200&#x20B9;</span>


															<script>
																function viw_room(){
																	window.location.href = "view.php";
																}
															</script>
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>

									<!-- end of the first  section -->

									<!-- start of the first section-->
									<div class="row mb-3">
										<div class="col-md-12">
											<div class="card">

												<div class="card-body">

													<div class="row">
														<div class="col-md-3">
															<img  class="img-responsive img-sm" src="images/image/hotel2.jpg">
														</div>
														<div class="col-md-6">
															<h4>Parisien Hotel<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star fa-xs"></i><i class="fa fa-star"></i></i></h4>
															<p>Tavarekere Main road,560029 India Bangalore</p>
															<p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban"></i>Free Cancellation</span></strong></p>

															<ul class="list-inline">
																<li class="list-inline-item" ><button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn" style="background-color:#FF6F71">Preview</button>

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
																		<li class="list-inline-item" style="float: right;"><i style="color: green">Very good!</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white" align="center"><b>9.5</b></p></li>

																	</ul>
																</div>
																<div class="col-md-3">
																	<h4>USD 500.5 $</h4>
																	<p>avg/Night</p>

																	<button  onclick=" viw_room();" type="button" class="btn mt-2 mb-3 bl-1"     style="background-color:#FF6F71">	Book Now</button>

																	<!-- price from other companies -->
																	<i class="mr-1">Expedia</i><span>3050&#x20B9;</span>
																	<i class="mr-1">Booking.com</i><span>5070&#x20B9;</span>
																	<i class="mr-1">MakemyTrip</i> <span>4200&#x20B9;</span>

																	<script>
																		function viw_room(){
																			window.location.href = "view.php";
																		}
																	</script>
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>

											<!-- end of the first  section -->

										</div>
									</div>
								</div>
							</section>
							<!--cta section-->






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

						</body>
						</html>
