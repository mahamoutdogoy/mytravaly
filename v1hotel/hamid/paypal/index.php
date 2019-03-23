<?php 
require_once('config.php'); 
/*require_once('./reservation.php');*/
/*if(isset($_POST['pay_now'])){
$_SESSION['email'] = $_POST['email'];
$_SESSION['number'] = $_POST['number'];
$_SESSION['name'] = $_POST['first_name'].' '.$_POST['last_name'];

}*/

$email =$_SESSION['email'];
$name = $_SESSION['name'];
$number = $_SESSION['number'];
$price = $_SESSION['total_price'];




?>
<html>
  <head>
    <title> RazorPay Integration in PHP - phpexpertise.com </title>
    <meta name="viewport" content="width=device-width">
    <style>
      .razorpay-payment-button {
        color: #ffffff !important;
        background-color: #FF6F61;
        border-color: #7266ba;
        /* font-size: 20px; */
        font-width:20px;
        font-height:10px;
        display: none;
        margin: 0 auto 10px 150px;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <form action="" method="POST">
    <!-- Note that the amount is in paise = 50 INR -->
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $razor_api_key; ?>"
        data-amount="<?php echo $price*100; ?>"
        data-buttontext="Pay Now"
        data-name="MyTravaly.com"
        data-description="Test Txn with RazorPay"
        data-image="paypal/logo.png"
        data-prefill.name="<?php   echo $name; ?>"
        data-prefill.email="<?php   echo $email; ?>"
        data-theme.color="#FF6F61"

    ></script>
   
    <input type="hidden" value="Hidden Element" name="hidden">
    </form>
  </body>
</html>