<?php 
require_once 'config.php';
session_start();
if (isset($_POST['checkout'])) {

  $_SESSION['location']=$_POST['location'];
  $_SESSION['check_in'] = $_POST['check_in'];
  $_SESSION['check_out']= $_POST['check_out'];
  $_SESSION['people'] = $_POST['people'];
  $_SESSION['rooms'] = $_POST['rooms'];
  $_SESSION['children'] = $_POST['children'];


  header('Location:search.php');

}
$_SEESION['username']="";
$user_id = 'username';
if(isset($_POST['sign_up'])){

$first_name = strip_tags($_POST['first_name']); 
$last_name  = strip_tags($_POST['last_name']);
$email = $_POST['email'];
$password = $_POST['password'];
$con_password = $_POST['con_password'];

if($password == $con_password){
    $query = "INSERT INTO mt_user (first_name,last_name,email,password) VALUES('$first_name','$last_name','$email','$password')";
    $result = mysqli_query($connect,$query);
}
else{
    echo "Something is wrong";
}

}

if(isset($_POST['sign_in'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM mt_user WHERE email='$email' AND password = '$password'";
    $result = mysqli_query($connect,$query);
    while($row = mysqli_fetch_array($result)){
        $user_id = $row['id'];
         $_SEESION['username']=$row['first_name'];
    }
   

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travely Travel</title>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    
    <style>
        #search_box{
            box-shadow: 10px 10px 15px #F4A460;
            background-color:  #f15025;
            border-radius: 20px;
        } 

        #search_box:hover{
            background: #FF6F56;
            border: 4px solid #FFF5EE;
        }   
        #title{
            text-shadow: 2px 2px 2px #4B0082;
            animation-name: title_anim;
            animation-duration: 20s;
        }

        .textboxstyle{
            box-shadow: 10px 10px 10px #FF1111;
            text-align: center;
        }

        @keyframes title_anim {
          0%   {left:0px; top:0px;}
          5%  {left:10px; top:0px;}
          10%  {left:0px; top:0px;}
          15%  {left:10px; top:0px;}
          20% {left:0px; top:0px;}
            25% {left:10px; top:0px;}
          30%  {left:0px; top:0px;}
          35%  {left:10px; top:0px;}
          40%  {left:0px; top:0px;}
          45% {left:10px; top:0px;}
           50%   {left:0px; top:0px;}
          55%  {left:10px; top:0px;}
          60%  {left:0px; top:0px;}
          65%  {left:10px; top:0px;}
          70% {left:0px; top:0px;}
           75%   {left:10px; top:0px;}
          80%  {left:0px; top:0px;}
          85%  {left:10px; top:0px;}
          90%  {left:0px; top:0px;}
          95% {left:10px; top:0px;}
          100% {left:0px; top:0px;}
        }

        .map1
        {
             margin-top: 2px;
            position: absolute;


        }
    </style>
        </head>
        <body>

        <?php include 'header.php'; ?>


            <!--top menu-->
            <!-- <div class="container  mw-100">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <a href=""><img src="images/logo.png" class="float-left" alt="" style=" "></a>
            
                        <div id="top_menu" class=" mt-3" style="float: right;">
                            <ul class="nav list-unstyled float-right">
                                <li class="nav-item">
                                    <a href="#"><i class="fa fa-user"></i><?php   // echo $_SEESION['username']; ?></a>
                                </li>
                                
                                <li class="nav-item"><a class="nav-link" href="#"><span><i class="fa fa-globe"></i></span>&nbsp;Language</a></li>
                                <li><a href="#" class="nav-link"><span><i class="fa fa-money"></i></span>&nbsp;Currency</a></li>
                                <li><a href="../MTProject/index.php" class="nav-link"><span><i class="fa fa-plus"></i></span>&nbsp;Add your property</a></li>
                                <li><a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" class="nav-link"><span><i class="fa fa-sign-in"></i></span>&nbsp;Login</a></li>
                            </ul>
                        </div>
            
                    </div>
                </div>
            </div> -->

            <div class="container-fluid  pl-1 pr-1   pb-5 mt-5 text-center" id="search_box">
                <div class="row  " >
                    <div class="col-sm-8 mx-auto" id="title">
                       <center> <h2 class="text-light">Find Verified Hosts World Wide <hr class="bg-white w-25">  </h2></center>
                        </div>
                    </div>
                    <div class="row mt-5">

                        <div class="col-sm-1"></div>
                        <div class="  col-sm-10">              


                            <form method="POST" action="">
                                <div class="row row_service" >
                                    <div class="mr_style col-sm-4">
                                        <i class="fa fa-map-marker fa-3x  text-danger map1"  ></i>
                                        <input type="text" name="location" class="form-control textboxstyle" placeholder=" Location/search accomodation" required="true" alert="City name" style="border-radius: 5px; margin-bottom: 10px">
                                    </div>

                                    <div class="mr_style col-sm-4">
                                        <i class="fa fa-calendar text-danger fa-3x map1" aria-hidden="true" ></i>
                                        <input type="text" name="check_in" class="form-control textboxstyle"  id="checkin_date" placeholder="Check in" autocomplete="off" style="border-radius: 5px; margin-bottom: 10px;">
                                    </div>
                                    <div class="mr_style  col-sm-4">
                                        <i class="fa fa-calendar text-danger fa-3x map1" aria-hidden="true"></i>
                                        <input type="text" name="check_out" class="form-control textboxstyle" id="checkout_date" placeholder="Check out" autocomplete="off" style="border-radius: 5px">
                                    </div>
                                </div>

                                <div class="row row_service">
                                    <div class="mr_style col-sm-3">
                                        <select name="people" id="" class="browser-default  mt-3 w-100 textboxstyle" style="padding:10px 0 5px 50px; border-radius: 5px">
                                            <option selected="0">Adults</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7+</option>

                                        </select>

                                    </div>

                                     <div class="mr_style col-sm-3 ">
                                        <select name="children"   class="browser-default mt-3  w-100 textboxstyle" style="padding:10px 0 5px 50px;border-radius: 5px;">
                                            <option value="0">Chlidren</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6+</option>

                                        </select>
                                    </div>

                                    <div class="mr_style col-sm-3 ">
                                        <select name="rooms" id=""  class="browser-default mt-3  w-100  textboxstyle" style="padding:10px 0 5px 50px;border-radius: 5px;">
                                            <option selected>Rooms</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>

                                        </select>
                                    </div>
                                    

                                    <div class="col-sm-3 ">
                                        <input type="submit" onclick="return Validate();" style="border-radius: 5px; font-weight: bold; font-size: 1.25em;" class="form-control textboxstyle btn btn-success mt-3 textboxstyle"  value="Search" name="checkout">
                                    </div>
                                </div>

                        </form>

                    </div>

                </div>
                <div class="col-sm-1"></div>

            </div>




            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center; color: rgb(255,99,71);">What's trending</h2>
                                <?php require 'trends.php'; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center ;color: rgb(255,99,71)">Explore the world</h2>
                                <?php require 'world.php'; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center ;color: rgb(255,99,71)">Explore city life</h2>
                                <?php require 'city.php'; ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center; color: rgb(255,99,71);">Meet The night life</h2>
                                <?php require 'night.php'; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center ;color: rgb(255,99,71)">Heritage & Culture</h2>
                                <?php require 'culture.php'; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center; color: rgb(255,99,71);">Destination Weeding</h2>
                                <?php require 'wedding.php'; ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <?php  ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h2 style="text-align: center; color: rgb(255,99,71);">Food</h2>
                                <?php require 'food.php'; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <?php  ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        <!-- login Modal -->
        <div class="container-fluid">
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
                                    <form action="#?all_key=<?php echo $user_id; ?>" method="POST">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                            </div>

                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                            </div>

                                            <input type="password" name="password" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb2">

                                                <input type="submit" name="sign_in" class="btn btn-success ribbon  btn-block" value="login" class="form-control">
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



            <!-----end model-->


            <!-----end login section-->

            <br><br>



            <div class="container-fluid">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row row_service mb-5 ml-2">
                    <div class="col-sm-3 col-md-3 ml-5col-lg-3">
                        <ul class="nav"><a href="" class=" col-8 btn btn-success nav-link">Join the community</a>
                            <li class="nav-item"></li>
                        </ul>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <ul class="nav"><a href="" class=" col-8 btn btn-primary nav-link">Travel Stories </a>
                            <li class="nav-item"></li>
                        </ul>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <ul class="nav"><a href="" class=" col-8 btn btn-danger nav-link">Start a conversation</a>
                            <li class="nav-item"></li>
                        </ul>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <ul class="nav"><a href="" class=" col-8 btn btn-info nav-link">Fun club</a>
                            <li class="nav-item"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">

                    <div class="col-sm-12" style="background-color: #f15025;">
                        <h3 class="text-light">Subscribe For mor information from myTravaly</h3>
                        <ul class="list-inline col-sm-6" style="float: right;">
                            <li class="list-inline-item col-sm-7">
                                <input type="text" name="input" size="" class="form-control">
                            </li>
                            <li class="list-inline-item col-sm-4">
                                <input type="button" value="subscribe" class="bg-success text-light form-control">
                            </li>
                        </ul>

                    </div>
                    

                    </div>

                </div>
            </div>















            <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script> 
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js"></script>

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/radialIndicator/1.3.1/radialIndicator.js"></script>  
-->
<div class="container-fluid">
    <?php 
    include("footer.php");
    ?>
</div>

        <!-- Compiled and minified JavaScript 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    -->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
-->
<!--    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

--> 
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.counterup.js"></script>

<script type="text/javascript">


    $(document).ready(function(){
        $('.count').prop('disabled', true);
        $(document).on('click','.plus',function(){
            $('.count').val(parseInt($('.count').val()) + 1 );
        });
        $(document).on('click','.minus',function(){
            $('.count').val(parseInt($('.count').val()) - 1 );
            if ($('.count').val() == 0) {
                $('.count').val(1);
            }
        });
    });

    $(document).ready(function(){
        $(window).scroll(function () {
            if ($(this).scrollTop() > 70) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });

        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        $('#back-to-top').tooltip('show');

    });




    $('.counter-count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 5000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });


</script>



<script>

    $(function() {

        $('.trip_start_date').datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'startDate' :  new Date()
        });


    });



    $(function() {
        var date = new Date();

        date.setDate(date.getDate());
        $('#checkin_date').datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'todayhighlight':true,
            startDate: date



        });


    });


    $(function() {
        //var date = document.getElementById('checkin_date').value;
        var date = new Date();
        date.setDate(date.getDate());

        $('#checkout_date').datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true,
            'todayhighlight':true,
            startDate: date

        });

    });
// $('#checkout_date').datepicker('setStartDate',document.getElementById('#checkin_date').value);


$('#checkin_date').on('changeDate', function() {
    document.getElementById('checkout_date').focus();


    $('#checkout_date').datepicker('getFormattedDate');

});

$('#datepicker').datepicker('setStartDate', "01-01-1900");
</script>
</body>
</html>