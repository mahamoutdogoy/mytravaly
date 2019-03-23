<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    include '../mytravalyAdmin/myheader.php';
   include"../mytravalyAdmin/mtsidebar.php";
   ?>
  
  <div class="col-md-9 col-lg-10">
      <?php
    include"user_header1.php";
  ?>
    <!--Creating new notice-->
  <div class="modal" id="notModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style='background:#f15025;color:white'>
        <div class="modal-title"><h3 "> <i class="far fa-edit"></i> Create Notice</h3></div>
        <button class='close' data-dismiss='modal' style='margin-left: 40%'>&times;</button>
        <hr>
      </div>
      <div class="modal-body">
        <form method="POST" class="col-md-12">
          <table class="table table-lg">
          <tr >
            <td><label for="">Notice Title</label></td>
            <td><input type="text" name="title" class="form-control mx-auto" required placeholder="Notice Title"></td>
          </tr>
          <tr >
            <td><label for="">Notice Content</label></td>
            <td><textarea name="content" id="" rows="10" class="form-control mx-auto" required placeholder="Notice content"></textarea></td>
          </tr>
        </table>
          <div class="form-group text-center mx-auto">
            <input type="submit" name="createNotice" value="Create" class=" btn btn-success">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal" style='background:#f15025;color:white'>Close</button>
      </div>

    </div>
  </div>
</div>
    <button button type="button" class="btn btn-warning" data-toggle="modal" data-target="#notModal" data-backdrop='static' data-keyboard='false' style="margin: 20px;"><i class="fas fa-plus"></i> Create New Notice</button>


    <!-- Listing the notices-->  
    <div class="row">
      <?php
        $sel_sql = "SELECT * FROM notices ORDER BY notid DESC";
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