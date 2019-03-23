<!--Connection to database-->
<?php
//session_start();
  include 'connect.php';
  //include 'red.php';
  mysqli_query($con, "SET SESSION sql_mode = ''");
?>

<!--Confirmation function-->
<script>
  function del_conf(){
  return confirm("Are you sure you want to delete this record?");
}
function userfunc(){
    document.getElementById('inhouseusers').style.display="block";
    document.getElementById('customusers').style.display="none";
    document.getElementById('hotelusers').style.display="none";
    document.getElementById('guestusers').style.display="none";
  }
  
  function customfunc(){
    document.getElementById('customusers').style.display="block";
    document.getElementById('inhouseusers').style.display="none";
    document.getElementById('hotelusers').style.display="none";
    document.getElementById('guestusers').style.display="none";
  }
  
  function hotelfunc(){
    document.getElementById('hotelusers').style.display="block";
    document.getElementById('inhouseusers').style.display="none";
    document.getElementById('customusers').style.display="none";
    document.getElementById('guestusers').style.display="none";
  }

  function guestfunc(){
    document.getElementById('guestusers').style.display="block";
    document.getElementById('hotelusers').style.display="none";
    document.getElementById('inhouseusers').style.display="none";
    document.getElementById('customusers').style.display="none";
  }
</script>

<!--top menu-->
<style>
  #navbarid{
    background: #f15025;
  }
  #header-row{
    background: #f15025;
  }
 #navbarid li a{
    color: #ffffff;
  }
</style>

<div class="mb-3 col-md-12">
  <div  id="header-row" class="row">

    
    <ul class="nav center" id="navbarid">
      <li class="nav-item"><a href="user_main1.php" class="nav-link">Main</a></li>
      <li class="nav-item"><a href="create_user.php" class="nav-link">Create User</a></li>
      <li class="nav-item"><a href="all_users.php" class="nav-link">All Users</a></li>
      <li class="nav-item"><a href="designation.php" class="nav-link" >Designation/Department</a></li>
      <li class="nav-item"><a href="all_hol.php" class="nav-link">All Holidays</a></li>
      <li class="nav-item"><a href="leave_list_admin.php" class="nav-link">All Leaves</a></li>
      <li class="nav-item"><a href="leave_category.php" class="nav-link">Leave Category</a></li>
      <li class="nav-item"><a href="notice.php" class="nav-link">Notices</a></li>
     </ul>
 
  </div>
</div>
<!--top menu-->