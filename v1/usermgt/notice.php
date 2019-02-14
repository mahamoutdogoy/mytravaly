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
    include"user_header1.php";
  ?>
  <div class="row">
    <?php
    include"sidebar.php";
   ?>
  
  <div class="container">
    <!--Creating new notice-->
    <div class="card mb-4">
      <div class="card-header">
        <h3 "> <i class="far fa-edit"></i> Create new Notice</h3>
        <hr>
      </div>
      <div class="card-body">
        <form method="post" style="margin-left: 10%" class="col-md-8">
          <div class="form-group form-inline">
            <label for="" style="margin-left: 10%">Notice Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="title" class="form-control mx-auto" required placeholder="Designation name" style="width: 65%;">
          </div>
          <div class="form-group form-inline">
            <label for="" style="margin-left: 10%">Notice Content</label>
            <textarea name="content" id="" rows="10" required class="form-control mx-auto" required placeholder="Notice content" style="width: 65%;"></textarea>
          </div>
        </div>
        <div class="footer">
          <div class="form-group" class="text-center" style="margin-left: 50%">
            <input type="submit" name="createNotice" value="Create" class=" btn btn-success">
          </div>
        </form>
    </div>
    </div>

    <!-- Listing the notices-->  
    <div class="row">
      <?php
        $sel_sql = "SELECT * FROM notices";
        $run =mysqli_query($con, $sel_sql);
        while ($rows = mysqli_fetch_assoc($run)) {
          # code... 
          echo "<div class='col-md-6'><div class='card ml-1 mb-2'>
            <div class='card-header'>
              <h5><i class='fas fa-info'></i> $rows[notname] <a href='notice.php?delid=$rows[notid]' class='btn btn-warning btn-lg float-right' onclick = 'return del_conf();'>X</a></h5>
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

<!--Inserting data into the Notice table -->
<?php
  if(isset($_POST['createNotice'])){
    $title = mysqli_real_escape_string($con, strip_tags($_POST['title']));
    $content = mysqli_real_escape_string($con, strip_tags($_POST['content']));
    $ins_sql = "INSERT INTO notices (notname, notcontent) VALUES ('$title', '$content')";
    if (mysqli_query($con, $ins_sql)){?>
      <script>window.location = "notice.php";</script>
      <?php
    }
  }
?>

<!--Deleting a record from Notice table -->
<?php
  if(isset($_GET['delid'])){
    $del_sql = "DELETE FROM notices WHERE notid = '$_GET[delid]'";
    if (mysqli_query($con, $del_sql)){?>
      <script>window.location = "notice.php";</script>
      <?php
    }
  }
?>