<?php 
require_once 'config.php';
$keyword = $_REQUEST['all_key'];

$sorting1 = isset($_POST['by_name']) ;
$sorting2 = isset($_POST['by_rating']);
$sorting3 = isset($_POST['by_price']);
$sorting4 = isset($_POST['by_star']);

$wedding = isset($_POST['wedding']);
$world = isset($_POST['world']);
$city = isset($_POST['city']);
$night = isset($_POST['night']);
$food = isset($_POST['food']);
$culture = isset($_POST['culture']);

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <style>
  html,body{
    height: 100%;
    width: 100%;

  }
  .container{
    min-height: 100%;
    min-width: 100%;
  }
  a:hover{

    text-decoration: none;
    border: none;
  }
  .checked{
    color: orange;
  }
  .buttons {
    background-color: 
  }



  .ui-group-buttons .or{position:relative;float:left;width:.3em;height:1.3em;z-index:3;font-size:12px}
  .ui-group-buttons .or:before{position:absolute;top:50%;left:50%;content:'or';background-color:#5a5a5a;margin-top:-.1em;margin-left:-.9em;width:1.8em;height:1.8em;line-height:1.55;color:#fff;font-style:normal;font-weight:400;text-align:center;border-radius:500px;-webkit-box-shadow:0 0 0 1px rgba(0,0,0,0.1);box-shadow:0 0 0 1px rgba(0,0,0,0.1);-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box}
  .ui-group-buttons .or:after{position:absolute;top:0;left:0;content:' ';width:.3em;height:2.84em;background-color:rgba(0,0,0,0);border-top:.6em solid #5a5a5a;border-bottom:.6em solid #5a5a5a}

  .ui-group-buttons .btn{float:left;border-radius:0}




  .bg-orange {background:#d8622b;color:#fff!important;}
  body{background:#f4f4f4;}
  img{width:100%;max-height:560px;}
  a {color:#696969;}



  /*viw map carouseel*/

    /* .container{
      min-width: 100%;
      } */
      .carousel-thumbnails .carousel-indicators img {
        max-width: 100px;
        height: 70px;
        overflow: hidden;
        display: block;
      }


      .carousel-thumbnails .carousel-indicators li {
        height: auto;
        max-width: 100px;
        width: 100px;
        border: none;
        box-shadow: 1px 3px 5px 0px rgba(0,0,0,0.75);
        
        &.active {
          border-bottom: 4px solid #fff;
        }

      }
      .container1 {
        width: 100%;
      }


      .img-sm {
        width: 200px;
        height: 200px;
        max-height: 200px;
        max-width: 200px;
        object-fit: cover;
      }

    </style>
  </head>
  <body>

    <section class="mb-5">
      <div class="container">
        <ul class="list-inline pr-3">
          <li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="index.php">Home<i class="fas fa-arrow-circle-right"></i></a></li>
          <li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#"><i class="fas fa-arrow-circle-right"></i></a></li>
          <li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " target="_blank" href="#">From <i class="fas fa-arrow-circle-right"></i></a></li>
          <li class="list-inline-item"><a style="color: #FF6F61;" class="social-icon " >To <i class="fas fa-arrow-circle-right"></i></a></li>

        </ul>
        <div class="row">
          <div class="col-md-3">
            <form method="POST">
             <h5><strong>Filter Search Result</strong></h5>
             <div class="card">
              <div class="card-body">
                <div class="row">

                  <div class="col-md-12">
                    <label for=""><b>Check In</b></label>
                    <input type="date" class="form-control" name="checkin" placeholder="check in date">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for=""><b>Check Out</b></label>
                    <input type="date" class="form-control" name="checkout" placeholder="check out date">
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <strong><p>Star</p></strong>

                    <div class="row mb-3">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-body">

                            <span class="fa fa-star" id="star1" onclick="add(this,1)"></span>
                            <span class="fa fa-star" id="star2" onclick="add(this,2)"></span>
                            <span class="fa fa-star" id="star3" onclick="add(this,3)"></span>
                            <span class="fa fa-star" id="star4" onclick="add(this,4)"></span>
                            <span class="fa fa-star" id="star5" onclick="add(this,5)"></span>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>


            <div class="row mb-3">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <strong><p>Price per Night</p></strong>
                    <div>
                      <select name="filter_price" id=""  class="custom-select">
                        <option selected value="1000">1000-3000</option>
                        <option value="3000">3000-5000</option>
                        <option value="5000">5000-8000</option>
                        <option value="8000">8000-10000</option>
                        <option value="10000">10000-12000</option>
                        <option value="12000">12000+</option>
                      </select>


                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <strong><p> Accommodation type</p></strong>
                    <hr>
                    <div class="mb-3" ">
                      <input type="checkbox" class="" id="AppartmentCustomCheck" name="checked_list[]" value="Appartment" onclick="">
                      <label class="" for="AppartmentCustomCheck">Appartment</label>
                    </div>
                    <div class=" mb-3">
                      <input type="checkbox" class="" id="GuesthouseCustomCheck" name="checked_list[]" value="Guesthouse">
                      <label class="" for="GuesthouseCustomCheck">Guest house</label>
                    </div>
                    <div class=" mb-3">
                      <input type="checkbox" class="" id="villaCustomCheck" value="Villa" name="checked_list[]">
                      <label class="" for="villaCustomCheck">Villa</label>
                    </div>
                    <div class=" mb-3">
                      <input type="checkbox" class="" id="ResortCustomCheck" value ="Resort" name="checked_list[]">
                      <label class="" for="ResortCustomCheck">Resort</label>
                    </div>
                    <div class=" mb-3">
                      <input type="checkbox" class="" id="HotelCustomCheck" value ="Hotel" name="checked_list[]"> 
                      <label class="" for="HotelCustomCheck">Hotel</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <input type="submit" class="form-control btn btn-success" value="Apply" name="filter_search">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-9">
          <div class="row mb-3     " style="background-color:#FF6F71;color:white;z-index: 199999;">
            <div class="col-md-3 " >
              <span style="background-color:#FF6F71;color:white;"><form method="POST"><button style="background-color:#FF6F71;color:white;" class="btn" onclick="this.form.submit()" name="by_star"> By Star</button></span>
                <span class="fa fa-star text-warning" ></span>
                <span class="fa fa-star text-warning" ></span>
                <span class="fa fa-star text-warning" ></span>
                <span class="fa fa-star text-warning" ></span>
                <span class="fa fa-star text-warning" ></span>
              </form>
            </div>      
            <div class="col-md-2" >
              <form method="POST">
                <button  class="mt-1" style="background-color:#FF6F71;border: none;color:white" onclick="this.form.submit()" name="by_name">  Name <i class="fa fa-sort" aria-hidden="true"></i></button>
              </form>
            </div>
            <div class="col-md-2">
              <form method="POST">
                <button  class="mt-1" style="background-color:#FF6F71;border: none;color:white" onclick="this.form.submit()"  name="by_price">Price <i class="fa fa-sort" aria-hidden="true"></i></button>
              </form>
            </div>
            <div class="col-md-2">
              <button  class="mt-1" style="background-color:#FF6F71;border: none;color:white">  Location <i class="fa fa-sort" aria-hidden="true"></i></button>
            </div>
            <div class="col-md-2">
              <form method="POST">
                <button  class="mt-1" style="background-color:#FF6F71;border: none;color:white" name="by_rating" onclick="this.form.submit()">  Rating <i class="fa fa-sort" aria-hidden="true"></i></button>
              </form>
            </div>
          </form>
        </div> 
        <?php 
if(isset($_POST['filter_search'])){
  if(!empty($_POST['checked_list'])){
    foreach($_POST['checked_list'] as $all_type) {
      if($_POST['filter_price']==1000){
      $query = "SELECT * FROM property_details WHERE propertytype='$all_type' AND property_price>='$_POST[filter_price]' AND property_price<=3000 AND keyword='$keyword'";
    }elseif($_POST['filter_price']==3000){
      $query = "SELECT * FROM property_details WHERE propertytype='$all_type' AND property_price>='$_POST[filter_price]' AND property_price<=5000 AND keyword='$keyword'";
    }elseif($_POST['filter_price']==5000){
     $query = "SELECT * FROM property_details WHERE propertytype='$all_type' AND property_price>='$_POST[filter_price]' AND property_price<=8000 AND keyword='$keyword'";
    }elseif($_POST['filter_price']==8000){
      $query = "SELECT * FROM property_details WHERE propertytype='$all_type' AND property_price>='$_POST[filter_price]' AND property_price<=10000 AND keyword='$keyword'";
    }elseif($_POST['filter_price']==10000){
      $query = "SELECT * FROM property_details WHERE propertytype='$all_type' AND property_price>='$_POST[filter_price]' AND property_price<=12000 AND keyword='$keyword'";
    }else{
      $query = "SELECT * FROM property_details WHERE propertytype='$all_type' AND property_price>='$_POST[filter_price]' AND keyword='$keyword'";
    }

      $result = mysqli_query($connect,$query);
      while ($row = mysqli_fetch_array($result)) {

          if($row['rating']>=5 && $row['rating']<=7){
            $rating = 'good';
          }elseif ($row['rating']>7) {
            $rating = 'very good';
          }
          else{
            $rating = 'medium';
          }

          if($row['star']==5){
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }elseif ($row['star']==4) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }elseif ($row['star']==3) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }
          elseif ($row['star']==2) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i></i>';
          }
          else{
            $star = '<i class="text-warning ml-4 fa fa-star"></i>';
          }


          $path="\"javascript: form.action='view.php?property_id=".$row['property_id']."'\"";

          $output =  '<div class="row mb-3">
          <div class="col-md-12">
          <div class="card">

          <div class="card-body">

          <div class="row">
          <div class="col-md-3">
          <img    src="data:image/jpeg;base64,'.base64_encode($row["property_image"]).'" class="img-sm">
          </div>
          <div class="col-md-6">

          <h6 style="text-transform:uppercase">'.$row['propertyname'].$star.'</h6>
          <p>'.$row['address'].'</p>
          <p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban"></i>Free Cancellation</span></strong></p>

          <ul class="list-inline">
          <li class="list-inline-item" ><input type="button" onclick="" data-toggle="modal" data-target="#view" class="btn preview" style="background-color:#FF6F71" value="Preview" text="'.$row['property_id'].'">

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">

          </div>
          </div>
          </div></li>
          <li class="list-inline-item mt-5" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg"  style="background-color:#FF6F71">Map view</button>

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <p>Map view page</p>
          </div>
          </div>
          </div></li>
          <li class=mt-5 list-inline-item" style="float: right;"><i style="color: green">'.$rating.'</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white" align="center"><b>'.$row['rating'].'</b></p></li>

          </ul>
          </div>
          <div class="col-md-3">
          <h4>USD '.$row["property_price"].' &#x20B9</h4>
          <p>avg/Night</p>
          <form method="POST" action="view.php">
          <input type="submit" name="book_now"   onclick='.$path.'  data-target="" data-toggle="" value="Book Now" class="btn mt-2 mb-3 bl-1"     style="background-color:#FF6F71" >
          </form>

          <!-- price from other companies -->
          <i class="mr-1">Expedia</i><span>3050&#x20B9;</span>
          <i class="mr-1">Booking.com</i><span>5070&#x20B9;</span>
          <i class="mr-1">MakemyTrip</i> <span>4200&#x20B9;</span>
          </div>
          </div>

          </div>
          </div>
          </div>
          </div>

          ';
          echo $output;
        }


    }
  }else{
    if($_POST['filter_price']==1000){
      $query = "SELECT * FROM property_details WHERE  property_price>='$_POST[filter_price]' AND property_price<=3000 AND keyword='$keyword'";
    }elseif($_POST['filter_price']==3000){
      $query = "SELECT * FROM property_details WHERE  property_price>='$_POST[filter_price]' AND property_price<=5000 AND keyword='$keyword'";
    }elseif($_POST['filter_price']==5000){
     $query = "SELECT * FROM property_details WHERE  property_price>='$_POST[filter_price]' AND property_price<=8000 AND keyword='$keyword'";
    }elseif($_POST['filter_price']==8000){
      $query = "SELECT * FROM property_details WHERE  property_price>='$_POST[filter_price]' AND property_price<=10000 AND keyword='$keyword'";
    }elseif($_POST['filter_price']==10000){
      $query = "SELECT * FROM property_details WHERE  property_price>='$_POST[filter_price]' AND property_price<=12000 AND keyword='$keyword'";
    }else{
      $query = "SELECT * FROM property_details WHERE  property_price>='$_POST[filter_price]' AND keyword='$keyword'";
    }

      $result = mysqli_query($connect,$query);
      while ($row = mysqli_fetch_array($result)) {

          if($row['rating']>=5 && $row['rating']<=7){
            $rating = 'good';
          }elseif ($row['rating']>7) {
            $rating = 'very good';
          }
          else{
            $rating = 'medium';
          }

          if($row['star']==5){
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }elseif ($row['star']==4) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }elseif ($row['star']==3) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }
          elseif ($row['star']==2) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i></i>';
          }
          else{
            $star = '<i class="text-warning ml-4 fa fa-star"></i>';
          }


          $path="\"javascript: form.action='view.php?property_id=".$row['property_id']."'\"";

          $output =  '<div class="row mb-3">
          <div class="col-md-12">
          <div class="card">

          <div class="card-body">

          <div class="row">
          <div class="col-md-3">
          <img    src="data:image/jpeg;base64,'.base64_encode($row["property_image"]).'" class="img-sm">
          </div>
          <div class="col-md-6">

          <h6 style="text-transform:uppercase">'.$row['propertyname'].$star.'</h6>
          <p>'.$row['address'].'</p>
          <p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban"></i>Free Cancellation</span></strong></p>

          <ul class="list-inline">
          <li class="list-inline-item" ><input type="button" onclick="" data-toggle="modal" data-target="#view" class="btn preview" style="background-color:#FF6F71" value="Preview" text="'.$row['property_id'].'">

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">

          </div>
          </div>
          </div></li>
          <li class="list-inline-item mt-5" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg"  style="background-color:#FF6F71">Map view</button>

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <p>Map view page</p>
          </div>
          </div>
          </div></li>
          <li class=mt-5 list-inline-item" style="float: right;"><i style="color: green">'.$rating.'</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white" align="center"><b>'.$row['rating'].'</b></p></li>

          </ul>
          </div>
          <div class="col-md-3">
          <h4>USD '.$row["property_price"].' &#x20B9</h4>
          <p>avg/Night</p>
          <form method="POST" action="view.php">
          <input type="submit" name="book_now"   onclick='.$path.'  data-target="" data-toggle="" value="Book Now" class="btn mt-2 mb-3 bl-1"     style="background-color:#FF6F71" >
          </form>

          <!-- price from other companies -->
          <i class="mr-1">Expedia</i><span>3050&#x20B9;</span>
          <i class="mr-1">Booking.com</i><span>5070&#x20B9;</span>
          <i class="mr-1">MakemyTrip</i> <span>4200&#x20B9;</span>
          </div>
          </div>

          </div>
          </div>
          </div>
          </div>

          ';
          echo $output;
        }

  }
}

 ?>

        <?php 

        if($sorting1 OR $sorting2 OR $sorting3 OR $sorting4){
          if($sorting1){
            $query = "SELECT * FROM property_details WHERE keyword='$keyword' ORDER BY propertyname ";
          }elseif ($sorting2) {
           $query = "SELECT * FROM property_details WHERE keyword='$keyword' ORDER BY rating DESC ";
         }elseif($sorting3){
           $query = "SELECT * FROM property_details WHERE keyword='$keyword' ORDER BY property_price ";
         }
         else{
           $query = "SELECT * FROM property_details WHERE keyword='$keyword' ORDER BY star DESC ";
         }

         $result = mysqli_query($connect,$query);
         while ($row = mysqli_fetch_array($result)) {

          if($row['rating']>=5 && $row['rating']<=7){
            $rating = 'good';
          }elseif ($row['rating']>7) {
            $rating = 'very good';
          }
          else{
            $rating = 'medium';
          }

          if($row['star']==5){
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }elseif ($row['star']==4) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }elseif ($row['star']==3) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }
          elseif ($row['star']==2) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i></i>';
          }
          else{
            $star = '<i class="text-warning ml-4 fa fa-star"></i>';
          }


          $path="\"javascript: form.action='view.php?property_id=".$row['property_id']."'\"";

          $output =  '<div class="row mb-3">
          <div class="col-md-12">
          <div class="card">

          <div class="card-body">

          <div class="row">
          <div class="col-md-3">
          <img    src="data:image/jpeg;base64,'.base64_encode($row["property_image"]).'" class="img-sm">
          </div>
          <div class="col-md-6">

          <h6 style="text-transform:uppercase">'.$row['propertyname'].$star.'</h6>
          <p>'.$row['address'].'</p>
          <p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban"></i>Free Cancellation</span></strong></p>

          <ul class="list-inline">
          <li class="list-inline-item" ><input type="button" onclick="" data-toggle="modal" data-target="#view" class="btn preview" style="background-color:#FF6F71" value="Preview" text="'.$row['property_id'].'">

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">

          </div>
          </div>
          </div></li>
          <li class="list-inline-item mt-5" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg"  style="background-color:#FF6F71">Map view</button>

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <p>Map view page</p>
          </div>
          </div>
          </div></li>
          <li class=mt-5 list-inline-item" style="float: right;"><i style="color: green">'.$rating.'</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white" align="center"><b>'.$row['rating'].'</b></p></li>

          </ul>
          </div>
          <div class="col-md-3">
          <h4>USD '.$row["property_price"].' $</h4>
          <p>avg/Night</p>
          <form method="POST" action="view.php">
          <input type="submit" name="book_now"   onclick='.$path.'  data-target="" data-toggle="" value="Book Now" class="btn mt-2 mb-3 bl-1"     style="background-color:#FF6F71" >
          </form>

          <!-- price from other companies -->
          <i class="mr-1">Expedia</i><span>3050&#x20B9;</span>
          <i class="mr-1">Booking.com</i><span>5070&#x20B9;</span>
          <i class="mr-1">MakemyTrip</i> <span>4200&#x20B9;</span>


          <script>
          function viw_room(){
            window.location.href = "view.php";
          }
          </script>
          </div>
          </div>

          </div>
          </div>
          </div>
          </div>

          ';
          echo $output;
        }

      }
      ?>


      <?php 


      if($wedding OR $world OR $city OR $night OR $culture OR $food){
        if($wedding){
          $query = "SELECT * FROM property_details WHERE keyword='wedding'";
        }elseif ($world) {
          $query = "SELECT * FROM property_details WHERE keyword='exploreworld'";
        }elseif ($city) {
          $query = "SELECT * FROM property_details WHERE keyword='citylife'";
        }elseif ($night) {
          $query = "SELECT * FROM property_details WHERE keyword='nightlife'";
        }elseif ($culture) {
          $query = "SELECT * FROM property_details WHERE keyword='culture'";
        }else{
          $query = "SELECT * FROM property_details WHERE keyword='food'";
        }
        

        $result = mysqli_query($connect,$query);
        while ($row = mysqli_fetch_array($result)) {

          if($row['rating']>=5 && $row['rating']<=7){
            $rating = 'good';
          }elseif ($row['rating']>7) {
            $rating = 'very good';
          }
          else{
            $rating = 'medium';
          }


          if($row['star']==5){
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }elseif ($row['star']==4) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }elseif ($row['star']==3) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></i>';
          }
          elseif ($row['star']==2) {
            $star = '<i class="text-warning ml-4 fa fa-star"><i class="fa fa-star"></i></i>';
          }
          else{
            $star = '<i class="text-warning ml-4 fa fa-star"></i>';
          }

          $path="\"javascript: form.action='s_view.php?property_id=".$row['property_id']."'\"";

          $output =  '<div class="row mb-3">
          <div class="col-md-12">
          <div class="card">

          <div class="card-body">

          <div class="row">
          <div class="col-md-3">
          <img    src="data:image/jpeg;base64,'.base64_encode($row["property_image"]).'" class="img-sm">
          </div>
          <div class="col-md-6">

          <h6 style="text-transform:uppercase">'.$row['propertyname'].$star.'</h6>
          <p>'.$row['address'].','.$row['city'].','.$row['country'].'</p>
          <p><strong style="color: green"><i class="fas fa-wifi"></i>Free Wifi<span class="mr-4"><i class="mr-4"></i><i class="fas fa-ban"></i>Free Cancellation</span></strong></p>

          <ul class="list-inline">
          <li class="list-inline-item" ><input type="button" onclick="" data-toggle="modal" data-target="#view" class="btn preview" style="background-color:#FF6F71" value="Preview" text="'.$row['property_id'].'">

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">

          </div>
          </div>
          </div></li>
          <li class="list-inline-item mt-5" ><button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg"  style="background-color:#FF6F71">Map view</button>

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <p>Map view page</p>
          </div>
          </div>
          </div></li>
          <li class=mt-5 list-inline-item" style="float: right;"><i style="color: green">'.$rating.'!</i><p class="mr-1 ml-1" name="review" style="background-color: green;border-radius: 10px;color: white" align="center"><b>'.$row['rating'].'</b></p></li>

          </ul>
          </div>
          <div class="col-md-3">
          <h4>USD '.$row["property_price"].' &#x20B9</h4>
          <p>avg/Night</p>
          <form method="POST" action="s_view.php">
          <input type="submit" name="book_now"   onclick='.$path.'  data-target="" data-toggle="" value="Book Now" class="btn mt-2 mb-3 bl-1"     style="background-color:#FF6F71" >
          </form>

          <!-- price from other companies -->
          <i class="mr-1">Expedia</i><span>3050&#x20B9;</span>
          <i class="mr-1">Booking.com</i><span>5070&#x20B9;</span>
          <i class="mr-1">MakemyTrip</i> <span>4200&#x20B9;</span>


          <script>
          function viw_room(){
            window.location.href = "view.php";
          }
          </script>
          </div>
          </div>

          </div>
          </div>
          </div>
          </div>

          ';
          echo $output;
        }

      }

      ?>




    </div>
  </div>
</div>

<div id="view" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" id="view">
    <div class="modal-content">
      <div id="displaydiv">

      </div>

      <!-- <?php /*include 'single_view.php';*/ ?> -->
    </div>
  </div>
</div>
</section>

<?php  
include('footer.php');
?>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script>

  function add(ths,sno){


    for (var i=1;i<=5;i++){
      var cur=document.getElementById("star"+i)
      cur.className="fa fa-star"
    }

    for (var i=1;i<=sno;i++){
      var cur=document.getElementById("star"+i)
      if(cur.className=="fa fa-star")
      {
        cur.className="fa fa-star checked"
      }
    }

  }


  function rate(ths,sno){


    for (var i=1;i<=5;i++){
      var cur=document.getElementById("s"+i)
      cur.className="fa fa-star"
    }

    for (var i=1;i<=sno;i++){
      var cur=document.getElementById("s"+i)
      if(cur.className=="fa fa-star")
      {
        cur.className="fa fa-star checked"
      }
    }

  }
</script>
<script>
  $('#datepicker2').datepicker({
    uiLibrary: 'bootstrap4'
  });
  $('#datepicker').datepicker({
    uiLibrary: 'bootstrap4'
  });
</script>

</body>
</html>
<script >
  $(document).ready(function(){
   $('.preview').click(function()
   {
     var id=$(this).attr('text');
     var path="single_view.php?property_id="+id;
     $('#displaydiv').load(path);

   });
 });
</script>
