<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

 <!------------ side bar ---------------->
 <div class="container-fluid">


    <div class="row">
        <!------------ sidebar ------------->
         <nav class="col-md-3 col-lg-2 d-none d-md-block sidebar right-padding max-viewport">

            <a href="profile.php" class="navbar-brand py-3">

                <img src="images/team.jpg" width="40" alt="person" class="img-fluid rounded-circle img-thumbnail mr-3">

                hi, <?php echo $_SESSION['user']['username'];?> 
       <!--     <i>(<?php// echo $_SESSION['user']['role'];?>) </i> -->
         
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
                           <a href="property1/index.php" class="nav-link">
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
                                <a href="../usermgt/user_main1.php" class="nav-link">
                                    <i class="fa fa-users " style="color:#a610e5"></i>   
                                    &nbsp;&nbsp;User Management        
                                   </a>
                            </li>
                                          
               
             </ul>
         </nav>
        <!-------------End of sidebar  ----------->

