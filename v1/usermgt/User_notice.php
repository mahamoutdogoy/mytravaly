<?php  include"red.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mytravaly</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


</head>
<body>
  <!--Header part-->
  <?php
    include"user_header2.php";
  ?>
  <div class="row">
    <?php
    include"sidebar.php";
   ?>
  
  <div class="container">
    <!-- Listing the notices-->  
    <div class="row">
      <?php
        $sel_sql = "SELECT * FROM notices ORDER BY notid DESC";
        $run =mysqli_query($con, $sel_sql);
        while ($rows = mysqli_fetch_assoc($run)) {
          # code... 
          echo "<div class='col-md-6'><div class='card ml-1 mb-2'>
            <div class='card-header'>
              <h5><i class='fas fa-info'></i> $rows[notname]</h5>
            </div>
            <div class='card-body'>
              <p>$rows[notcontent]</p>
            </div>
          </div></div>";
        }
      ?>
    </div>
  </div>
 </div>

  <!--Footer part-->
  <?php
    //include"footer.php";
  ?>
</body>
</html>