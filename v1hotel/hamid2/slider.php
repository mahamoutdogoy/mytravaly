<?php 

	require_once 'config.php';
	if (isset($_POST['view'])) {
  header('Location:../abdallah');
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css_slide.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

</head>
<body>
	
 <div class="row">
 	<div class="col-sm-4" >
 		<h2 style="text-align: center; color: rgb(255,99,71);">What's trending</h2>
		<!-- <div class="form-group"align="center">
			<input type="text" name="food" style="border-radius: 10px;border:2px solid rgb(255,99,71">
			<input type="submit" class="btn btn-success" name="" placeholder="Search">
		</div> -->
 		<?php include 'trends.php'; ?>
 	</div>
 	<div class="col-sm-4" >
 		<h2 style="text-align: center ;color: rgb(255,99,71)">Explore the world</h2>
	    <!-- <div class="form-group" align="center">
	      <input type="text" name="food" style="border-radius: 10px;border:2px solid rgb(255,99,71)">
	      <input type="submit" class="btn btn-success" name="" placeholder="Search">
	    </div> -->
 		<?php include 'world.php'; ?>
 	</div>
 	<div class= "col-sm-4" >
 		<h2 style="text-align: center ;color: rgb(255,99,71)">Explore city life</h2>
	    <!-- <div class="form-group" align="center">
	      <input type="text" name="food" style="border-radius: 10px;border:2px solid rgb(255,99,71)">
	      <input type="submit" class="btn btn-success" name="" placeholder="Search">
	    </div> -->
 		<?php include 'city.php' ?>
 		
 	</div>
 	
 </div>

 <div class="row" >
 	<div class="col-sm-4 w-100" >
 		<h2 style="text-align: center; color: rgb(255,99,71);">Meet The night life</h2>
		    <!-- <div class="form-group" align="center">
		      <input type="text" name="food" style="border-radius: 10px;border:2px solid rgb(255,99,71)">
		      <input type="submit" class="btn btn-success" name="" placeholder="Search">
		    </div> -->
 		<?php include 'night.php' ?>
 	</div>
 	<div class="col-sm-4"  >
 		<h2 style="text-align: center; color: rgb(255,99,71);">Destination Weeding</h2>
	    <!-- <div class="form-group" align="center">
	      <input type="text" name="food" style="border-radius: 10px;border:2px solid rgb(255,99,71)">
	      <input type="submit" class="btn btn-success" name="" placeholder="Search">
	    </div> -->
 		<?php include 'wedding.php' ?>

 	</div>
 	<div class="col-sm-4" >
 		<h2 style="text-align: center; color: rgb(255,99,71);">Food</h2>
	    <!-- <div class="form-group" align="center">
	      <input type="text" name="food" style="border-radius: 10px;border:2px solid rgb(255,99,71)">
	      <input type="submit" class="btn btn-success" name="" placeholder="Search">
	    </div> -->
 		<?php include 'food.php'; ?>
 		
 	</div>
 	
 </div>
 <div class="row">
 	<div class="col-sm-4">
 		
 	</div>

 	<div class="col-sm-4 " >
 		<h2 style="text-align: center ;color: rgb(255,99,71)">Heritage & Culture</h2>
	    <!-- <div class="form-group" align="center">
	      <input type="text" name="food" style="border-radius: 10px;border:2px solid rgb(255,99,71)">
	      <input type="submit" class="btn btn-success" name="" placeholder="Search">
	    </div> -->
 		
 		<?php include 'culture.php'; ?>
 		
 	</div>
 	
 </div>


</body>
</html>