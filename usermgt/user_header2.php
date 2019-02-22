<!--Connection to database-->
<?php
  date_default_timezone_set("Asia/Kolkata");
  $server = "localhost";
  $user = "mytravaly";
  $pwd = "mytravaly";
  $db = "mytravaly";

  $con = mysqli_connect($server,$user,$pwd,$db);
?>

<!--Confirmation function-->
<script>
  function del_conf(){
  return confirm("Are you sure you want to delete this record?");
}
</script>

<!--top menu-->
<style>
  #navbarid{
    background: #f15025;
  }
  ul li a{
    color: #ffffff;
  }
</style>

<div class="container mb-3 col-md-12">
    <div class="row">
      <div>
        <a href=""><img src="images/logo.png" class="float-left"></a>
      </div>
      <div class="clearfix"></div>

      <div class="mt-5">
      <ul class="nav" id="navbarid">
        <li class="nav-item"><a href="attendance.php" class="nav-link">Attendance</a></li>
        <li class="nav-item"><a href="apply_for_leave.php" class="nav-link">Apply For Leave</a></li>
        <li class="nav-item"><a href="leave_list.php" class="nav-link">All My Leaves</a></li>
        <li class="nav-item"><a href= "user_pwd_change.php" class="nav-link" >Change Password</a></li>
        <li class="nav-item"><a href="all_hol_user.php" class="nav-link">All Holidays</a></li>
        <li class="nav-item"><a href="user_notice.php" class="nav-link">Notices</a></li>
        <li class="nav-item " style="margin-left: 250px;"><a href="#" class="nav-link">LogOut</a></li>
       </ul>
    </div>
  </div>
</div>
<!--top menu-->