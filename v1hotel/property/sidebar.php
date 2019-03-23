


<style>
  




  body
{
    font-family: 'Roboto', sans-serif;
    min-height: 100vh;

}
.right-padding
{
    padding-right: 0;
}
.no-padding
{
    padding: 0;

}

/*   nav bar */

.navbar
{
    border-top: 1px solid #f15025;
   /* border-bottom: 1px solid #f15025;
*/    background-color:#fff;
  /*   height:140px; */
    
}

.navbar .navbar-brand
{
    color: #f15025;

}
.navbar .navbar-link,
.navbar .icons
{
    color: #687384;
}

.navbar .navbar-link:hover,
.navbar .icons:hover
{
    color: #fff;

}
.navbar .icon
{
    position: relative;
}
.navbar .icon::after
{
    content: "";
    position: absolute;
    top: -5px;
    left: 10px;
    height: 10px;
    width: 10px;
    border-radius: 50%;
   /* background-color: #ef5350;*/

}


/*  --------      sidebar    -------------  */


 .sidebar
 {
     
     background-color: #f15025;
     /*height: 550px;*/
     width: 100%;
    
 }

 .sidebar .nav-link,
 .sidebar .navbar-brand
 {
    /* color: #687384;*/
    color: #fff;
     padding-left: 2px;
 }



 .sidebar .nav-link:hover,
 .sidebar .navbar-brand:hover
 {
     color:#FF7F11;
 }

.hh
{
    color:#FF7F11;
}

.rounded-circle{
  width: 20px;
}



 
  

  
  
</style>
<body>
 <!------------ side bar ---------------->

        <!------------ sidebar ------------->
       
         <nav class="d-none d-md-block sidebar right-padding max-viewport">
           <div class="container-fluid">
            <div class="navbar-header">
               <a href="#" class="navbar-brand py-3">

                <img src="../images/hassan.jpg" width="30" alt="none" class="img-fluid rounded-circle img-thumbnail mr-3">Hi, prashanth
            </a>
            </div>
            


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
                       <a href="index.php" class="nav-link">
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
                                <a href="user_main1.php" class="nav-link">
                                    <i class="fa fa-users " style="color:#a610e5"></i>   
                                    &nbsp;&nbsp;User Management        
                                   </a>
                            </li>
                                          
               
             </ul>
           </div>

         </nav>
      
        <!-------------End of sidebar  ----------->
</body>
