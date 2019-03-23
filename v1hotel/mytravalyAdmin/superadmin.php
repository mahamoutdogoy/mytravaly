<?php 
session_start();

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Mytravaly</title>
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

 <nav class="navbar navbar-expand-md">
     <div class="container-fluid">
       <a href="" class="navbar-brand text-uppercase"></a>
       <!-- <h1 class="hh">Admin Dashboard</h1> -->
       <img src="images/logo1.png" alt="">

       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse justify-content-end" id="myNavbar">

         <ul class="navbar-nav links d-md-none">
             <li class="nav-item">
                 <a href="#" class="nav-link">
                     <i class="fa fa-home text-muted mr-3"></i>   
                     Dashboard            
                </a>
             </li>

             <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-list text-muted mr-3"></i>   
                        RestMail          
                    </a>
            </li>

                <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-envelope text-muted mr-3"></i>   
                            CRM        
                         </a>
                 </li>
                 <li class="nav-item">
                         <a href="#" class="nav-link">
                         <i class="fa fa-desktop text-muted mr-3"></i>   
                                Property        
                         </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                       <i class="fa fa-envelope text-muted mr-3"></i>   
                                    PMS        
                     </a>
                 </li>
                                           
                
         </ul>


          <!---------- nav icons ----------->


         <ul class="navbar-nav icons">

            <li class="nav-item mr-4">

                <a href="#" class="nav-link">

                 <i class="fa fa-search"></i>
                </a>
            </li>


            <li class="nav-item mr-4">

                    <a href="#" class="nav-link">
                
    
                        <i class="fa fa-bell icon"></i>
                        
                    </a>
             </li>

                <li class="nav-item mr-4">

                     <a href="#" class="nav-link">
        
                            <i class="fa fa-comment icon"></i>
                        </a>
                    </li>


                    <li class="nav-item mr-5">

                        <a href="#" class="nav-link">

                            <img src="images/team.jpg" width="40" alt="image" class="img-fluid rounded-circle img-thumbnail">
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out">

                            <i class="fa fa-sign-out-alt"></i>
                            Sign Out
                        </a>
                    </li>
         </ul>

       </div>
       
     </div>

 </nav>


 <!--------- end of nav bar ----------->

 <!-- ----------- main content ---createuser.php#--------->


 <!------------ side bar ---------------->
 <div class="container-fluid">


    <div class="row">
        <!------------ sidebar ------------->
         <nav class="col-md-3 col-lg-2 d-none d-md-block sidebar right-padding max-viewport">

            <a href="#" class="navbar-brand py-3">

                <img src="images/team.jpg" width="40" alt="person" class="img-fluid rounded-circle img-thumbnail mr-3">

                hi, <?php echo $_SESSION['user']['fname'];?> 
           <i>(<?php echo $_SESSION['user']['role'];?>) </i>
         
            </a>



         <ul class="navbar-nav flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-home " style="color:#150578"  ></i>   
                    &nbsp;&nbsp;Dashboard            
                   </a>
            </li>

            <li class="nav-item">
                   <a href="../mail-using-server.php" class="nav-link">
                       <i class="fa fa-list " style="color:#FFBA08"></i>   
                       &nbsp;&nbsp;ResMail          
                      </a>
               </li>

               <li class="nav-item">
                       <a href="../mytravalycrm/CRM/leadtablepage.php" class="nav-link">
                           <i class="fa fa-envelope " style="color:#E01A4F;"></i>   
                           &nbsp;&nbsp;CRM         
                          </a>
                   </li>
                   <li class="nav-item">
                           <a href="../propertymenus.php" class="nav-link">
                               <i class="fa fa-building" style="color:rgba(194, 36, 133, 0.747)"></i>   
                               &nbsp;&nbsp;Property      
                              </a>
                       </li>
                       <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-envelope " style="color:green"></i>   
                                   &nbsp;&nbsp;PMS         
                                  </a>
                           </li>   
        </ul>





        <ul class="navbar-nav flex-column">

            <li class="nav-item text-uppercase text-muted">

               
            </li>
            <li class="nav-items">
                <a href="profitmaker.html" class="nav-link">
                    <fa class="fa fa-home " style="color:red"></fa>   
                    &nbsp;&nbsp;Profit Maker          
                   </a>
            </li>

            <li class="nav-items">
                   <a href="#" class="nav-link">
                       <i class="fa fa-address-card " style="color:#06D6A0"></i>   
                       &nbsp;&nbsp;Accounts        
                      </a>
               </li>

               <li class="nav-item">
                       <a href="#" class="nav-link">
                           <i class="fa fa-envelope " style="color:#F7CB15"></i>   
                           &nbsp;&nbsp;Social Media   
                          </a>
                   </li>
                   <li class="nav-item">
                           <a href="#" class="nav-link">
                               <i class="fa fa-desktop " style="color:#740d06"></i>   
                               &nbsp;&nbsp;Report      
                              </a>
                       </li>
                       <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;MarketPlace         
                                  </a>
                           </li>



                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Pay Plans       
                                  </a>
                           </li>



                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Payment        
                                  </a>
                           </li>



                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Log Viewer        
                                  </a>
                           </li>



                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Setting       
                                  </a>
                           </li>



                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Contact       
                                  </a>
                           </li>


                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Support       
                                  </a>
                           </li>

                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="fa fa-shopping-bag " style="color:#07775f"></i>   
                                   &nbsp;&nbsp;Organizations       
                                  </a>
                           </li>


                           <li class="nav-item">
                                <a href="../createuser.php" class="nav-link">
                                    <i class="fa fa-users " style="color:#a610e5"></i>   
                                    &nbsp;&nbsp;User Management        
                                   </a>
                            </li>
                                          
               
             </ul>
         </nav>
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




 <!-----------  the modal --------------->
 <div class="modal fade" id="sign-out">
    <div class="modal-dialog">
        <div class="modal-content">

            <!------------------------- modal header ------------------------>

            <div class="modal-header">

                <h4 class="modal-title">Already want to leave?</h4>

                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>
            </div>

            <!--------------------------------- modal body --------------------->

            <div class="modal-body">
                It is sad to see you go . Please press logout to leave
            </div>

            <!-------------------------- modal footer ------------------------>
             <div class="modal-footer">

                <button class="btn btn-primary" type="button" data-dismiss="modal">Stay Here</button>
                <!-- <button class="btn btn-danger" formaction="../index.php" type="button"  data-dismiss="modal">Log out</button> -->

                <a href="../index.php" class="btn btn-danger">
                     log out</a>
             </div>


        </div>
    </div>


 </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <!-- line chart -->
    <script src="line.js"></script>
    <!-- bar-chart -->
    <script src="bar.js"></script>
    <!-- doughnut-chart -->
    <script src="revenue.js"></script>

    <!------------- toggler button --------------------------->
    <script>
      $(".navbar-toggler").html(
        '<i class="fa fa-arrow-down fa-3x text-white"></i>'
      );
    </script>
  </body>
</html>
