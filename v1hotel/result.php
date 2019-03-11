<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!--date picker-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

	<!-- js -->
	

	<style>
	html,body{
		height: 100%;
		width: 100%;
		
	}
	.container{
		min-height: 100%;
		min-width: 100%;
	}
	a:hover{
		background-color:#FF6F61; 
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
	
</style>
</head>
<body>

	<div class="container">

		
		<ul class="list-inline pr-3">
			<li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#">Home<i class="fas fa-arrow-circle-right"></i></a></li>
			<li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#">India<i class="fas fa-arrow-circle-right"></i></a></li>
			<li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#">All India<i class="fas fa-arrow-circle-right"></i></a></li>		
		</ul>

		<h4>1000 Hotels avilable in India</h4>
		
		<div class="row">
			<div class="col-sm-3">
				<h5>check in map</h5>
				<img src="image/map.png" height="200" width="300">
				<p><b>Check-In date</b>
					<input id="datepicker" width="300"/>
					
				</p>
				<p><b>Check-Out date</b>
					<input id="datepicker2" width="300" />
					
				</p>
				<hr style="background-color: : #FF6F61">
				<p><b>Price per Night</b></p>
				<div>
					<select name="" id=""  class="custom-select">
						<option value="">1000-2000</option>
						<option value="">200-3000</option>
						<option value="">3000-500</option>
						<option value="">200-3000</option>
						<option value="">3000-5000</option>
					</select>


				</div>
				<p>
					
					<h4>Star Rating</h4>
					<span class="fa fa-star" id="star1" onclick="add(this,1)"></span>
					<span class="fa fa-star" id="star2" onclick="add(this,2)"></span>
					<span class="fa fa-star" id="star3" onclick="add(this,3)"></span>
					<span class="fa fa-star" id="star4" onclick="add(this,4)"></span>
					<span class="fa fa-star" id="star5" onclick="add(this,5)"></span>

				</p>
				<p>
					<h5>Accommodation type</h>
						<div class="custom-control custom-checkbox mb-3">
							<input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
							<label class="custom-control-label" for="customCheck">Appartment</label>
						</div>
						<div class="custom-control custom-checkbox mb-3">
							<input type="checkbox" class="custom-control-input" id="customCheck1" name="example1">
							<label class="custom-control-label" for="customCheck1">Guest house</label>
						</div>
						<div class="custom-control custom-checkbox mb-3">
							<input type="checkbox" class="custom-control-input" id="customCheck2" name="example1">
							<label class="custom-control-label" for="customCheck2">Hotel</label>
						</div>
						
					</div>	<h4>Room</h4>
					<input type="text" class="form-control" name="" width="300" style="border-radius: 5px"><br>

					<button class="form-control btn btn-success"><i class="fa fa-search fa-lg"></i>Search</button>
				</p>
			</div>
			<div class="col-sm-9">
				
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="search-box jumbotron p-3 m-1">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<select class="custom-select">
									<option>Sort By Price</option>
									<option>Sort By Price</option>
									<option>Sort By Price</option>
								</select>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<select class="custom-select">
									<option>Sort By Ranking</option>
									<option>Sort By Ranking</option>
									<option>Sort By Ranking</option>
								</select>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<i class="fa fa-list" aria-hidden="true"></i>
								<i class="fa fa-th" aria-hidden="true"></i>
							</div>
						</div>
					</div>
					
					
				</div>


				<!-- Displaying hotel images and price detail -->
				
				<div class=" jumbotron pt-2 pb-0 mt-2 row">
					
					<div class=" col-sm-4">
						<ul class="list-inline pr-3">
							<li class="list-inline-item mt-3"><a class="social-icon" target="_blank" href="#"><img src="image/hotel1.jpg" class="img-circle" width="200" height="200"></a></li>

						</ul>
					</div>
					<div class=" col-sm-6">
						<h4>Parisien Hotel<i style="width: 50%;height: 50%" class="text-warning">****</i></h4>
						<p>Tavarekere Main road,560029 India Bangalore</p>
						<p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi</strong></p>
						<p><strong style="color: green"><i class="fas fa-check"></i>Free Cancellation</strong></p>
						<ul class="list-inline">
							<li class="list-inline-item" ><button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn" style="background-color:#FF6F71">Preview</button>

								<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<?php include 'single_view.php'; ?>
										</div>
									</div>
								</div></li>
								<li class="list-inline-item" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg"  style="background-color:#FF6F71">Map view</button>

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
							<div class="col-sm-2" style="min-height: 100% ;border-left:5px solid #FF6F61;border-radius: 10px">
								<h4>US$ 500.5</h4>
								<p>avg/Night</p>
								<a href="view.php"><button class="pr-4 pl-4" style="color: white;border-radius: 10px;background-color: #FF6F61;">Book Now</button></a>
								<!-- price from other companies -->
								<p><b>Expedia</b>::<span>3050&#x20B9;</span></p>
								<p><b>Booking.com</b>::<span>5070&#x20B9;</span></p>
								<p><b>MakemyTrip</b>::<span>4200&#x20B9;</span></p>

								
							</div>
							
							
						</div>
						<!-- Hotel 2 -->
						<div class=" jumbotron pt-2 pb-0 mt-2 row">
							
							<div class=" col-sm-4">
								<ul class="list-inline pr-3">
									<li class="list-inline-item"><a class="social-icon " target="_blank" href="#"><img src="image/hotel4.jpg" width="200" height="150"></a></li>

								</ul>
							</div>
							<div class=" col-sm-6">
								<h4>Parisien Hotel<i style="width: 50%;height: 50%" class="text-warning">*****</i></h4>
								<p>Tavarekere Main road,560029 India Bangalore</p>
								<p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi</strong></p>
								<p><strong style="color: red"><i class="fas fa-ban"></i>Free Cancellation</strong></p>
								<ul class="list-inline">
									<li class="list-inline-item" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="border-radius: 10px;background-color: #FF6F61;">Preview</button>

										<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<?php include 'single_view.php'; ?>
												</div>
											</div>
										</div></li>
										<li class="list-inline-item" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="border-radius: 10px;background-color: #FF6F61;">Map view</button>

											<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<p>Map view page</p>
													</div>
												</div>
											</div></li>
											<li class="list-inline-item" style="float: right;"><i style="color: orange">Moderate!</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white" align="center"><b>7.5</b></p></li>
											
										</ul>
										
									</div>
									<div class="col-sm-2" style="min-height: 100% ;border-left:5px solid #FF6F61;border-radius: 10px">
										<h4>US$ 730.5</h4>
										<p>avg/Night</p>
										<button class="pr-4 pl-4" style="color: white;border-radius: 10px;background-color: #FF6F61;">Book Now</button>
										<!-- price from other companies -->
										<p><b>Expedia</b>::<span>3050&#x20B9;</span></p>
										<p><b>Booking.com</b>::<span>5070&#x20B9;</span></p>
										<p><b>MakemyTrip</b>::<span>4200&#x20B9;</span></p>
										
									</div>
									
									
								</div>
								<div class=" jumbotron pt-2 pb-0 mt-2 row">
									
									<div class=" col-sm-4">
										<ul class="list-inline pr-3">
											<li class="list-inline-item"><a class="social-icon " target="_blank" href="#"><img src="image/hotel2.jpg" width="200" height="150"></a></li>

										</ul>
									</div>
									<div class=" col-sm-6">
										<h4>Bumbai Hotel<i style="width: 50%;height: 50%" class="text-warning">*****</i></h4>
										<p>Kouramangala,560029 India Bangalore</p>
										<p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi</strong></p>
										<p><strong style="color: green"><i class="fas fa-check"></i>Free Cancellation</strong></p>
										<ul class="list-inline">
											<li class="list-inline-item" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="border-radius: 10px;background-color: #FF6F61;">Preview</button>

												<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<?php include 'single_view.php'; ?>
														</div>
													</div>
												</div></li>
												<li class="list-inline-item" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="border-radius: 10px;background-color: #FF6F61;">Map view</button>

													<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<p>Map view page</p>
															</div>
														</div>
													</div></li>
													<li class="list-inline-item" style="float: right;"><i style="color: green">Good!</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white" align="center"><b>8.0</b></p></li>
													
												</ul>
												
											</div>
											<div class="col-sm-2" style="min-height: 100% ;border-left:7px solid #FF6F61;border-radius: 10px">
												<h4>US$ 430.5</h4>
												<p>avg/Night</p>
												<button class="pr-4 pl-4" style="color: white;border-radius: 10px;background-color: #FF6F61;">Book Now</button>
												<!-- price from other companies -->
												<p><b>Expedia</b>::<span>3050&#x20B9;</span></p>
												<p><b>Booking.com</b>::<span>5070&#x20B9;</span></p>
												<p><b>MakemyTrip</b>::<span>4200&#x20B9;</span></p>
												
											</div>

										</div>

										<!-- end -->	
										<div class=" jumbotron pt-2 pb-0 mt-2 row">
											
											<div class=" col-sm-4">
												<ul class="list-inline pr-3">
													<li class="list-inline-item"><a class="social-icon " target="_blank" href="#"><img src="image/hotel5.jpg" width="200" height="150"></a></li>

												</ul>
											</div>
											<div class=" col-sm-6">
												<h4>Bumbai Hotel<i style="width: 50%;height: 50%" class="text-warning">*****</i></h4>
												<p>Kouramangala,560029 India Bangalore</p>
												<p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi</strong></p>
												<p><strong style="color: green"><i class="fas fa-check"></i>Free Cancellation</strong></p>
												<ul class="list-inline">
													<li class="list-inline-item" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="border-radius: 10px;background-color: #FF6F61;">Preview</button>

														<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<?php include 'single_view.php'; ?>
																</div>
															</div>
														</div></li>
														<li class="list-inline-item" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="border-radius: 10px;background-color: #FF6F61;">Map view</button>

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
													<div class="col-sm-2" style="min-height: 100% ;border-left:5px solid #FF6F61;border-radius: 10px">
														<h4>US$ 430.5</h4>
														<p>avg/Night</p>
														<button class="pr-4 pl-4" style="color: white;border-radius: 10px;background-color: #FF6F61;">Book Now</button>
														<!-- price from other companies -->
														<p><b>Expedia</b>::</i><span>3050&#x20B9;</span></p>
														<p><b>Booking</b>::<span>5070&#x20B9;</span></p>
														<p><b>MakemyTrip</b>::<span>4200&#x20B9;</span></p>
														
													</div>

												</div>

											</div>

										</div>
									</div>


									
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
