<?php 
session_start();
/*require_once 'config.php';
*/
include 'emailsender/sendemail.php';
$connect = mysqli_connect('localhost','root','','mytravaly');

$book='';
$_SESSION['name']='';
$_SESSION['email']= '';
$_SESSION['number']='';
if(isset($_POST['show_pay'])){
$_SESSION['email'] = $_POST['email'];
/*$_SESSION['price'] = 1000;*/
$_SESSION['number'] = $_POST['number'];
$_SESSION['name'] = $_POST['first_name'].' '.$_POST['last_name'];

$name = $_SESSION['name'];
$email = $_POST['email'];
	$property_id = $_SESSION['property_id'];
	$room_id     = $_SESSION['room_id'];
	$inventory_id= $_SESSION['inventory_id'];
	$number      = $_SESSION['number'];
	$check_in    = $_SESSION['check_in'];
	$check_out   = $_SESSION['check_out'];
	$meal_plan   = $_SESSION['meal_plan'];
	$people      = $_SESSION['people'];
	$child       = $_SESSION['children'];
	$full_price  = $_SESSION['full_price'];
	$total_price = $_SESSION['total_price'];
	$query = "INSERT INTO reservation(property_id,room_id,inventory_id,folio_id,guestName,email,phoneNo,check_in,check_out,meal_plan,noOfAdults,noOfChildren,price,total,status) VALUES('$property_id','$room_id','$inventory_id','','$name','$email','$number','$check_in','$check_out','$meal_plan','$people','$child','$full_price','$total_price','')";

	$execute = mysqli_query($connect,$query);
		$otp = '
		<p>Your reservation is confirmed as per following details. Now sit back and share your thoughts to our Traveller’s Room, meanwhile we are contacting to property owner for assigning the room.</p>
		<table style="width:100%">
  <tr>
    <th>Informations</th>
    <th>value</th>
  </tr>
  <tr>
    <td>Name:</td>
    <td>'.$name.'</td>
  </tr>
  <tr>
    <td>check_in:</td>
    <td>'.$_SESSION['check_in'].'</td>
  </tr>
  <tr>
    <td>check_out:</td>
    <td>'.$_SESSION['check_out'].'</td>
  </tr>
  <tr>
    <td>Adult:</td>
    <td>'.$_SESSION['people'].'</td>
  </tr>
  <tr>
    <td>Child:</td>
    <td>'.$_SESSION['children'].'</td>
  </tr>
  <tr>
    <td>Rooms:</td>
    <td>'.$_SESSION['rooms'].'</td>
  </tr>
  <tr>
    <td>Rooms type:</td>
    <td>'.$_SESSION['room_type'].'</td>
  </tr>
  <tr>
    <td>Meal Plan:</td>
    <td>'.$_SESSION['meal_plan'].'</td>
  </tr>
  <tr>
    <td>Per night charge:</td>
    <td>'.$_SESSION['single_price'].'</td>
  </tr>
  <tr>
    <td>Tax/GST:</td>
    <td>'.$_SESSION['single_tax'].'</td>
  </tr>
  <tr>
    <td>Total Room Charge:</td>
    <td>'.$_SESSION['full_price'].'</td>
  </tr>
  <tr>
    <td>Total Tax/GST:</td>
    <td>'.$_SESSION['tax'].'</td>
  </tr>
  <tr>
    <td>Contribute to protect child rights::</td>
    <td> 10</td>
  </tr>
  <tr>
    <td>You have paid for this reservation :</td>
    <td>'.$_SESSION['total_price'].'</td>
  </tr>
  <tr>
    <td>Please Notes::</td>
    <td><p>note</p></td>
  </tr>
  <tr>
    <td>Reservation Policy | Refund Policy |:</td>
    <td><p>We thank you for choosing MyTravaly.com as your accommodation finder. If you have any issues, please bring our knowledge, we promise to resolve in one business day.
Help Centre | Join our Travellers community to connect millions of traveller like you|
Reservation Management</p></td>
  </tr>
 
</table>

		';
		
	
		$mail_body = "Hey $name,
					<br>Here is your Email - $email<br>
					<br> Your Reservation Details: $otp <br>
					<br>Thanks,<br>https://mytravaly.com";
		$mail = send_mail($email,"Reservation mytravaly",$mail_body);
		if($mail == 1){
			$book= '<div class="w3-panel w3-green w3-round">
				  <h6 class="text-success">Success!</h6>
				  <p>An Email Has been sent. Please check your inbox!</p>
				</div>';
		}else{
			$book= '<div class="w3-panel w3-round w3-red">
				  <h3>Failed!</h3>
				  <p>Try Again!<p>
				</div>';
		}


	


}
$_SESSION['full_price'] = $_REQUEST['room_id'];
$_SESSION['total_price'] = $_SESSION['full_price'] + $_SESSION['tax']+10;
$output = '<img   src="data:image/jpeg;base64,'.base64_encode($_SESSION["property_image"]).'"  width="350" height="200"  class="img-responsive" style="position:center;"/>'
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="globalsign-domain-verification" content="2PPdqnacWckAwDpjHLIIo-w8qgmF4mbbP9ioJw3ouG">
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
     		/* #show_pay{
     			display: none;
     		} */
     	</style>
     </head>
     <body class="bg" style="background-image: url('payment7.jpg');height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
     	<?php include 'header.php'; ?>
     	<div class="container mw-100" style="background-color: #f7f2f9">
     		<div class="col-sm-4  pt-0 pb-0 pr-1 mb-4" style="border-radius:50px;float: right;background-color: #FF6F56;">
     			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>Property info</h4></p>
     			<?php echo $output; ?>
     			<p><i class="fas fa-home" style="color: blue"></i>&nbsp;&nbsp;Selected Room:&nbsp;&nbsp;<?php echo $_SESSION['rooms']; ?></p>
     			<p><i class="fas fa-lock-open" style="color: blue"></i>&nbsp;&nbsp;Check in:&nbsp;&nbsp;<?php echo $_SESSION['check_in']; ?> </p>
     			<p><i class="fas fa-lock" style="color: blue"></i>&nbsp;&nbsp;Check out:&nbsp;&nbsp;<?php echo $_SESSION['check_out']; ?> </p>
     			<br>
     			<p><i class="fas fa-home" style="color: blue"></i>&nbsp;&nbsp;Room charge:<?php echo $_SESSION['full_price']; ?></p>	
     			<p><i class="fas fa-window-minimize" style="color: blue"></i>&nbsp;&nbsp;Discount: NO</p>
     			<p>------------------------------------------------------</p>
     			<p><i class="fas fa-plus-square" style="color: blue"></i>&nbsp;&nbsp;Sub Total:<?php echo $_SESSION['full_price']; ?></p>
     			<p><i class="fas fa-person-booth" style="color: blue"></i>&nbsp;&nbsp;Tax/GST on room charge:<?php echo $_SESSION['tax']; ?></p>
     			<p><i class="fas fa-money-check-alt" style="color: blue"></i>&nbsp;&nbsp;Reservation Fees:</p>
     			<p><i class="fas fa-child" style="color: blue"></i>&nbsp;&nbsp;Protect Child Rights:10</p>
     			<p>------------------------------------------------------</p>
     			<p><strong><i class="fas fa-funnel-dollar" style="color: blue"></i>Total Payable::<?php echo $_SESSION['total_price']; ?></strong></p>
     		</div>
     		<div class="mb-0 pb-0" style="">
<!-- 			<div style="" class="">
-->		
<div class="col-sm-8 " style="border: 1px;border-radius: 20px;margin-bottom: 0px ">
	<h5 style="color: #FF6F71;">Guests Details</h5>
	<p>Log into your account to use wallet amount & for faster booking details</p>
	<form method="POST" style="border-bottom-right-radius: 10px;border-bottom: 10px solid #FF6F71;">
		<div class=" row ">
			<p class=" col-sm-6">
				<strong >First Name*</strong>
				<input type="text"  name="first_name" class="w-100" required="">

			</p>


			<p class="col-sm-6 " >
				<strong >Last Name*</strong>
				<input type="text" name="last_name" id="" class="w-100" required="">
			</p>


		</div>
		<div class=" row">

			<p class=" col-sm-6 " >
				<strong>Email*</strong>
				<input type="email" name="email" id="email1" class="form-control w-100" required="">
			</p>

			<p class="col-sm-6 ">
				<strong>Phone*</strong>
				<input type="text" name="number" class="w-100" required="">

			</p>
		</div>
		<div class="row">
			<p class="col-sm-6">
				<!-- <label for="company"><strong>Company</strong></label>&nbsp;&nbsp;
				<input type="text" name="company" class="w-100"> -->
			</p>
			<p class="col-sm-6">
				<!-- <label for="tax"><strong>Tax/GST</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="tax" class="w-100"> -->
			</p>
					
		</div>
		
			<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<input type="submit" name="show_pay" id="show_pay" class="form-control btn-primary" style="background-color: " value="Save Your booking" onclick="">
				<?php echo $book; ?>
			</div>		
		</div>
		
		</form>
		<form action="">
			<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4"><input type="submit" name="pay_now" id="pay_now" value="Pay Now(<?php echo $_SESSION['total_price']; ?>)" class="btn-success form-control" onclick="showpay()"></div>
			
		</div>
		<label for="payment"><strong>Secure Payment</strong></label>
		<?php include  'paypal/index.php'; ?>
		</form>	
		<script>
			function showpay(){
				document.getElementByName('razorpay_payment_id').style.display='block';
			}
		</script>
		<!-- <script>
			function show_pay(){
				document.getElementByName('show_pay').style.display='block';
			}
		</script> -->
		<!-- <script>
			$(document).ready(function(){
			  
			  $("#show_pay").click(function(){
			    $("#show_form").show();
			  });
			});
		</script> -->
		<div class="jumbotron pt-1 pb-0">
			<h5><i class="fas fa-exclamation-triangle" style="color: red"></i>&nbsp;&nbsp;&nbsp;&nbsp;Guest reservation policy</h5>
			<p>It is mandatory for guests to present valid photo identification at the time of check-in at Hotel. According to government regulations, a valid Photo ID should be carried by every person above the age of 18 staying at the hotel. The identification proofs accepted are Aadhar Card, Driving License, Voter ID Card, and Passport. Without valid ID the guests will not be allowed to check-in. PAN cards are not accepted as a valid ID card. Readmore- Reservation Cancel, modification & Refund</p>
		</div>
	

		</div>
			
</div>
</div>


<?php include 'footer.php'; ?>



</body>
</html>