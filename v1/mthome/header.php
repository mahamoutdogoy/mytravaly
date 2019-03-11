<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Travely Travel</title>


	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="style.css">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

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

/* .hotels {

    padding: 0px;

}
.top_container {
    margin-top:20px;
} */
#top_menu {
    position: right;
   /*  left: 873px; */
   /* float: right; */
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


collapse 


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










    /* .modal-footer div p a {
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
     */

#second1{
    display: none;
}
.modal-header{
    background-color:#FF6F56;
}
.modal-footer{
    background-color:#FF6F56;
}
</style>
</head>
<body>




	<!--top menu-->
	<div class="container  mw-100">
		<div class="row">
			<div class="col-md-12 mt-0">
				<a href=""><img src="images/logo.png" class="float-left" alt="" style=" "></a>
				<div id="top_menu" class=" mt-3" style="float: right;">
					<ul class="nav list-unstyled float-right">
						<li class="nav-item"><a class="nav-link" href="#"><span><i class="fa fa-globe"></i></span>&nbsp;Language</a></li>
						<li><a href="#" class="nav-link"><span><i class="fa fa-money"></i></span>&nbsp;Currency</a></li>
						<li><a href="add_property.php" class="nav-link"><span><i class="fa fa-plus"></i></span>&nbsp;Add your property</a></li>
						<li><a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" class="nav-link"><span><i class="fa fa-sign-in"></i></span>&nbsp;Login</a></li>
					</ul>
				</div>

			</div>
		</div>
	</div>

	<div class="container">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script>
			$(document).ready(function() {

                        //On click signup, hide login and show registration form
                        $("#signup").click(function() {
                        	$("#first1").slideUp("slow", function(){
                        		$("#second1").slideDown("slow");
                        	});
                        });

                        //On click signup, hide registration and show login form
                        $("#signin").click(function() {
                        	$("#second1").slideUp("slow", function(){
                        		$("#first1").slideDown("slow");
                        	});
                        });


                    });
                </script>


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="box-shadow: 0 10px 9px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
                	<div class="modal-dialog" role="document">
                		<div class="modal-content">
                			<div class="modal-header text-center">

                				<h4 class="modal-title text-center mb-2 h5" id="modaltitle"> <i>Login & Sign Up</i></h4>
                				<i style="color: white;"> 
                					<button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                						<span aria-hidden="true">&times;</span>
                					</button>
                				</i>


                			</div>

                			<div class="modal-body">
                				<div id="first1">
                					<form action="" method="POST">
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-envelope"></i>
                								</div>
                							</div>

                							<input type="text" name="username" class="form-control">
                						</div>
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-lock"></i>
                								</div>
                							</div>

                							<input type="text" name="username" class="form-control">
                						</div>

                						<div class="form-group">
                							<div class="input-group mb2">

                								<input type="submit" class="btn btn-success ribbon  btn-block" value="login" class="form-control">
                							</div>
                						</div>
                						<p><i>Dont have account ?</i>&nbsp;&nbsp;&nbsp; <a href="#" class="signup" id="signup">sign-up</a></p>
                					</form>
                				</div>
                				<div id="second1">
                					<form action="" method="POST">
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-user"></i>
                								</div>
                							</div>

                							<input type="text" name="first_name" class="form-control" placeholder="First Name">
                						</div>
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-user"></i>
                								</div>
                							</div>

                							<input type="text" name="last_name" class="form-control" placeholder="Last Name">
                						</div>
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-envelope"></i>
                								</div>
                							</div>

                							<input type="email" name="email" class="form-control" placeholder="Email">
                						</div>
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-lock"></i>
                								</div>
                							</div>

                							<input type="password" name="password" class="form-control" placeholder="password">
                						</div>
                						<div class="input-group">
                							<div class="input-group-prepend">
                								<div class="input-group-text">
                									<i class="fa fa-lock"></i>
                								</div>
                							</div>

                							<input type="password" name="con_password" class="form-control" placeholder="confirm password">
                						</div>
                						<div class="form-group">
                							<div class="input-group mb2">

                								<input type="submit"  name="sign_up" value="signup" class="btn-success form-control">
                							</div>
                						</div>
                						<p><i> have account ?</i>&nbsp;&nbsp;&nbsp; <a href="#" class="signin" id="signin">sign-in</a></p>
                					</form>
                				</div>
                			</div>


                			<div class="modal-footer">
                				<div class="col-4">
                					<p class="i float-left" ><a href="" class="btn-link">forgot password</a></p>
                				</div>
                				<div class="col-8">


                				</div>
                			</div>

                		</div>
                	</div>
                </div>
            </div>







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