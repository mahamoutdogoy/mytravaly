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
    <div class="card">
      <div class="card-header">
        <h5><i class="fas fa-sign-in-alt"></i> Login</h5>
      </div>
      <div class="card-body">
        <p>Please login on time and logout while quiting</p>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h5><i class="fas fa-unlock"></i> Password</h5>
      </div>
      <div class="card-body">
        <p>Strictly use a complexe password and remember to change it after a while</p>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h5><i class="fas fa-desktop"></i> Screen log</h5>
      </div>
      <div class="card-body">
        <p>Whenever leave your working place do not forget to log your screen</p>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h5><i class="fas fa-info"></i> More</h5>
      </div>
      <div class="card-body">
        <p>Some more things to write here still.............................</p>
      </div>
    </div>
  </div>
 </div>

  <!--Footer part-->
  <?php
    //include"footer.php";
  ?>
</body>
</html>