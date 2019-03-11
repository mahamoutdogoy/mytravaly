<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Travely Travel</title>


<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="style.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <!-- Compiled and minified CSS 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<style>
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

body {
 
	padding:0px;
}



	.row {
		text-align: justify;
	}
	
	
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
 

	form>div.col-3 {
	
		padding:5px;
		border-radius: 5px;
		font-size: 20px;
		margin: 4px
		
	} {
		padding-right: 
	}
 
 
 
 
 

 

 

.modal-footer div p a {
	text-decoration: none;
	text-decoration: none;
font-family:"Times New Roman", Times, serif;
font-style:italic;
font-size: 15px; 
}
.modal-footer div p a:hover { 
color:#FF6F56;
text-decoration: none;
font-family:"Times New Roman", Times, serif;
font-style:italic;
font-size: 15px;
  }

 
 
 
</style>
</head>
<body>




<!--top menu-->
<div class="container mb-3" onload=>
	<div>
		<div>
			<a href=""><img src="images/logo.png" class="float-left" alt="" style="margin-left:-90px; "></a>
		    <div id="top_menu">
				<ul class="nav list-unstyled float-right">
					<li class="nav-item"><a class="nav-link" href=""><span><i class="fa fa-globe"></i></span>&nbsp;Language</a></li>
					<li><a href="#" class="nav-link"><span><i class="fa fa-money"></i></span>&nbsp;Currency</a></li>
					<li><a href="../MTProject/index.php" class="nav-link"><span><i class="fa fa-plus"></i></span>&nbsp;Add your property</a></li>
					<li><a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" class="nav-link"><span><i class="fa fa-sign-in"></i></span>&nbsp;Login</a></li>
					<a href="../MTProject/index.php">sdfd</a>
				</ul>
			</div>
			
		</div>
		<br>
		<br>
		<ul class="nav">
			<li class="nav-item"><a href="" class="nav-link">Hotels</a></li>
			<li class="nav-item"><a href="" class="nav-link">Holiday home</a></li>
			<li class="nav-item"><a href="" class="nav-link" >Resorts</a></li>
			<li class="nav-item"><a href="" class="nav-link">Apartment</a></li>
			<li class="nav-item"><a href="" class="nav-link">VillasVillas</a></li>
			<li class="nav-item"><a href="" class="nav-link">Guest house</a></li>
			<li class="nav-item"><a href="" class="nav-link">Explore the World</a></li>
			<li class="nav-item"><a href="" class="nav-link">Last Minitues Trips</a></li>
		    <li class="nav-item"><a href="" class="nav-link">Solo trips</a></li>
           
       
		  </ul>
		
	</div>
</div>
<!--top menu-->


 


<!-- start search collapse -->



<!-- login Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header  login-modal-header text-center">
      
       			 <h4 class="modal-title text-center mb-2 h5" id="modaltitle"> <i>Hotelier Login</i></h4>
       				<i style="color: white;"> 
       					<button type="button"  class="close" data-dismiss="modal" aria-label="Close">
       				 		<span aria-hidden="true">&times;</span>
        				</button>
        		   </i>


      		</div>

      	<div class="modal-body">
       		<div class="form-group">
         		<div class="input-group mb2">
         			<div class="input-group-prepend">
         				<div class="input-group-text">
         					<i class="fa fa-envelope"></i>
         				</div>
         			</div>
         			<input type="text" name="email" class="form-control" placeholder="Enter your Email">
         		</div>
       		</div>


	       <div class="form-group">
	         <div class="input-group mb2">
	         	<div class="input-group-prepend">
	         		<div class="input-group-text">
	         			<i class="fa fa-lock"></i>
	         		</div>
	         	</div>
	         	<input type="text" name="pwd" class="form-control" placeholder="Enter your password">
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
         	
         		<input type="submit" class="btn btn-success ribbon 	btn-block" value="submit" class="form-control">
         	</div>
      	 </div>


      
         </div>
 
      
   	  <div class="modal-footer">
   	  	<div class="col-4">
   	  		<p class="i float-left"	><a href="" class="btn-link">forgot password</a></p>
   	  	</div>
     	 <div class="col-8">
			<p><i>Dont have account ?</i>&nbsp;&nbsp;&nbsp; <a href="" class="">sign-up</a></p>
		</div>
     </div>
    
    </div>
  </div>
</div>


<!-----end model-->









<script type="text/javascript" src="js/jquery-3.3.1.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/radialIndicator/1.3.1/radialIndicator.js"></script>  
 
    <!-- Compiled and minified JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 -->

 
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="js/jquery.counterup.js"></script>
</body>
</html>