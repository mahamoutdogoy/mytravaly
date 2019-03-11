<?php 
//session_start();

/*if($_SESSION["usersid"]==true)*/

{
include("../connect.php");
/*include("../usercheck.php");*/
include"fetch.php";
}
?>



        


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

  <link rel="icon" href="fav.png" type="image/png" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>


  <style>
  .inform-card .card-5
 {
    background-color: #E01A4F;

 }

 .inform-card .card-6
 {
    background-color: #FF7F11;
     

 }

 .inform-card .card-7
 {
    background-color: #E01A4F;

 }

 .inform-card .card-8
 {
    background-color: #FF1B1C;
     

 }
  
  </style>
  <body>



 <!--------- end of nav bar ----------->
<?php include 'myheader.php'; ?>
 <!-- ----------- main content ---createuser.php#--------->


 <!------------ side bar ---------------->
 

 <?php

 include"mtsidebar.php";
 ?>
        <!-------------End of sidebar  ----------->


        <!----------- chart section -------------->
 
 <div class="col-md-9 col-lg-10 py-5 bg-light">
        <!-------------- title row ------------->
        <div class="row mb-5">
          <div class="col">
            <h3>
              <span class="text-uppercase text-danger">Dashboard /</span
              ><span class="text-muted small"> My Dashboard</span>
            </h3>
          </div>
        </div>
        <!-------- end of title row -------------->
        <!---------- cards row ----------->
       <div class="row inform-card">

        <div class="col-lg-3 col-md-6 col-10 mx-auto my-5">


            <div class="card card-1">


                <div class="card-body">

                    <div class="flex d-flex justify-content-between">
                        <i class="fa fa-home body-icon"></i>

                        <div class="side-text align-self-center">
                            <h3>20 NEW</h3>
                            <h5>Today's Arrival</h5>
                        </div>
                    </div>
                </div>

                <!-----------   end of card body --------->

                <!---------  card footer ------------>
                <div class="card-footer d-flex justify-content-between">
                    <a href="#">Learn More</a>
                    <i class="fas fa-sync-alt"></i>
                </div>
            </div>
        </div>

        <!---------------------- end of card col 1 ------------------>





        <div class="col-lg-3 col-md-6 col-10 mx-auto my-5">


                <div class="card card-2">
    
    
                    <div class="card-body">
    
                        <div class="flex d-flex justify-content-between">
                            <i class="fa fa-envelope body-icon"></i>
    
                            <div class="side-text align-self-center">
                                <h3>20 NEW</h3>
                                <h5>Messages</h5>
                            </div>
                        </div>
                    </div>
    
                    <!--------------------    end of card body -------------------->
    
                    <!--------------------  card footer ------------------------>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#">Learn More</a>
                        <i class="fas fa-sync-alt"></i>
                    </div>
                </div>
            </div>






            <div class="col-lg-3 col-md-6 col-10 mx-auto my-5">


                    <div class="card card-3">
        
        
                        <div class="card-body">
        
                            <div class="flex d-flex justify-content-between">
                                <i class="fa fa-users body-icon"></i>
        
                                <div class="side-text align-self-center">
                                <h4><?php echo number_format($users); ?> NEW</h4
                                    <h5>Users</h5>
                                </div>
                            </div>
                        </div>
        
                        <!----------------------   end of card body ---------------->
        
                        <!--------------------- card footer ------------------------>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="#">Learn More</a>
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-10 mx-auto my-5">


                        <div class="card card-4">
            
            
                            <div class="card-body">
            
                                <div class="flex d-flex justify-content-between">
                                    <i class="fa fa-hotel body-icon"></i>
            
                                    <div class="side-text align-self-center">
                                        <h3>20 NEW</h3>
                                        <h5>Hotels</h5>
                                    </div>
                                </div>
                            </div>
            
                            <!--------------    end of card body ------------------>
            
                            <!-----------------  card footer ---------------------->
                            <div class="card-footer d-flex justify-content-between">
                                <a href="#">Learn More</a>
                                <i class="fas fa-sync-alt"></i>
                            </div>
                        </div>
                    </div>











                    <div class="col-lg-3 col-md-6 col-10 mx-auto my-5">


                        <div class="card card-5">
            
            
                            <div class="card-body">
            
                                <div class="flex d-flex justify-content-between">
                                    <i class="fa fa-hotel body-icon"></i>
            
                                    <div class="side-text align-self-center">
                                        <h3>40</h3>
                                        <h5>total property live</h5>
                                    </div>
                                </div>
                            </div>
            
                            <!--------------    end of card body ------------------>
            
                            <!-----------------  card footer ---------------------->
                            <div class="card-footer d-flex justify-content-between">
                                <a href="#">Learn More</a>
                                <i class="fas fa-sync-alt"></i>
                            </div>
                        </div>
                    </div>













                    <div class="col-lg-3 col-md-6 col-10 mx-auto my-5">


                        <div class="card card-6">
            
            
                            <div class="card-body">
            
                                <div class="flex d-flex justify-content-between">
                                    <i class="fa fa-hotel body-icon"></i>
            
                                    <div class="side-text align-self-center">
                                        <h3>640</h3>
                                        <h5>total booking</h5>
                                    </div>
                                </div>
                            </div>
            
                            <!--------------    end of card body ------------------>
            
                            <!-----------------  card footer ---------------------->
                            <div class="card-footer d-flex justify-content-between">
                                <a href="#">Learn More</a>
                                <i class="fas fa-sync-alt"></i>
                            </div>
                        </div>
                    </div>











                    <div class="col-lg-3 col-md-6 col-10 mx-auto my-5">


                        <div class="card card-7">
            
            
                            <div class="card-body">
            
                                <div class="flex d-flex justify-content-between">
                                    <i class="fa fa-users body-icon"></i>
            
                                    <div class="side-text align-self-center">
                                    <h4><?php echo number_format($users); ?></h4>
                                        <h5>Verified users</h5>
                                    </div>
                                </div>
                            </div>
            
                            <!--------------    end of card body ------------------>
            
                            <!-----------------  card footer ---------------------->
                            <div class="card-footer d-flex justify-content-between">
                                <a href="#">Learn More</a>
                                <i class="fas fa-sync-alt"></i>
                            </div>
                        </div>
                    </div>









                    <div class="col-lg-3 col-md-6 col-10 mx-auto my-5">


                        <div class="card card-8">
            
            
                            <div class="card-body">
            
                                <div class="flex d-flex justify-content-between">
                                    <i class="fa fa-users body-icon"></i>
            
                                    <div class="side-text align-self-center">
                                        <h3>5</h3>
                                        <h5>banned users</h5>
                                    </div>
                                </div>
                            </div>
            
                            <!--------------    end of card body ------------------>
            
                            <!-----------------  card footer ---------------------->
                            <div class="card-footer d-flex justify-content-between">
                                <a href="#">Learn More</a>
                                <i class="fas fa-sync-alt"></i>
                            </div>
                        </div>
                    </div>

       
    
    
    </div>
    

    <!----------------------------  charts  ------------------------------->


    <div class="row">
   
    <div class="col-md-6 col-lg-4 my-5">

       <div class="card">

        <div class="card-title text-center"> 
            
            <h1>Line Charts</h1>


        </div>

        <canvas id="line-chart">


        </canvas>

       </div>



    </div>



    <div class="col-md-6 col-lg-4 my-5 mx-auto order-3 order-lg-2">

            <div class="card">
     
             <div class="card-title text-center"> 
                 
                 <h1>Revenue</h1>
     
     
             </div>
     
             <canvas id="revenue-chart">
     
     
             </canvas>
     
            </div>
     
     
     
         </div>

         <div class="col-md-6 col-lg-4 my-5 order-2">

                <div class="card">
         
                 <div class="card-title text-center"> 
                     
                     <h1>Profit Maker Analysis</h1>
         
         
                 </div>
         
                 <canvas id="bar-chart">
         
         
                 </canvas>
         
                </div>
         
         
         
             </div>
         
     


    </div>

    </div>
 </div>




  </body>
</html>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    !-- chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <!-- line chart -->
    <script src="line.js"></script>
    <!-- bar-chart -->
    <script src="bar.js"></script>
    <!-- doughnut-chart -->
    <script src="revenue.js"></script>

    <?php 
 if(!isset($_SESSION['user']))
{
    // not logged in
    header('Location:../index.php');
    exit();
}
 ?>