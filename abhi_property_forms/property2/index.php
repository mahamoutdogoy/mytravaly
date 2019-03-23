
<?php 
	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Travely Travel</title>


<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="style.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

</head>
<body>

<form action="" method="post">


       		<div class="form-group">
         		<div class="input-group mb2">
         			<div class="input-group-prepend">
         				<div class="input-group-text">
         					<i class="fa fa-envelope"></i>
         				</div>
         			</div>
         			<input type="text" name="email" class="form-control" placeholder="Enter your Email" required="">
         		</div>
       		</div>


	       <div class="form-group">
	         <div class="input-group mb2">
	         	<div class="input-group-prepend">
	         		<div class="input-group-text">
	         			<i class="fa fa-lock"></i>
	         		</div>
	         	</div>
	         	<input type="password" name="pwd" class="form-control" placeholder="Enter your password" required="">
	         </div>
	       </div>


	       <div class="custom-control custom-checkbox">
	        	 <div class="mb-2 input-group">
	         	    <input type="checkbox" name="name" class="custom-control-input"  id="terms_c">
	         	    <label for="terms_c" class="custom-control-label mr-5">&nbsp;&nbsp;&nbsp;&nbsp;<i>Remember me</i></label>
	         	</div>
	       </div>
	    

      	  <div class="form-group">
         	<div class="input-group mb2">
         	
         		<input type="submit" name="login" class="btn btn-success ribbon 	btn-block" value="submit" class="form-control">
         	</div>
      	 </div>


   	 
   	  	<div class="col-4">
   	  		<p class="i float-left"	><a href="" class="btn-link">forgot password</a></p>
   	  	</div>
     	 <div class="col-8">
			<p><i>Dont have account ?</i>&nbsp;&nbsp;&nbsp; <a href="" class="">sign-up</a></p>
		</div>
    

<!-----end model-->
</form>
</body>
</html>
<?php
if(isset($_POST['login']))
{
	require_once('Property_DB.php');

	$query=mysqli_query($con,"select * from users where email='$_POST[email]'") or die(mysqli_error($con));
	$row=mysqli_fetch_array($query);

	$_SESSION['user']=array(
	    'userid'=>$row['userid'],
	    'name'=>$row['name'],
	    'username'=>$row['username'],
	    'email'=>$row['email'],
	    'image'=>$row['pict'],
	    'password'=>$row['passwd'],
	    'role'=>$row['role'],
	    'hotelid'=>$row['hotelid']
	    );
	if(isset($_SESSION['user']))
		header("location:rooms_dashboard_new.php");
}
?>