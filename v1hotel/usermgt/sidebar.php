
<?php 
/*session_start();*/

   include "connect.php";
 ?>



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
    background-color: #ef5350;

}


/*  --------      sidebar    -------------  */


 .sidebar
 {
     background-color: #f15025;
     height: 550px;
    
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
     color:#007bff;
 }

.hh
{
    color:#FF7F11;
}

.rounded-circle{
  width: 20px;
}



 
  

  
  
</style>
 <!------------ side bar ---------------->

        <!------------ sidebar ------------->
        <div class="container-fluid">
          <div class="row">
         <nav class="col-md-3 col-lg-2 d-none d-md-block sidebar right-padding max-viewport">

            <a href="../mytravalyAdmin/profile.php" class="navbar-brand py-3">
               <img src='<?php echo $image_src; ?>' style='width:50px;height:50px' alt=person class='img-fluid rounded-circle img-thumbnail mr-3'/>

               <!--  <img src="images/user3.png" width="30" alt="none" class="img-fluid rounded-circle img-thumbnail mr-3"> -->
                hi, <?php echo $_SESSION['user']['username'];?> 
            </a>


         <ul class="navbar-nav flex-column">
            <li class="nav-item">
                <a href="attendance.php" class="nav-link">
                    <i class="fa fa-home " style="color:#150578"  ></i>   
                    &nbsp;&nbsp;Dashboard            
                   </a>
            </li>
        <?php
          $ur_sql = "SELECT privilege FROM users WHERE userid=".$_SESSION['user']['userid']; //session
          $ur_run = mysqli_query($con,$ur_sql);
          $ur_rows = mysqli_fetch_assoc($ur_run);
          $prvs=explode(',',$ur_rows['privilege']);
          $count = count($prvs) - 1;


          $sel_sql ="SELECT * FROM privileges";
          $run_sql =mysqli_query($con,$sel_sql);
          while ($rows = mysqli_fetch_assoc($run_sql)) {
            $d_class='d-none';
            for ($i=0 ; $i < $count; $i++ ) { 
              if ($prvs[$i]==$rows['preid']) {
                $d_class='d-block';
                break;
              }
          }
            echo "<li class='nav-item $d_class'>";
              if ($rows['prename'] == "CRM") {
                echo "<a href='../mytravalycrm/CRM/index.php' class='nav-link'>
                       <i class='fa fa-list' style='color:#FFBA08'></i>   
                       &nbsp;&nbsp;$rows[prename]          
                      </a>
               </li>";
              }else{
                   echo "<a href='#' class='nav-link'>
                       <i class='fa fa-list' style='color:#FFBA08'></i>   
                       &nbsp;&nbsp;$rows[prename]          
                      </a>
               </li>";}
          }

        ?>     
               
             </ul>
         </nav>
        <!-------------End of sidebar  ----------->

