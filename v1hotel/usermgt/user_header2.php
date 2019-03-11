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
 #navbarid li a{
    color: #ffffff;
  }
</style>

<div class="mb-3 col-md-12">
    <div id="header-row" class="row">

      <ul class="nav" id="navbarid">
        <li class="nav-item"><a href="attendance.php" class="nav-link">Attendance</a></li>
        <li class="nav-item"><a href="apply_for_leave.php" class="nav-link">Apply For Leave</a></li>
        <li class="nav-item"><a href="leave_list.php" class="nav-link">All My Leaves</a></li>
        <li class="nav-item"><a href= "user_pwd_change.php" class="nav-link" >Change Password</a></li>
        <li class="nav-item"><a href="all_hol_user.php" class="nav-link">All Holidays</a></li>
        <li class="nav-item"><a href="user_notice.php" class="nav-link">Notices</a></li>
       </ul>
  </div>
</div>
<!--top menu-->