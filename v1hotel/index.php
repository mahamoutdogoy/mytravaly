<?php 
session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travely Travel</title>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    
    <style>
    body {


        padding:0px;
    }
    .image_display{
        min-width: 100%;
    }



    .row_service {
        text-align: justify;
    }
    img[src="images/logo.png"] {
        padding-top:-20px;
        height:75px;

    }
    img[src="images/logo.png"]:hover
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
    .user_login {
        position: absolute;

        background-color: #FF6F56;
        left:5px;
        padding-top:10px;
        left: 147px;
        border-radius: 15px;
        box-shadow: 0 10px 9px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);




    }


    .login_form {
        padding-top: 30px;
        width: 60%;

    }


    .modal-header {
        background-color:#FF6F71;

    }

    .modal-header h4{
        text-align: center;
    }
}
.Remember_checkbox{
    padding-left: 5px;

}

.modal-title{
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

        .subscribe {
            left: 450px;


        }


        form>div.col-3 {

            padding:5px;
            border-radius: 5px;
            font-size: 20px;
            margin: 4px

            } {
                padding-right: 
            }

        .box{
            padding:60px 0px;
        }

        .box-part{

            border-radius:0;
            padding:20px 10px;
            margin:30px 0px;
        }
        .text{
            margin:20px 0px;

        }

        .back-to-top {
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            margin-bottom:50px;
            display:none;
            background-color: #FF6F56;
            z-index: 9999999;
        }
        .testimonial {
            padding-top: 50px;
            width: 100%;
            background-color: #FF6F56;

        }
        .testimonial .carousel-item {
            padding-top: 40px;
            height: 200px;



        }
        .testimonial .carousel-caption {
            padding: 0;
            right: 0;
            left: 0;
            color: #3d3d3d;
        }
        .testimonial .carousel-caption h3 {
            color: #3d3d3d;
        }
        .testimonial .carousel-caption p {
            line-height: 30px;
        }
        .testimonial .carousel-caption .col-sm-3 {
            display: flex;
            align-items: center;
        }
        .testimonial .carousel-caption .col-sm-9 {
            text-align: left;
        }
        .navi a {
            text-decoration:none;
        }
        a > .ico {
            background-color: grey;
            padding: 10px;
            padding-top: 20px;

        }
        a:hover > .ico {
            background-color: #666;
        }


        #subscribe  {
            color: white;
            font-size: 20px;
            font-style: bold;
            font-family: Arial,Helvetica;


        }
        .carouselindicators div a span {
            border-radius: 40%;
            padding: 10px;

        }
        .carouselindicators div a:hover {
            border-radius: 60%;

        }

            .modal {
                box-shadow: 0 10px 9px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);

            }
            .counter
            {
                text-align: center;
            }
            .employees,.live_Properties,.Community,.support
            {
                margin-top: 70px;
                margin-bottom: 70px;

            }
            .counter-count
            {
                font-size: 18px;
                background-color:#FF6F56;
                border-radius: 50%;
                position: relative;
                color: #ffffff;
                text-align: center;
                line-height: 92px;
                width: 92px;
                height: 92px;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                -ms-border-radius: 50%;
                -o-border-radius: 50%;
                display: inline-block;
            }

            .countries-p,.live_Properties-p,.support-p,.Community-p
            {
                font-size: 24px;
                color: #000000;
                line-height: 34px;
            }



            .user_login  div div i span  {
                color: white;
                line-height: 20px;
                font-family: :"Times New Roman", Times, serif;
                font-size: 16px;
                font-style: italic;


            }
            .user_login  div div i span a {
                text-decoration: none;
            }
            .user_login  div div  i a:hover {
                color:black;
                text-decoration: none;

            }

            .box-part .fa-instagram,.fa-dashboard{
                transform: rotate(160deg);
            }



            /*new collaps*/
            .common-style {
                position:fixed;
                left: 0px;
                right: 0px;
                bottom: 50px;
                padding: 20px;
                z-index: 999;
                top:150px;


            }


            .modal{
                width: 100%;
            }
            .res_section {
                width: 100%;
                float: left;
                margin-top: 10px;
                padding: 15px
            }
            .mr_style .custom-select , .res_section .textboxstyle {
                width: 100%;

                color: black;
                padding: 8px 10px 8px 35px;
                border: 1px solid  #ff6f71;
                border-radius: 3px;

                font-size: 14px;
                line-height: 20px;
            }
            .mr_style .custom-select {
                color: black;
                border: 1px solid #ff6f71;
                padding: 8px 10px 8px 35px;
            }
            .mr_style {
                width: 19%;
                float: left;
                margin-right: 1%;
                position: relative;
                margin-bottom: 10px;
            }
            .mr_style i {
                position: absolute;
                left: 10px;
                top: 10px;
                color: #191919;
                font-size: 18px;
            }
            .mr_style.field_section {
                width: 16%;
                float: left;
                margin-right: 1%;
            }
            .mr_style.less-btn {
                width: 10%;
                float: left;
                margin-right: 1%;
            }
            .mr_style.less-btn .cst-btn {
                width: 85px;
                height: 85px;
                border-radius: 100%;
                position: absolute;
                top: -32px;

            }


            .qty .count {
                color: #000;
                display: inline-block;
                vertical-align: top;
                font-size: 25px;
                font-weight: 700;
                line-height: 30px;
                padding: 0 2px
                ;min-width: 35px;
                text-align: center;
            }
            .qty .plus {
                cursor: pointer;
                display: inline-block;
                vertical-align: top;
                color: white;
                width: 30px;
                height: 30px;
                font: 30px/1 Arial,sans-serif;
                text-align: center;
                border-radius: 50%;
            }
            .qty .minus {
                cursor: pointer;
                display: inline-block;
                vertical-align: top;
                color: white;
                width: 30px;
                height: 30px;
                font: 30px/1 Arial,sans-serif;
                text-align: center;
                border-radius: 50%;
                background-clip: padding-box;
            }
            /* div {
                text-align: center;
                } */
                .minus:hover{
                    background-color: #717fe0 !important;
                }
                .plus:hover{
                    background-color: #717fe0 !important;
                }
                /*Prevent text selection*/
                span{
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                }
           
                .service-heading-block{
                    display:block;
                    margin-bottom:30px;
                }
                .title {
                    display: block;
                    font-size: 30px;
                    font-weight: 200;
                    margin-bottom: 10px;
                }
                .sub-title {
                    font-size: 18px;
                    font-weight: 100;
                    line-height: 24px;
                }
                .feature-block {
                    background-color: #fff;
                    border-radius: 2px;
                    padding: 15px;
                    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
                    margin-bottom: 15px;
                    transition:all ease .5s
                }
                .ms-feature:hover, 
                .ms-feature:focus {
                    background-color: #fafafa;
                    box-shadow: 0 3px 4px 3px rgba(0, 0, 0, 0.14), 0 3px 3px -2px rgba(0, 0, 0, 0.2), 0 1px 8px 3px rgba(0, 0, 0, 0.12);
                }
                .fb-icon {
                    border-radius: 50%;
                    display: block;
                    font-size: 36px;
                    height: 80px;
                    line-height: 80px;
                    text-align:center;
                    margin:1rem auto;
                    width: 80px;
                    transition: all 0.5s ease 0s;
                }
                .feature-block:hover .fb-icon,
                .feature-block:focus .fb-icon {
                    box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
                    transform: rotate(360deg);
                }
                .fb-icon.color-info {
                    background-color: #5bc0de;
                    color: #fff;
                }
                .fb-icon.color-warning {
                    background-color: #eea236;
                    color: #fff;
                }
                .fb-icon.color-success {
                    background-color: #5cb85c;
                    color: #fff;
                }
                .fb-icon.color-danger {
                    background-color: #d9534f;
                    color: #fff;
                }
                .feature-block h4 {
                    font-size: 16px;
                    font-weight: 500;
                    margin: 3rem 0 1rem;
                }
                .color-info {
                    color: #46b8da;
                }
                .color-warning {
                    color: #f0ad4e;
                }
                .color-success {
                    color: #4cae4c;
                }
                .color-danger {
                    color: #d43f3a;
                }
                .btn-custom{
                    border: medium none;
                    border-radius: 2px;
                    cursor: pointer;
                    font-size: 14px;
                    font-weight: 500;
                    letter-spacing: 0;
                    margin: 10px 1px;
                    outline: 0 none;
                    padding: 8px 30px;
                    position: relative;
                    text-decoration: none;
                    text-transform: uppercase;
                }


                .ResMail {
                    color: #4cae4c;
                }
                .fb-icon.ResMail {
                    background-color: #FF6F71;
                }
            </style>
        </head>
        <body>




            <!--top menu-->
            <div class="container mb-3 w-100">
                <div>
                    <div>
                        <a href=""><img src="images/logo.png" class="float-left" alt="" style="margin-left:-90px; "></a>
                        <div id="top_menu">
                            <ul class="nav list-unstyled float-right">
                                <li class="nav-item"><a class="nav-link" href="#"><span><i class="fa fa-globe"></i></span>&nbsp;Language</a></li>
                                <li><a href="#" class="nav-link"><span><i class="fa fa-money"></i></span>&nbsp;Currency</a></li>
                                <li><a href="add_property.php" class="nav-link"><span><i class="fa fa-plus"></i></span>&nbsp;Add your property</a></li>
                                <li><a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" class="nav-link"><span><i class="fa fa-sign-in"></i></span>&nbsp;Login</a></li>
                            </ul>
                        </div>

                    </div>
                    <br>
                    <br>
                    <ul class="nav">
                        <li class="nav-item"><a href="hamid.php" class="nav-link">Hotels</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Holiday home</a></li>
                        <li class="nav-item"><a href="" class="nav-link" >Resorts</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Apartment</a></li>
                        <li class="nav-item"><a href="" class="nav-link">VillasVillas</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Guest house</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Explore the World</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Last Minitues Trips</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Solo trips</a></li>

                        <li style="box-shadow: 300;">
                            <button type="button" class="btn btn-danger ml-5 mr-5 mt-3" data-toggle="modal" data-target="#make_a_reservation" style="background-color:#FF6F71;">
                                <span class="fa fa-home pr-2"></span> Make a reservation</button>


                                <button style="background-color:#FF6F71;" type="button" class="btn btn-danger ml-5 mr-5  mt-3" data-toggle="modal" data-target="#plantrip">
                                    <span class="fa fa-plane pr-4"></span>Plan a trip <i class="pr-5"></i></button>
                                </li>
                            </ul>


                        </div>
                    </div>
                   

                    <!-- login Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="box-shadow: 0 10px 9px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">

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

                                            <input type="submit" class="btn btn-success ribbon  btn-block" value="submit" class="form-control">
                                        </div>
                                    </div>



                                </div>


                                <div class="modal-footer">
                                    <div class="col-4">
                                        <p class="i float-left" ><a href="" class="btn-link">forgot password</a></p>
                                    </div>
                                    <div class="col-8">
                                        <p><i>Dont have account ?</i>&nbsp;&nbsp;&nbsp; <a href="" class="">sign-up</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </body>


                    <!-----end model-->

                    <div class="container mw-50">
                    <?php include 'slider.php'; ?>
                </div>
                    <!-----end login section-->

                    <br><br>



                    <div class="container">
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

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-10" style="background-color: #FF6F61">
                                <h3>Subscribe For mor information from myTravaly</h3>
                                <ul class="list-inline" style="float: right;">
                                    <li class="list-inline-item">
                                        <input type="text" name="input" size="">
                                    </li>
                                    <li class="list-inline-item">
                                        <input type="submit" value="subscribe" class="bg-success">
                                    </li>
                                </ul>
                                
                            </div>
                            <div class="col-sm-2">

                            </div>
                            
                        </div>
                    </div>


                    
                    



                    <div class="modal fade col-md-12 col-xs-12 col-lg-12 col-xs-12" id="make_a_reservation" style= "border-radius: 10px; box-shadow: 0 10px 9px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">


                                <div class="modal-header col-12">
                                    <h4 class="modal-title text-center">Make A Reservation</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                


                                <div class="modal-body  col-12">              
                                    <div class=" res_section">
                                        <div class="row">
                                            <div class="mr_style">
                                                <h5>location & Hotel name</h5>

                                            </div>
                                            <div class="mr_style">
                                                <h5>check in</h5>

                                            </div>
                                            <div class="mr_style">
                                                <h5>check out</h5>

                                            </div>
                                            <div class="mr_style">
                                                <h5>people</h5>

                                            </div>
                                            <div class="mr_style">
                                                <h5>rooms</h5>

                                            </div>
                                        </div>
                                        <form method="POST" action="search.php">
                                            <div class="row row_service" >
                                                <div class="mr_style">
                                                    <i class="fa fa-map-marker text-danger" aria-hidden="true"></i>
                                                    <input type="text" name="location" class="form-control textboxstyle" placeholder="From City or airport" required="true" alert="City name">
                                                </div>

                                                <div class="mr_style field_section">
                                                    <i class="fa fa-calendar text-danger" aria-hidden="true"></i>
                                                    <input type="text" name="check_in" class="form-control textboxstyle"  id="checkin_date" placeholder="Check in" autocomplete="off">
                                                </div>
                                                <div class="mr_style field_section">
                                                    <i class="fa fa-calendar text-danger" aria-hidden="true"></i>
                                                    <input type="text" name="check_out" class="form-control textboxstyle" id="checkout_date" placeholder="Check out" autocomplete="off">
                                                </div>

                                                <div class="mr_style field_section">
                                                    <select name="people" id="" class="browser-default custom-select mb-3">
                                                        <option selected="0">People</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7+</option>

                                                    </select>

                                                </div>

                                                <div class="mr_style field_section ">
                                                    <select name="rooms" id=""  class="browser-default custom-select">
                                                        <option selected="0">rooms</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>

                                                    </select>


                                                </div>
                                            </div>

                                            <div class="row col-md-12">
                                    <div class="mr-4 col-md-4 mr_style ">
                                            
                                            <select name="children" id="children"  class="custom-select">
                                                <option value="0">chlidern</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6+</option>

                                            </select>


                                        </div>
                                        <div class="mr-4 col-md-4   ">
                                            <input type="submit" onclick="return Validate();" class="form-control textboxstyle btn btn-success"  value="Search" name="checkout">
                                        </div>

                                    </div>

                                        </form>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="modal fade col-md-12 col-xs-12 col-lg-12 col-xs-12" id="plantrip">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header col-12">
                                    <h4 class="modal-title text-center">Plan a trip</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body col-12" >
                                    <form action="" method="POST">
                                        <div class="  row col-md-12 col-sm-12 col-12 row_service">
                                            <div class="col-md-4">


                                                <div class="form-group">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><i class="fa fa-map-marker text-danger"></i> 
                                                            </div>     
                                                        </div>
                                                        <input type="email" class="form-control  " id="location" name="location" placeholder="choos your trip destination" required>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4">


                                                <div class="form-group" >
                                                    <div class="input-group mb-2">

                                                        <input type="text" class="form-control trip_start_date" id="trip_start_date" name="trip_start_date" placeholder=" select stat date" required>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text"><i class="fa fa-calendar text-danger"></i></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>



                                            <div class="mr_style field_section">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="submit" class="form-control textboxstyle btn btn-success" value="Search">
                                            </div>

                                        </div>             

                                        <!-- Modal footer -->

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"  style="background-color: #ff6f71;" data-dismiss="modal">Close</button>
                                </div>

                                <!-- tabbing -->
                            </div>



                        </div>

                    </div>






                    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script> 
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js"></script>

                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/radialIndicator/1.3.1/radialIndicator.js"></script>  
-->
<div class="container">
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