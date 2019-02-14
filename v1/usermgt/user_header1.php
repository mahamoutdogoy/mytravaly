<!--Connection to database-->
<?php

 include"../connect.php";


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
      <a href=""><img src="../mytravalyAdmin/images/logo1.png" class="float-left"></a>
    </div>
    <div class="clearfix"></div>

    <div class="mt-5" >
    <ul class="nav" id="navbarid">
      <li class="nav-item"><a href="user_main1.php" class="nav-link">Main</a></li>
      <li class="nav-item"><a href="create_user.php" class="nav-link">Create User</a></li>
      <li class="nav-item"><a href="all_users.php" class="nav-link">All Users</a></li>
      <li class="nav-item"><a href="designation.php" class="nav-link" >Designation/Department</a></li>
      <li class="nav-item"><a href="all_hol.php" class="nav-link">All Holidays</a></li>
      <li class="nav-item"><a href="leave_list_admin.php" class="nav-link">All Leaves</a></li>
      <li class="nav-item"><a href="leave_category.php" class="nav-link">Leave Category</a></li>
      <li class="nav-item"><a href="notice.php" class="nav-link">Notices</a></li>
      <li class="nav-item " style="margin-left: 72px;"><a href="#" class="nav-link">LogOut</a></li>
     </ul>
  </div>
  </div>
</div>
<!--top menu-->