<?php 
	session_start();

	$output = '<img   src="data:image/jpeg;base64,'.base64_encode($_SESSION["property_image"]).'"  width="350" height="200"  class="img-responsive" style="position:center;"/>'


 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


     <style type="text/css">
     	html,body{
     		width: 100%;
     		height: 100%
     		
     	}
     	/* .bg{
     		background-image: url("payment.jpg");
     	} */
     	.guest{
     		border:10px;
     	}
     	.form-inline {  
			  display: flex;
			  flex-flow: row wrap;
			  align-items: center;
			}
		.form-inline input {
			  vertical-align: middle;
			  margin: 5px 10px 5px 0;
			  padding: 2px;
			  background-color: #fff;
			  border: 1px solid #ddd;
			}
		input,button{
			border-radius: 10px;
		}
		
     </style>
</head>
<body class="bg" style="background-image: url('payment7.jpg');height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
<div class="container">
		<div class="col-sm-4  pt-0 pb-0 pr-1 mb-4" style="border-radius:50px;float: right;background-color: tomato ;">
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>Property info</h4></p>
				<?php echo $output; ?>
				<p><i class="fas fa-home" style="color: blue"></i>&nbsp;&nbsp;Selected Room:&nbsp;&nbsp;<?php echo $_SESSION['rooms']; ?></p>
				<p><i class="fas fa-lock-open" style="color: blue"></i>&nbsp;&nbsp;Check in:&nbsp;&nbsp;<?php echo $_SESSION['check_in']; ?> </p>
				<p><i class="fas fa-lock" style="color: blue"></i>&nbsp;&nbsp;Check out:&nbsp;&nbsp;<?php echo $_SESSION['check_out']; ?> </p>
				<br>
				<p><i class="fas fa-home" style="color: blue"></i>&nbsp;&nbsp;Room charge:</p>	
				<p><i class="fas fa-window-minimize" style="color: blue"></i>&nbsp;&nbsp;Discount:</p>
				<p>------------------------------------------------------</p>
				<p><i class="fas fa-plus-square" style="color: blue"></i>&nbsp;&nbsp;Sub Total:</p>
				<p><i class="fas fa-person-booth" style="color: blue"></i>&nbsp;&nbsp;Tax/GST on room charge:</p>
				<p><i class="fas fa-money-check-alt" style="color: blue"></i>&nbsp;&nbsp;Reservation Fees:</p>
				<p><i class="fas fa-child" style="color: blue"></i>&nbsp;&nbsp;Protect Child Rights:</p>
				<p>------------------------------------------------------</p>
				<p><strong><i class="fas fa-funnel-dollar" style="color: blue"></i>Total Payable::</strong></p>
		</div>
		<div class="mb-0 pb-0" style="">
<!-- 			<div style="" class="">
		 -->		
			<div class="col-sm-6  " style="border: 10px solid tomato;border-radius: 20px;margin-bottom: 0px ">
				<h5>Guests Details</h5>
				<p>Log into your account to use wallet amount & for faster booking details</p>
				<div class="form-inline">
					<p style="margin-left: 15%">
					<strong>First Name*</strong>
					<br>
					<input type="text"  name="first_name">
					
					</p>

					<p>
						<strong style="color: white">Last Name*</strong>
						<br>
						<input type="text" name="last_name" id="" >
					</p>
			</div>
				<div class="form-inline">
					<p style="margin-left: 15%">
					<strong>Email*</strong>
					<br>
					<input type="email" name="first_name">
					
					</p>
					<p class="">
						<strong>Phone*</strong>
						<br>
						<input type="text" name="last_name" id="" >
					</p>
				</div>
				<p>
					<label for="company"><strong>Company</strong></label>&nbsp;&nbsp;
					<input type="text" name="company" style="padding-right: 40%">
					<label for="tax"><strong>Tax/GST</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="tax" style="padding-right: 40%">
					<br>
					<br>
					<label for="coupon"><strong>Apply Coupon</strong></label>
					<input type="text" name="coupon" style="margin-left: 10%">
					<br>
					<br>
					<label for="payment"><strong>Secure Payment</strong></label>
					
					<button name="payment" style="margin-left: 15% ;background-color: tomato ;text-align: center;">Pay Rs 10000</button>

					<br>
					<br>
					<div class="jumbotron pt-1 pb-0">
						<h5><i class="fas fa-exclamation-triangle" style="color: red"></i>&nbsp;&nbsp;&nbsp;&nbsp;Guest reservation policy</h5>
						<p>It is mandatory for guests to present valid photo identification at the time of check-in at Hotel. According to government regulations, a valid Photo ID should be carried by every person above the age of 18 staying at the hotel. The identification proofs accepted are Aadhar Card, Driving License, Voter ID Card, and Passport. Without valid ID the guests will not be allowed to check-in. PAN cards are not accepted as a valid ID card. Readmore- Reservation Cancel, modification & Refund</p>
					</div>
				</p>
			</div>
				
			
</body>
</html>